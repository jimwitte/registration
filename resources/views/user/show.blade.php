@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{$user->firstName}} {{$user->lastName}}
                            <small>{{$user->unitType}} {{$user->unitNumber}} {{$user->council}}</small>
                        </h4>
                        <a href="{{route('user.edit',['id'=>$user->id]) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                            Edit User
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <dl class="dl-horizontal">
                                    <dt>Name</dt>
                                    <dd>{{$user->firstName}} {{$user->lastName}}</dd>

                                    <dt>Email</dt>
                                    <dd>{{$user->email}}</dd>

                                    <dt>Position</dt>
                                    <dd>{{$user->position}}</dd>

                                    <dt>Unit</dt>
                                    <dd>{{$user->unitType}} {{$user->unitNumber}} {{$user->council}}</dd>

                                </dl>
                            </div>
                            <div class="col-xs-6">
                                <dl class="dl-horizontal">
                                    <dt>Address</dt>
                                    <dd>{{$user->address}} <br/>{{$user->city}} {{$user->state}} {{$user->zip}}</dd>


                                    <dt>State</dt>
                                    <dd>{{$user->state}}</dd>

                                    <dt>Zip</dt>
                                    <dd>{{$user->zip}}</dd>

                                    <dt>Phone</dt>
                                    <dd>{{$user->phone}}</dd>

                                    <dt>Payment Method</dt>
                                    <dd>{{$user->paymentMethod}}</dd>

                                    <dt>Instructor/Committee</dt>
                                    <dd>{{var_export($user->isInstructor)}}</dd>

                                    <dt>Administrator</dt>
                                    <dd>{{var_export($user->isAdmin)}}</dd>

                                    <dt>Archived</dt>
                                    <dd>{{var_export($user->archived)}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h4>Registration
                            <small>
                                <a style="margin-left:.75em;" href="{{route('registration.edit',['id'=>$user->id])}}">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Edit
                                    Registration</a>
                            </small>
                    </div>

                    <div class="panel-body">
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
                    </div>
                </div>
            </div>
            <a href="{{ route('user.index') }}"><span class="glyphicon glyphicon-circle-arrow-left"
                                                      aria-hidden="true"> </span> User List</a>
        </div>
    </div>

@endsection