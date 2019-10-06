

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>



<script>
    $.ajaxSetup({
  type: "POST",
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
    });

function addToCart(product_id){

var url = "{{ url('/') }}";
    $.post( url+"/api/carts/store", 
    { product_id : product_id })
  .done(function( data ) {
    data = JSON.parse(data);
    if(data.status == 'success'){
        // toast
        alertify.set('notifier','position', 'top-center');
        alertify.success('Item added to cart successfully !! total items : '+ data.totalItems +
         '<br/> To checkout <a href="{{ route('carts') }}">go to checkout page.</a>');
        $("#totalItems").html(data.totalItems);
    }
  });
}
</script>
