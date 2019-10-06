


@extends('backend.layouts.master')
@section('title')
 Order | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>View Order #LE{{ $order->id }}</h4>
            </div>
           
            <div class="card-body">
            @include('backend.partial.message')
            <h3>Order Information</h3>
            <div class="row">
                <div class="col-md-6 border-right">
                    <p><strong>Order Name : </strong>{{ $order->name }}</p>
                    <p><strong>Order Phone : </strong>{{ $order->phone }}</p>
                    <p><strong>Order E-mail : </strong>{{ $order->email }}</p>
                    <p><strong>Order Shipping Address : </strong>{{ $order->shipping_address }}</p>
                </div>
                <div class="col-md-6 border-left">
                    <p><strong>Order Payment method : </strong>{{ $order->payment->name }}</p>
                    <p><strong>Order Payment Transaction : </strong>{{ $order->transaction_id}}</p>
                </div>
            </div>
            <hr>

            <h3>Order Items : </h3>

                    @if($order->carts > 0)

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
            @foreach($order->carts as $cart)
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
        @endif

        <hr>
        <form action="{{ route('admin.order.charge',$order->id )}}" method="post">
            @csrf
            <label for="shipping_charge">Shipping Charge </label>
            <input type="number" name="shipping_charge" value="{{ $order->shipping_charge }}">
            <br>
            <label for="custom_discount">Custom Discount </label>
            <input type="number" name="custom_discount" value="{{ $order->custom_discount }}">
            <br>
            
            <input type="submit" class="btn btn-success" value="Update">
            <a href="{{ route('admin.order.invoice',$order->id) }}" class=" ml-2 btn btn-info">Generate Invoice</a>
            
        </form>


        <hr>
        <form action="{{ route('admin.order.completed',$order->id )}}" method="post" class="form-inline"
            style="display: inline-block!important;">
            @csrf
            @if($order->is_completed)
            <input type="submit" class="btn btn-danger" value="Cancel Order">
            @else
            <input type="submit" class="btn btn-success" value="Complete Order">
            @endif
        </form>

        <form action="{{ route('admin.order.paid',$order->id )}}" method="post" class="form-inline"
            style="display: inline-block!important;">
            @csrf
            @if($order->is_paid)
            <input type="submit" class="btn btn-danger" value="Cancel Payment">
            @else
            <input type="submit" class="btn btn-success" value="Paid Order">
            @endif
        </form>
           
            </div>


        </div>

        @include('backend.partial.footer')


@endsection