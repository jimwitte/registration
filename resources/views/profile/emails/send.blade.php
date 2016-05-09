@extends('layouts.email')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Profile
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
