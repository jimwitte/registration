@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Create a New Session</div>
            <div class="panel-body">
                {{ Form::open(['route' => 'session.store','class'=> 'form-horizontal col-md-6','method' => 'POST']) }}

                @include('session._form')

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection