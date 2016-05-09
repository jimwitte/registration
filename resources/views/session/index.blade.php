@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Sessions</h4>
                            </div>
                            <div class="col-xs-6" style="margin-top:3px;">
                                {{Form::open(['method' => 'GET', 'class' => 'form-inline'])}}
                                <a href="{{route('session.create')}}" style="margin-right:15px;margin-bottom: 4px;">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Add a Session
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
                                <th>Title</th>
                                <th>Start Time</th>
                                <th>Count/Cap</th>
                                <th>Location</th>
                                <th>Edit/Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($sessions->count())
                                @foreach ($sessions as $session)
                                    <tr>
                                        <td>
                                            <a href="{{route('session.show', [$session->id])}}">{{$session->title}}</a>
                                        </td>
                                        <td>{{$session->startTime}}</td>
                                        <td>{{$session->enrollment}} / {{$session->capacity}}</td>
                                        <td>{{$session->location}}</td>
                                        <td>
                                            {{Form::open(array('method' => 'DELETE', 'class' => 'form-inline', 'route' => array('session.destroy', $session->id)))}}

                                            <a href="{{route('session.edit', [$session->id])}}"
                                               style="display: inline-block;">
                                                edit
                                            </a>
                                            {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>',['class'=>'btn btn-xs btn-danger', 'type'=>'submit', 'onClick' => 'return confirm(\'Delete this session?\');', 'style'=>'display: inline-block;margin-left:.75em;'])}}
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
                {!! $sessions->render() !!}
            </div>
        </div>
    </div>
@endsection