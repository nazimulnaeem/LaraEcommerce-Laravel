

<div class="row mb-5">
        @foreach($products as $product)
      <div class="col-md-4">
      <div class="card">

    @php $i=1; @endphp

      @foreach($product->images as $image)
      @if($i > 0)
      <a href="{{ route('product.show',$product->slug) }}">
      <img class="card-img-top feature-image" src="{{ asset('images/products/'.$image->image) }}" 
      alt="{{ $product->title }}" style="height:300px;">
      </a>
      @endif

      @php $i--; @endphp

      @endforeach

      <div class="card-body">
        <h4 class="card-title">
        <a href="{{ route('product.show',$product->slug) }}">{{ $product->title }}</a>
        </h4>
        <p class="card-text">Taka - {{ $product->price }}</p>
        @include('frontend.pages.products.partial.cart_button')
      </div>
    </div>
      </div>
    @endforeach
    </div>

    