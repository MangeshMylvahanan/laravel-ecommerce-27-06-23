@extends('Home.master')
@section('main-content')
<div  id="cartmsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;" >
    product removed from cart 
</div>

    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Wait for order!</h4>
                @foreach ($products as $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ asset('uploads/' . $item->product_image) }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>{{ $item->product_name }}</h2>
                                <h5>{{ $item->product_discountprice }}/-</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="product_{{$item->cart_id}}" hidden value={{ $item->cart_id }}>
                            <button onclick="removecartFunc({{ $item->cart_id }})" class="btn btn-primary">Remove from
                                Cart</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="btn btn-success" href="/buynow">Order Now</a> <br> <br>
        </div>
    </div>
@endsection
<script>
    function removecartFunc(id) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: "/removecart/" + id,
            type: 'GET', // Change the request type to POST
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: {
                _method: 'DELETE' // Use _method to simulate a DELETE request
            },
            success: function(response) {
                console.log(response.message);
                $("#cart_id").val(response.status);
                $("#cartmsgid").show();

                setTimeout(function() {
                    $("#cartmsgid").hide();
                }, 3000);
                $("#product_" + id).remove();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
</script> 