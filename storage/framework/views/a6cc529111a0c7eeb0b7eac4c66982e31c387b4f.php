<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>E-comm Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <!-- CSS file -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">

<!-- JavaScript file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>

    <style>
        .custom-login {
            height: 500px;
            padding-top: 100px;
        }

        img.slider-img {
            height: 400px !important
        }

        .custom-product {
            height: 600px
        }

        .slider-text {
            background-color: #35443585 !important;
        }

        .trending-image {
            height: 100px;
        }

        .trening-item {
            float: left;
            width: 20%;
        }

        .trending-wrapper {
            margin: 30px;
        }

        .detail-img {
            height: 200px;
        }

        .search-box {
            width: 500px !important
        }

        .cart-list-devider {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px
        }
    </style>
</head>

<body>
    <?php echo $__env->make('Includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('main-content'); ?>


    <?php echo $__env->yieldSection(); ?>
    <?php echo $__env->make('Includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\E-Commerce\resources\views/Home/master.blade.php ENDPATH**/ ?>