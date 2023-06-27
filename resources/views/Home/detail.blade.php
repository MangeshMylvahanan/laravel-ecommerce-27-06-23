@extends('Home.master')
@section('main-content')
<div  id="cartmsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;" >
    product added to cart 
 </div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <img class="detail-img" src="{{ asset('uploads/' . $products['product_image']) }}" alt="">
        </div>
        <div class="col-sm-6">
        <h2>{{$products['product_name']}}</h2>
        <h4><b>Price : </b>{{$products['product_price']}}/-</h3>
        <h3><b>Discount Price : </b>{{$products['product_discountprice']}}/-</h3>
        <h4><b>Details: </b>{{$products['product_description']}}.</h4>
        <h4><b>catagory: </b>{{$products['catagory']}}</h4>
        <br><br>
        {{-- <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{$products['id']}}> --}}
        <button onclick="addcartfunc({{ $products['id'] }})" class="btn btn-primary">Add to Cart</button>        </form>
        <br><br>
        <a href="/buynow" class="btn btn-success">Buy Now</a>
        <br><br>
     </div>
    </div>
 </div>
@endsection
<script>
    function addcartfunc(id) {
     var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
 
     $.ajax({
         url: "/add_to_cart", 
         type: 'POST',
         headers: {
             'X-CSRF-TOKEN': csrfToken, 
         },
         data: {
             product_id: id,
         },
         success: function(status) {
             console.log(status.message);
             $("#cart_id").val(status.status);
             $("#cartmsgid").show();
             
             setTimeout(function() {
                $("#cartmsgid").hide();
             }, 3000);
            
             // $("#cartmsgid").val(status.message);
         },
         error: function(xhr, status, error) {
             console.log(id);
         }
     });
 }
 
 </script>