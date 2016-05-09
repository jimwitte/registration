<div class="form-group">
    {{Form::label('firstName','First Name') }}
    {{Form::text('firstName', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('lastName', 'Last Name') }}
    {{Form::text('lastName', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('email', 'Email') }}
    {{Form::text('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('position', 'Scouting Position') }}
    {{Form::text('position', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('unitType', 'Unit Type') }} &nbsp;
    {{ Form::radio('unitType', 'Crew') }} Crew &nbsp;
    {{ Form::radio('unitType', 'Pack') }} Pack &nbsp;
    {{ Form::radio('unitType', 'Troop') }} Troop &nbsp;
    {{ Form::radio('unitType', 'Other') }} Other
</div>

<div class="form-group">
    {{Form::label('unitNumber', 'Unit Number') }}
    {{Form::number('unitNumber', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('council', 'Council') }}
    {{Form::text('council', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('address', 'Street Address') }}
    {{Form::text('address', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('city', 'City') }}
    {{Form::text('city', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('state', 'State') }}
    {{Form::text('state', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('zip', 'Zip') }}
    {{Form::text('zip', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{Form::label('phone', 'Phone') }}
    {{Form::text('phone', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('paymentMethod', 'Payment Method') }} &nbsp;
    {{ Form::radio('paymentMethod', 'Credit Card') }} Credit Card &nbsp;
    {{ Form::radio('paymentMethod', 'Cash') }} Cash &nbsp;
    {{ Form::radio('paymentMethod', 'Troop Account') }} Troop Account &nbsp;
</div>

<div class="form-group">
    {{Form::label('isInstructor', 'Instructor or Event Committee member') }} &nbsp;
    {{Form::radio('isInstructor', 1, ['class' => 'form-control']) }} Yes &nbsp;
    {{Form::radio('isInstructor', 0, ['class' => 'form-control']) }} No
</div>

<div class="form-group">
    {{Form::label('isAdmin', 'Site Administrator') }} &nbsp;
    {{Form::radio('isAdmin', 1, ['class' => 'form-control']) }} Yes &nbsp;
    {{Form::radio('isAdmin', 0, ['class' => 'form-control']) }} No
</div>


<div class="form-group">
    {{Form::label('archived', 'User Archived') }} &nbsp;
    {{Form::radio('archived', 1, ['class' => 'form-control']) }} Yes &nbsp;
    {{Form::radio('archived', 0, ['class' => 'form-control']) }} No
</div>

<div class="form-group">
    {{Form::button('Save Changes',['class' => 'btn btn-primary', 'type'=>'submit'])}}
</div>
