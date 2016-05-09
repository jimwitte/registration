@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{$user->firstName}} {{$user->lastName}}
                    <small>{{$user->unitType}} {{$user->unitNumber}} {{$user->council}}</small>
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($user, ['route' => array('user.update', $user->id),'class'=> 'form-horizontal col-md-6','method' => 'PATCH']) }}
                @include('user._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection