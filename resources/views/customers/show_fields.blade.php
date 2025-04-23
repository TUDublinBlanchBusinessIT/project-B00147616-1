<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{!! $customer->firstname !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', 'Lastname:') !!}
    <p>{!! $customer->lastname !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $customer->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $customer->phone !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $customer->password !!}</p>
</div>

<!-- Createdat Field -->
<div class="form-group">
    {!! Form::label('createdat', 'Createdat:') !!}
    <p>{!! $customer->createdat !!}</p>
</div>

<!-- Updatedat Field -->
<div class="form-group">
    {!! Form::label('updatedat', 'Updatedat:') !!}
    <p>{!! $customer->updatedat !!}</p>
</div>

<!-- Deletedat Field -->
<div class="form-group">
    {!! Form::label('deletedat', 'Deletedat:') !!}
    <p>{!! $customer->deletedat !!}</p>
</div>

