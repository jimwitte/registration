@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{$session->title}}
                    <small>
                        {{$session->startTime}} {{$session->location}}
                    </small>
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($session, ['route' => array('session.update', $session->id),'class'=> 'form-horizontal col-md-6','method' => 'PATCH']) }}
                @include('session._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection