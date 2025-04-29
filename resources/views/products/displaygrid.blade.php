@extends('layouts.app')
@section('content')
<div style="padding-top:1%">
    <nav class="navbar navbar-right navbar-expand-sm navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><button id="checkOut" onclick="window.location.href='{{route('orders.checkout')}}'" type="button" style="margin-right:5px;" class="btn btn-primary navbar-btn center-block">Check Out</button></li>
            <li class="nav-item"><button id="emptycart" type="button" style="margin-right:5px;" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li>
            <li class="nav-item"><span style="font-size:40px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
            <li class="nav-item"><div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:5px;margin-right:0px;">{{$totalItems}}</div></li>
            <li class="nav-item"><div class="navbar-text" style="font-size:14pt;margin-left:0px;">Item(s)</div></li>
        <ul>
    </nav>
</div>
@include('flash::message')
    <div class='d-flex flex-wrap align-content-start bg-light'>
    @foreach($products as $product)
        <div class="p-2 border col-4 g-3">
            <div class="card text-center">
                <div class="card-header d-block"><h5 class="mx-auto d-block">{{ $product->name }} {{ $product->description }}</h5></div>
                <div class="card-body"><img style="width:65%;height:200px;" class="mx-auto d-block" src="{{ asset('/img/' . $product->imagepath)}}"/></div>
                <div class="card-footer"><button id="addItem" type="button" class="btn btn-success mx-auto d-block addItem" value="{{$product->id}}">Add To Cart</button></div>
            </div>
        </div>
    @endforeach
    </div>
    <script>
$(document).ready(function() {
    $(".addItem").click(function() {
        var i = $(this).val(); // get the product id
        $.ajax({
            type: "GET",
            url: "{{url('product/additem/')}}" + "/" + i,
            success: function(response) {
                $('#shoppingcart').text(response.total); // update cart number
            },
            error: function() {
                alert("Problem communicating with the server");
            }
        });
    });

    $("#emptycart").click(function() {
        $.ajax({
            type: "GET",
            url: "{{ url('product/emptycart') }}",
            success: function() {
                $('#shoppingcart').text(0); // reset cart number
            },
            error: function() {
                alert("Problem communicating with the server");
            }
        });
    });
});
</script>
@endsection('content')