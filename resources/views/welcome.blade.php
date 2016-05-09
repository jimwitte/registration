@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Prairielands Training College</h1>
        <p>Celebrating 17 years of quality training.</p>
        <p>{{ $welcomeText }}</p>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/register') }}" role="button">Sign Up Now &raquo;</a></p>
        or <a href="{{ url('/login') }}">log in</a>
    </div>
@endsection
