@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Settings</h2>
                    </div>

                    <div class="panel-body">
                        @if($settings->count())
                            @foreach ($settings as $setting)
                                <dl class="dl-horizontal">

                                    <dt>Setting</dt>
                                    <dd><a href="{{route('setting.edit',['id'=>$setting->id])}}">
                                            {{$setting->name}}
                                        </a>
                                    </dd>

                                    <dt>Description</dt>
                                    <dd>{{$setting->description}}</dd>

                                    <dt>Type</dt>
                                    <dd>{{$setting->type}}</dd>

                                    <dt>Key</dt>
                                    <dd>{{$setting->key}}</dd>

                                    <dt>Value</dt>
                                    <dd>{{$setting->value}}</dd>
                                </dl>
                            @endforeach
                        @else
                            <p>No settings found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection