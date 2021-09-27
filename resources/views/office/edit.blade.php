@extends('layouts.app')

@section('navbar-breadcrumbs')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item overflow-hidden">
            <a class="nav-link text-truncate active" href="{{ route('office.index') }}">
                Offices
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container pt-4 pb-4">
        <div class="justify-content-between">
            <h3>{{ (array) $office ? 'Edit' : 'Add New' }} Office</h3>
        </div>

        <div class="border mt-4 pt-4">
            <office-form :model='@json($office)'></office-form>
        </div>
    </div>
@endsection

@push('routes')
    window.Laravel.routes = Object.assign(window.Laravel.routes,
        {!! json_encode(getRoutesList(['office'])) !!},
    )
@endpush
