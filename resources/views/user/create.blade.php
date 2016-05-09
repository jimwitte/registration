@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(['route' => 'user.store','class'=> 'form-horizontal col-md-6','method' => 'PATCH']) }}

        @include('user._form')

        {{ Form::close() }}
    </div>
@endsection