@extends('layouts.app-admin')

@section('navbar-breadcrumbs')
    <ul class="navbar-nav mr-auto breadcrumb bg-white m-0 p-0">
        <li class="nav-item breadcrumb-item">
            <a class="nav-link text-truncate" href="{{ route('organization.index') }}">
                Organizations
            </a>
        </li>
        <li class="nav-item overflow-hidden breadcrumb-item">
            <a class="nav-link active text-truncate"
               href="{{ route('organization.show', $organization->id) }}">
                {{ $organization->name }}
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container pt-4 pb-4">
        <el-tabs tab-position="left" class="organization">
            <el-tab-pane>
                <span slot="label" class="tab-name"><i class="el-icon-date custom-icon"></i>Events</span>
                @include('organization.sections.events_section')
            </el-tab-pane>
            <el-tab-pane v-if="{{ (int) $isSuperAdmin }}">
                <span slot="label" class="tab-name"><i class="el-icon-user custom-icon"></i>Users</span>
                <organization-users :users="{{ $organization->admins }}"
                                    org-id="{{ $organization->id }}">
                </organization-users>
            </el-tab-pane>
        </el-tabs>
    </div>

@endsection

@section('scripts')
    <script>
        let resultsTimeout;
        let finished;
        let loading;
        let nextPage = 2;

        let loadMoreResults = () => {
            if ($('#loadMoreEvents').isInViewport() && !loading && !finished) {
                clearTimeout(resultsTimeout);
                resultsTimeout = setTimeout(() => {
                    let URL = route('organization.show', @json($organization->id));

                    axios.get(URL, {
                        params: {
                            page: nextPage++
                        }
                    }).then((res) => {
                        loading = true;
                        finished = res.data.finished;

                        if (res.data.latestEvents) {
                            $("#eventsList").append(res.data.latestEvents);
                            loading = false;
                        }
                    });
                }, 300);
            }
        }

        loadMoreResults();

        $(window).on('scroll', () => {
            loadMoreResults();
        });
    </script>
@endsection

@push('routes')
    window.Laravel.routes = Object.assign(window.Laravel.routes,
        {!! json_encode(getRoutesList(['organization'])) !!},
    )
@endpush
