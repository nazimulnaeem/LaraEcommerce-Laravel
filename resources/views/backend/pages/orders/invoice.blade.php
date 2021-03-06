<html>
<head>
<title>Invoice - {{ $order->id }}</title>
  <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
  <style>
  .content-wrapper{
      background : #FFF;
  }
  .site-address{
      line-height : 6px;
      font-weight:300;
  }
  .invoice-heder{
      background : #f7f7f7;
      padding : 10px 20px 10px 20px;
      border-bottom : 1px solid gray;
  }
  .invoice-right-top h3{
      padding-right : 20px;
      margin-top : 20px;
      color : #ec5d01;
      font-size : 55px!important;
      font-family : serif;
  }
  .invoice-left-top{
      border-left : 4px solid #ec5d00;
      padding-left : 20px;
      padding-top : 20px;

  }
  thead{
      background : #ec5d01;
      color : #FFF;
  }
  .thanks h4{
      color : #ec5d01;
      font-size : 25px;
      font-weight : normal;
      font-family : serif;
      margin-top : 20px;
  }
  .authority h5{
      margin-top : -20px;
      color : #ec5d01;
      text-align : center;
  }
  </style>
</head>
<body>
    
        <div class="content-wrapper">

        <div class="invoice-heder">
        <div class="float-left site-logo">
        <img src="{{ asset('images/favicon.png') }}" alt="">
        </div>

        <div class="float-right site-address">
        <h4>Lara Ecommerce</h4>
        <p>Shyamoli, Dhaka Bangladesh</p>
        <p>Phone no : <a>01303579765</a></p>
        <p>E-mail : <a>info@laraecommerce.com</a></p>
        </div>
        <div class="clearfix"></div>
        </div>

        

        <div class="invoice description mt-3">
        <div class="invoice-left-top float-left">
        <h6>Invoice to</h6>
        <h3>{{ $order->name }}</h3>
        <div class="address">
        {{ $order->shipping_address }}
        <p>Phone No : {{ $order->phone }}</p>
        <p>E-mail :
        <a href="mailto:{{ $order->email }}">{{ $order->email }}</a>
        </p>
        </div>
        </div>

        <div class="invoice-right-top float-right">
        <h3>Invoice #{{ $order->id }}</h3>
        <p>{{ $order->created_at }}</p>
        </div>
        <div class="clearfix"></div>

        </div>
        
        <div class="mt-3">
            <h3>Products </h3>

                    @if($order->carts > 0)

            <table class="table table-bordered table-stripe">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Unnit Price</th>
                    <th>Subtotal Price</th>
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
                    <td>
                    {{ $cart->product_quantity }}
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
                </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td>
                   Discount
                </td>
                <td colspan="2">{{ $order->custom_discount}} Taka</strong>
                </td>
            </tr>
            
            <tr>
                <td colspan="4"></td>
                <td>
                    Shipping Cost 
                </td>
                <td colspan="2">
                    <strong>{{ $order->shipping_charge }} Taka</strong>
                </td>
            </tr>
            
            <tr>
                <td colspan="4"></td>
                <td>
                   Total Amount
                </td>
                <td colspan="2">
                    <strong>{{ $total_price +$order->shipping_charge - $order->custom_discount }} Taka</strong>
                </td>
            </tr>
            </tbody>
        </table>
        @endif

        <div class="thanks mt-3">
        <h4>Thank you for your businesses !!</h4>
        </div>

        <div class="authority float-right">
        <p>------------------------</p>
        <h5>Authority Signature</h5>
        </div>
        <div class="clearfix"></div>
           
            </div>


</body>
</html>