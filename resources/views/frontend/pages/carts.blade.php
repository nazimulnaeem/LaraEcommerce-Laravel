@extends('frontend.layouts.master')

    @section('content')

<div class="container margin-top-20">
<h2>My cart items </h2>
@if(App\Models\Cart::totalItems() > 0)

    <table class="table table-bordered table-stripe">
    <thead>
        <tr>
            <th>No</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Quantity</th>
            <th>Unnit Price</th>
            <th>Subtotal Price</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total_price = 0;
        @endphp
       @foreach(App\Models\Cart::totalcarts() as $cart)
       <tr>
            <td>
                {{ $loop->index + 1 }}
            </td>
            <td>
                <a href="{{ route('product.show',$cart->product->slug) }}" >{{ $cart->product->title }}</a>
            </td>
            <td>
                @if($cart->product->images->count() > 0 )
                <img src="{{ asset('images/products/'.$cart->product->images->first()->image) }}" width="60">
                @endif
            </td>
            <td>
                <form action="{{ route('cart.update',$cart->id) }}" method="post" class="form-inline">
                @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
                  <button type="submit" class="btn btn-success ml-1">Update</button>
                </form>
            </td>
            <td>
                {{ $cart->product->price }} Taka
            </td>
            <td>

            @php
            $total_price +=  $cart->product->price * $cart->product_quantity;
            @endphp

                {{ $cart->product->price * $cart->product_quantity}} Taka

            </td>
            <td>
            <form id="delete-form-{{ $cart->id }}" method="post" action="{{ route('cart.delete',$cart->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $cart->id }}').submit();
              }else {
                  event.preventDefault();
                      }"><a class="">delete</a></button>
            </td>
        </tr>
       @endforeach
       <tr>
           <td colspan="4"></td>
           <td>
               Total Amount
           </td>
           <td colspan="2">
               <strong>{{ $total_price }} Taka</strong>
           </td>
       </tr>
    </tbody>
</table>

<div class="float-right mb-5">
    <a class="btn btn-info btn-lg" href="{{ route('products') }}">Continue Shopping..</a>
    <a class="btn btn-warning btn-lg" href="{{ route('checkouts') }}">Chackout</a>
</div>
<div class="clearfix"></div>

@else
<div class="alert alert-warning">
<strong>There is no item in your cart.</strong>
<br>
<a class="btn btn-info btn-lg mt-3" href="{{ route('products') }}">Continue Shopping..</a>
</div>
@endif

</div>

@endsection