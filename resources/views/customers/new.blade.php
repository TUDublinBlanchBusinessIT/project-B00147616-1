@extends('layouts.app') 
@section('content')
<FORM method="POST" action="/customers/create">
@csrf
    <div class="form-group">
        <label for="firstname">Enter your first name:</label>
        <input type="text" name="firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastname">Enter your surname:</label>
        <input type="text" name="lastname" class="form-control">
    </div> <input type="submit">
</FORM>
@endsection