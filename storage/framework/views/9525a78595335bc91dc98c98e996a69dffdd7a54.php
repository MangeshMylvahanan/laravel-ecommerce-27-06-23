
<?php $__env->startSection('main-content'); ?>
<div  id="cartmsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;" >
    product removed from cart 
</div>

    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Wait for order!</h4>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/<?php echo e($item->id); ?>">
                                <img class="trending-image" src="<?php echo e(asset('uploads/' . $item->product_image)); ?>">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2><?php echo e($item->product_name); ?></h2>
                                <h5><?php echo e($item->product_discountprice); ?>/-</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="product_<?php echo e($item->cart_id); ?>" hidden value=<?php echo e($item->cart_id); ?>>
                            <button onclick="removecartFunc(<?php echo e($item->cart_id); ?>)" class="btn btn-primary">Remove from
                                Cart</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="btn btn-success" href="/buynow">Order Now</a> <br> <br>
        </div>
    </div>
<?php $__env->stopSection(); ?>
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
<?php echo $__env->make('Home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/cart.blade.php ENDPATH**/ ?>