@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading" style="margin-bottom:10px;">
                    <h4>{{$session->title}}
                        <small>
                            {{$session->startTime}} {{$session->location}}
                            <a href="{{ route('session.edit',['id'=>$session->id]) }}" style="margin-left:.75em;">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Edit</a>
                        </small>
                    </h4>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Title</dt>
                        <dd>{{$session->title}}</dd>

                        <dt>Start Time</dt>
                        <dd>{{$session->startTime}}</dd>

                        <dt>Capacity</dt>
                        <dd>{{$session->capacity}}</dd>

                        <dt>Location</dt>
                        <dd>{{$session->location}}</dd>

                        <dt>Description</dt>
                        <dd>{{$session->description}}</dd>

                        <dt>Archived</dt>
                        <dd>{{var_export($session->archived)}}</dd>
                    </dl>

                    <p>Enrollment count: {{$users->count()}}</p>
                </div>
                <div class="panel-heading"><h4>Session Enrollments</h4></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit/Council</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('user.show',['id'=>$user->id]) }}">{{$user->firstName}} {{$user->lastName}}</a>
                                    </td>
                                    <td>{{$user->unitType}} {{$user->unitNumber}} {{$user->council}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No enrollments for this session found.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{ route('session.index') }}">
            <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"> </span>
            Back to Session List
        </a>
    </div>
@endsection
