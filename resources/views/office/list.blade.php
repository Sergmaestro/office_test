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
    <office-list :offices='@json($offices->items())'
                 :no-more='@json($noMore)'></office-list>
@endsection

@push('routes')
    window.Laravel.routes = Object.assign(window.Laravel.routes,
        {!! json_encode(getRoutesList(['office'])) !!},
    )
@endpush
