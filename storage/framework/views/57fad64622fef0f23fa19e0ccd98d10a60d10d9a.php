<?php
use App\Http\Controllers\CartController;
use App\Models\Cart;
$total = 0;
if (Session::has('user')) {
    $userId = Session::get('user')['id'];
    $total = Cart::where('user_id',$userId)->count();
}

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">My E-Commerce</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
            </ul>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- Dropdown menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catagory <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">All</a></li>
                        </ul>
                    </li>

                </ul>


                <form action="<?php echo e(route('searchProducts')); ?>" method="GET" class="navbar-form navbar-left">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" name="search" class="form-control search-box" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/cartlist"  id="cart_id">cart(<?php echo e($total); ?>)</a></li>
                    <?php if(Session::has('user')): ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"
                                href="#"><?php echo e(Session::get('user')['name']); ?>

                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="/login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
</nav>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Includes/header.blade.php ENDPATH**/ ?>