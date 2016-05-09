@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$user->firstName}} {{$user->lastName}}
                            <small>{{$user->unitType}} {{$user->unitNumber}} {{$user->council}}</small>
                        </h2>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['class'=>'form-vertical'])}}
                        @foreach ($sessionSelect as $timeSlot => $sessionsInTimeSlot)
                            <div class="form-group">
                                {{Form::label($timeSlot,"$timeSlot",['class'=>'control-label'])}}
                                <select class="form-control" name="{{$timeSlot}}">
                                    <option value="" disabled selected>Select a session...</option>
                                    @foreach ($sessionsInTimeSlot as $session)
                                        <option value="{{$session->id}}" @if ($session->selected) selected @endif>
                                            {{$session->title}} | {{$session->location}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        <div class="form-group">
                            {{Form::button('Save Changes',['type'=>'submit','class'=>'btn btn-primary'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection