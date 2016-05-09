@extends('layouts.app')

@section('content')
    <div class="container">

        <dl class="dl-horizontal">
            <dt>Setting Name</dt>
            <dd>{{$setting->name}}</dd>

            <dt>Key</dt>
            <dd>{{$setting->key}}</dd>

            <dt>Data Type</dt>
            <dd>{{$setting->type}}</dd>

        </dl>


        {{ Form::model($setting, ['route' => array('setting.update', $setting->id),'class'=> 'form-horizontal col-md-6','method' => 'PATCH']) }}


        <div class="form-group">
            {{Form::label('value','Value') }}

            @if($setting->type == 'text')
                {{Form::textarea('value', null, ['class' => 'form-control']) }}
                @elseif ($setting->type == 'date')
                {{Form::date('value',null, ['class'=>'form-control'])}}
                @elseif ($setting->type == 'email')
                {{Form::email('value',null, ['class'=>'form-control'])}}
            @endif
        </div>

        <div class="form-group">
            {{Form::button('Save Changes',['class' => 'btn btn-primary', 'type'=>'submit'])}}
        </div>

        {{ Form::close() }}
    </div>
@endsection