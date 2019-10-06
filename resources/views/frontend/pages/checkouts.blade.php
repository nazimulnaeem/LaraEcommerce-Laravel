@extends('frontend.layouts.master')

    @section('content')

<div class="container margin-top-20">
    <div class="card card-body">
    <h2>Confirm Item</h2>
    <hr>
        <div class="row">
        <div class="col-md-7 border-right">

        @foreach(App\Models\Cart::totalcarts() as $cart)

        <p>
        {{ $cart->product->title }} - 
        <strong>{{ $cart->product->price }} taka </strong> - 
        {{ $cart->product_quantity }} item
        </p>

        @endforeach
        </div>

        <div class="col-md-5">
        @php
        $total_price = 0;
        @endphp
        @foreach(App\Models\Cart::totalcarts() as $cart)
            @php 
            $total_price += $cart->product->price * $cart->product_quantity;
            @endphp
        @endforeach
        <p>Total price : <strong>{{ $total_price }}</strong> Taka </p>
        <p>Total price with shipping cost : <strong>{{ $total_price + App\Models\Setting :: first()->shipping_cost }}</strong> Taka</p>
        </div>
        
        </div>

    <p>
    <a href="{{ route('carts') }}">Change cart items</a>
    </p>
    </div>

    <div class="card card-body mt-2 mb-3">
    <h2>Shipping address</h2>
    <hr>
    <form method="POST" action="{{ route('checkout.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (Optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="4" value="" autocomplete="message"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address ') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" type="text" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" rows="4" value="" autocomplete="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Select a Payment method ') }}</label>

                        <div class="col-md-6">
                        <select name="payment_method_id" id="payments" class="form-control" require>
                        <option value="">Select a payment method please</option>
                        @foreach($payments as $payment)
                        <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                        @endforeach
                        </select>

                       @foreach($payments as $payment)
                       
                       @if($payment->short_name == 'cash_in')
                       <div id="payment_{{ $payment->short_name }}" class="alert alert-success text-center mt-2 hidden">
                       <h3>
                       For cash in there is nothing necessary. Just click finish order.
                       <small>
                       <br>
                       You will get your product two business days.
                       </small>
                       </h3>
                       </div>
                       @else
                       <div id="payment_{{ $payment->short_name }}" class="alert alert-success text-center mt-2 hidden">
                       <h3>{{ $payment->name }} Payment</h3>
                       <p>
                       <strong>{{ $payment->name }} No : {{ $payment->no }}</strong>
                       <br>
                       <strong>Account type : {{ $payment->type }}</strong>
                       </p>
                       <div class="alert alert-success">
                       Please send the above money to this number and write your transaction code bellow there..

                       </div>

                       </div>
                       @endif
                       
                       @endforeach
                       <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">


                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>

</div>

    @endsection

    @section('scripts')
                        <script type="text/javascript">
                        $("#payments").change(function(){
                            $payment_methods = $("#payments").val();
                            if($payment_methods == 'cash_in'){
                            $("#payment_cash_in").removeClass('hidden');
                            $("#payment_bkash").addClass('hidden');
                            $("#payment_rocket").addClass('hidden');
                            }else if($payment_methods == 'bkash'){
                            $("#payment_bkash").removeClass('hidden');
                            $("#payment_cash_in").addClass('hidden');
                            $("#payment_rocket").addClass('hidden');
                            $("#transaction_id").removeClass('hidden');
                            }else if($payment_methods == 'rocket'){
                            $("#payment_rocket").removeClass('hidden');
                            $("#payment_bkash").addClass('hidden');
                            $("#payment_cash_in").addClass('hidden');
                            $("#transaction_id").removeClass('hidden');
                            }
                        })
                        </script>

    @endsection