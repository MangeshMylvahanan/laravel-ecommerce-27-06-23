<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body class="bg-dark">
    <form enctype="multipart/form-data" action="/store" method="POST">
        <div class="col-md-2">
            <label for="validationCustom01" class="form-label text-light">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter product name.
            </div>
        </div>
        <div class="col-md-2">
            <label for="validationCustom02" class="form-label text-light">Actual Price</label>
            <input type="text" name="product_price" class="form-control" id="validationCustom02" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter the price.
            </div>
        </div>
        <div class="col-md-2">
            <label for="validationCustom03" class="form-label text-light">Discount</label>
            <input type="text" name="product_discount" class="form-control" id="validationCustom03" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter the discount.
            </div>
        </div>
        <div class="col-md-2">
            <label for="validationCustom04" class="form-label text-light">Discount Price</label>
            <input type="text" name="product_discountprice" class="form-control" id="validationCustom04" required>
            <div class="valid-feedback">
                    Looks good!
            </div>
            <div class="invalid-feedback">
                mandatory.
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label text-light">Description</label>
                <input type="text" name="product_description" class="form-control" id="validationCustom05" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    mandatory.
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <label for="validationCustom06" class="form-label text-light">Catagory</label>
            <select name="catagory" class="form-select" id="validationCustom06" required>
                <option selected disabled value="">choose..</option>
                <option>mens</option>
                <option>womens</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid catagory.
            </div>
        </div>
        <div class="col-md-2">
            <label for="validationCustom07" class="form-label text-light">Sub-Catagory</label>
            <select name="sub_catagory" class="form-select" id="validationCustom07" required>
                <option selected disabled value="">choose..</option>
                <option>shirts</option>
                <option>pants</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid subcatagory.
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="validationCustom08" class="form-label text-light">Product Photo</label>
                <input type="file" name="product_image" class="form-control" id="validationCustom08" required>
            </div>
            <div class="invalid-feedback">
                Please select a product image.
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="validationCustom09" class="form-label text-light">Upload some images here!</label>
                <input type="file" name="product_multi-images" class="form-control" id="validationCustom09">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>
</body>

</html>
