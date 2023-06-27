
<?php $__env->startSection('main-content'); ?>   
<div class="row">
    <div class="col-md-3">
        <div id="cartmsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;">
            Product added to cart 
        </div>

        <form action="<?php echo e(route('searchProducts')); ?>" method="GET" class="mb-4">
            <div class="form-group">
                <h3>Filters</h3>
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">All Categories</option>
                    <option value="mens">Mens</option>
                    <option value="womens">Womens</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <select name="amount" id="amount" class="form-control">
                    <option value="">All Amounts</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="col-md-9">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card">
                        <a href="detail/<?php echo e($item['id']); ?>">
                            
                            <h4><?php echo e($item['product_name']); ?></h4>
                            <p><b>Discount:</b><?php echo e($item['product_discount']); ?>%</p>
                            <p><b>Price:</b><?php echo e($item['product_price']); ?>/-</p>
                            <p><b>Discount Price:</b><?php echo e($item['product_discountprice']); ?>/-</p>
                        </a>
                        <a href="/buynow" class="btn btn-success">Buy now</a>
                        <button onclick="addcartfunc(<?php echo e($item['id']); ?>)" class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
function addcartfunc(id) {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: "add_to_cart", 
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

<?php echo $__env->make('Home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/shop.blade.php ENDPATH**/ ?>