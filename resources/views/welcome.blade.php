@extends('layouts.app')

@section('content')
    <section class="container my-5">
        <h1>Welcome to office management tool</h1>
        <a href="{{route('office.list') }}">Click here to see the list</a>
    </section>
@endsection
