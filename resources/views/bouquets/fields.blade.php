<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productid', 'Productid:') !!}
    {!! Form::number('productid', null, ['class' => 'form-control']) !!}
</div>

<!-- Flowertype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flowertype', 'Flowertype:') !!}
    {!! Form::text('flowertype', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bouquets.index') !!}" class="btn btn-default">Cancel</a>
</div>
