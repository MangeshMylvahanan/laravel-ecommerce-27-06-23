<?php
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
$userId = Session::get('user')['id'];
$products = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*', 'carts.id as cart_id')
    ->get();
$totalAmount = 0;
foreach ($products as $item) {
    $totalAmount += $item->product_discountprice;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>eCommerce Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="/pay" method="POST">
        <div class="container">
            <h2>Order Details</h2>
            <br>
            <input type="hidden" value=<?php echo e($userId); ?> name="userId">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class=" row searched-item">
                    <div class="col-sm-2">
                        <a href="detail/<?php echo e($item->id); ?>">
                            <img class="trending-image" style="width: 60px;height:70px;" src="<?php echo e(asset('uploads/' . $item->product_image)); ?>">
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <div class="">
                            <p><?php echo e($item->product_name); ?></p>
                            <input type="checkbox" name="product_id[]" hidden value=<?php echo e($item->id); ?>>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="">
                            <h6><?php echo e($item->product_discountprice); ?>/-</h6>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a href="/removecart/<?php echo e($item->cart_id); ?>" class="btn btn-warning">Remove</a>
                        <p>from cart also.</p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
        <div>
            <h4 style="margin-left: 310px;">Total Amount: <input type="text" style="width: 180px;"
                    value=<?php echo e($totalAmount); ?> name="totalAmount"></h4>
        </div>
        <div class="">
            <button class="btn btn-primary" style="margin-left: 475px;" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Proceed to checkout</button>
        </div>
        <div class="offcanvas offcanvas-end bg-info" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Delivery details</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container">
                    <div class="col-md-6">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter your phone number">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/buynow.blade.php ENDPATH**/ ?>