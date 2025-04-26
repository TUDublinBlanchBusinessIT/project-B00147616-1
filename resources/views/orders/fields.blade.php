<!-- Orderdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderdate', 'Orderdate:') !!}
    {!! Form::date('orderdate', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliverytime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliverytime', 'Deliverytime:') !!}
    {!! Form::text('deliverytime', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerid', 'Customerid:') !!}
    {!! Form::number('customerid', null, ['class' => 'form-control']) !!}
</div>

<!-- Bouquetid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bouquetid', 'Bouquetid:') !!}
    {!! Form::number('bouquetid', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
