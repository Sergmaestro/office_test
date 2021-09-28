@extends('layouts.app')

@section('navbar-breadcrumbs')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item overflow-hidden">
            <a class="nav-link text-truncate active" href="{{ route('office.list') }}">
                Offices
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container pt-4 pb-4">
        <div class="justify-content-between">
            <h3>{{ !(empty($office->id)) ? 'Edit' : 'Add New' }} Office</h3>
            <a href="{{ route('office.list') }}"><i class="fas fa-backward"></i> Back to office list</a>
        </div>

        <div class="border mt-4 pt-4">
            <office-form :model='@json($office)'
                         :countries='@json($countries)'></office-form>
        </div>
    </div>
@endsection

@push('routes')
    window.Laravel.routes = Object.assign(window.Laravel.routes,
        {!! json_encode(getRoutesList(['office'])) !!},
    )
@endpush
