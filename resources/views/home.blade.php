@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @if($user->admin())
                        <div class="panel-heading">
                            <h4>
                                Administration
                                <small style="margin-left:.75em;">
                                    Logged in as {{$user->firstName}} {{$user->lastName}}
                                </small>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="{{route('user.index')}}">Manage Users/Registrations</a></li>
                                <li><a href={{route('session.index')}}>Manage Sessions</a></li>
                                <li><a href="{{route('setting.index')}}">Manage App Settings</a></li>
                            </ul>
                            @if($regOpen)
                                <p>Session registration is currently open.</p>
                            @else
                                <p>Session registration is currently closed. People can create accounts and fill in
                                    their profile,
                                    but they will not be able to register for sessions.
                                    <a href="{{route('setting.index')}}">Manage App Settings</a> to change open/close
                                    dates.
                                </p>
                            @endif
                            <dl class="dl-horizontal">
                                <dt>Open Date</dt>
                                <dd>{{$openDate}}</dd>

                                <dt>Close Date</dt>
                                <dd>{{$closeDate}}</dd>
                            </dl>
                        </div>
                    @endif
                    <div class="panel-heading">
                        <h4>My Profile
                            <small style="margin-left:.75em;">
                                @if($user->profileComplete())
                                    <a href="{{route('profile.edit')}}">Edit Profile</a>
                                @else
                                    <a href="{{route('profile.edit')}}">Complete my profile</a>
                                @endif
                            </small>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd>{{$user->firstName}} {{$user->lastName}}</dd>

                            <dt>Email</dt>
                            <dd>{{$user->email}}</dd>

                            <dt>Position</dt>
                            <dd>{{$user->position}}</dd>

                            <dt>Unit</dt>
                            <dd>{{$user->unitType}} {{$user->unitNumber}}</dd>

                            <dt>Council</dt>
                            <dd>{{$user->council}}</dd>

                            <dt>Address</dt>
                            <dd>{{$user->address}}<br/>{{$user->city}}, {{$user->state}} {{$user->zip}}</dd>

                            <dt>Phone</dt>
                            <dd>{{$user->phone}}</dd>

                            <dt>Payment Method</dt>
                            <dd>{{$user->paymentMethod}}</dd>
                        </dl>
                        @if($user->profileComplete())
                            <p>Your profile is complete. Thank you!</p>
                        @else
                            <p>Please <a href="{{route('profile.edit')}}">complete your profile</a> to register for
                                sessions. Thank You!</p>
                        @endif
                    </div>

                    <div class="panel-heading">
                        <h4>My Registration
                            <small style="margin-left:.75em;">
                                @if(($user->profileComplete() and $regOpen) or $user->admin())
                                    @if($sessions->count())
                                        <a href="{{route('profile.register')}}">Change Registration</a>
                                    @else
                                        <a href="{{route('profile.register')}}">Register for Sessions</a>
                                    @endif
                                    {{Form::open(['route' => 'profile.registerDestroy','method' => 'DELETE','style'=>'display: inline-block;'])}}
                                    {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',['class'=>'btn btn-xs btn-danger', 'type'=>'submit', 'onClick' => 'return confirm(\'Delete all session registrations?\');', 'style'=>'display: inline-block; margin-left:.75em;'])}}
                                    {{Form::close()}}

                                    {{Form::open(['route' => 'profile.sendEmailProfile','method' => 'POST','style'=>'display: inline-block;'])}}
                                    {{Form::button('<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>',['class'=>'btn btn-xs btn-primary', 'type'=>'submit', 'onClick' => 'return confirm(\'Email yourself your profile and session registrations?\');', 'style'=>'display: inline-block; margin-left:.75em;'])}}
                                    {{Form::close()}}
                                @else
                                    Register for Sessions not available
                                @endif
                            </small>
                        </h4>
                    </div>
                    <div class="panel-body">
                        @if(($user->profileComplete() and $regOpen) or $user->admin())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Start Time</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($sessions->count())
                                    @foreach ($sessions as $session)
                                        <tr>
                                            <td>{{$session->startTime}}</td>
                                            <td>{{$session->title}}</td>
                                            <td>{{$session->location}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No registration found.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
