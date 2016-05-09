<div class="form-group">
    {{Form::label('title','Session Title') }}
    {{Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('startTime', 'Start Time') }}
    {{Form::text('startTime', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('capacity', 'Capacity') }}
    {{Form::text('capacity', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('location', 'Location') }}
    {{Form::text('location', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{Form::label('description', 'Description') }}
    {{Form::textarea('description', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{Form::label('archived', 'Archived') }} &nbsp;
    {{Form::radio('archived', 1, ['class' => 'form-control']) }} Yes &nbsp;
    {{Form::radio('archived', 0, ['class' => 'form-control']) }} No
</div>

<div class="form-group">
    {{Form::button('Save Changes',['class' => 'btn btn-primary', 'type'=>'submit'])}}
</div>
