@extends('layouts.app')

@section('content')

<!-- Main Container -->
<div class="container-fluid py-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Bouquet Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button id="checkOut" onclick="window.location.href='{{route('orders.checkout')}}'" type="button" class="btn btn-primary navbar-btn">Check Out</button>
                    </li>
                    <li class="nav-item">
                        <button id="emptycart" type="button" class="btn btn-danger navbar-btn ms-3">Empty Cart</button>
                    </li>
                    <li class="nav-item">
                        <span class="glyphicon glyphicon-shopping-cart navbar-btn ms-3" style="font-size: 24px;"></span>
                    </li>
                    <li class="nav-item">
                        <div class="navbar-text ms-2" id="shoppingcart" style="font-size: 16px; font-weight: bold;">{{$totalItems}}</div>
                    </li>
                    <li class="nav-item">
                        <div class="navbar-text" style="font-size: 16px;">Item(s)</div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages (if any) -->
    @include('flash::message')

    <!-- Product Display Grid -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ asset('/img/' . $product->imagepath)}}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="text-muted">Price: €{{ number_format($product->price, 2) }}</p>
                    <button id="addItem" type="button" class="btn btn-success" value="{{$product->id}}">Add To Cart</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- JavaScript for AJAX functionality -->
<script>
$(document).ready(function() {
    // Add to Cart functionality
    $(".addItem").click(function() {
        var productId = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ url('product/additem') }}/" + productId,
            success: function(response) {
                $('#shoppingcart').text(response.total); // Update the shopping cart count
            },
            error: function() {
                alert("Problem communicating with the server");
            }
        });
    });

    // Empty Cart functionality
    $("#emptycart").click(function() {
        $.ajax({
            type: "GET",
            url: "{{ url('product/emptycart') }}",
            success: function() {
                $('#shoppingcart').text(0); // Reset the shopping cart count
            },
            error: function() {
                alert("Problem communicating with the server");
            }
        });
    });
});
</script>

@endsection
