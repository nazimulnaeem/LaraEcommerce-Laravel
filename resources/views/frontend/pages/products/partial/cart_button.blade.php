<form action="{{ route('cart.store') }}" method="post" class="form-inline">
@csrf
<input type="hidden" name="product_id" value="{{ $product->id }}">
<button type="button" class="btn btn-outline-warning" onClick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button>
</form>