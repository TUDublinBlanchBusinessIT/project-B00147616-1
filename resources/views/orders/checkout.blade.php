@extends('layouts.app')

@section('content')
    <h2>Place Order</h2>
    {{ Form::open(array('url' => 'orders/placeorder', 'method' => 'post')) }}
    @csrf
    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Colour</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $ttlCost = 0; $ttlQty = 0; @endphp
            @foreach ($lineitems as $lineitem)
                @php $product = $lineitem['product']; @endphp
                <tr>
                    <td><input size="3" style="border:none" type="text" name="productid[]" readonly value="{{ $product->id }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->colour }}</td>
                    <td><div class="price">{{ $product->price }}</div></td>
                    <td>
                        <input size="3" style="border:none" class="qty" type="text" name="quantity[]" value="{{ $lineitem['qty'] }}">
                    </td>
                    <td>
                        <!-- These buttons could be used to increase or decrease the quantity (with JavaScript) -->
                        <button type="button" class="btn btn-default add" onclick="changeQuantity(this, 1)"><span class="glyphicon glyphicon-plus"></span></button>
                        <button type="button" class="btn btn-default subtract" onclick="changeQuantity(this, -1)"><span class="glyphicon glyphicon-minus"></span></button>
                        <button type="button" class="btn btn-default" onClick="$(this).closest('tr').remove();">Remove</button>
                    </td>
                    @php 
                        $ttlQty = $ttlQty + $lineitem['qty']; 
                        $ttlCost = $ttlCost + ($product->price * $lineitem['qty']);
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-summary">
        <p>Total Quantity: {{ $ttlQty }}</p>
        <p>Total Cost: €{{ number_format($ttlCost, 2) }}</p>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@endsection

@section('scripts')
    <script>
        // JavaScript function to handle the quantity change
        function changeQuantity(button, change) {
            var quantityInput = $(button).closest('tr').find('input.qty');
            var currentQty = parseInt(quantityInput.val());
            var newQty = currentQty + change;

            // Ensure quantity does not go below 1
            if (newQty >= 1) {
                quantityInput.val(newQty);
            }
        }
    </script>
@endsection
