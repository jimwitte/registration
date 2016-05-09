@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h4>Users</h4>
                            </div>
                            <div class="col-xs-6" style="margin-top:5px;">
                                {{Form::open(['method' => 'GET', 'class' => 'form-inline'])}}
                                <a href="{{ route('user.create') }}"
                                   style="margin-right:15px;margin-bottom: 4px;">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Add a User
                                </a>
                                <div class="input-group">
                                    {{Form::input('search','q',$query,['placeholder' => 'Search...','class' => 'form-control'])}}
                                </div>
                                {{Form::close()}}

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">


                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>First</th>
                                <th>Last</th>
                                <th>Email</th>
                                <th>Unit</th>
                                <th>Registration</th>
                                <th>Edit/Delete User</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td><a href="{{route('user.show', [$user->id])}}">{{$user->firstName}}</a></td>
                                        <td><a href="{{route('user.show', [$user->id])}}">{{$user->lastName}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->unitType}} {{$user->unitNumber}}</td>
                                        <td align="center">
                                            <a href="{{ route('registration.edit',['id'=>$user->id]) }}">
                                                edit
                                            </a>
                                        </td>
                                        <td align="center">
                                            {{Form::open(array('method' => 'DELETE', 'class' => 'form-inline', 'route' => array('user.destroy', $user->id)))}}
                                            <a href="{{route('user.edit', [$user->id])}}"
                                               style="display: inline-block;margin-right:.75em;">
                                                edit
                                            </a>
                                            {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>',['class'=>'btn btn-xs btn-danger', 'type'=>'submit', 'onClick' => 'return confirm(\'Delete this user?\');', 'style'=>'display: inline-block;'])}}
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>Nothing found.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection