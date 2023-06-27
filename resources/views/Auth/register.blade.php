<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <form class="row g-3 needs-validation" action="/registeruser" method="POST" novalidate>
        <div class="">
            <h2>Register Form</h2>
        </div>
        @csrf
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Full name</label>
            <input type="text" class="form-control" name="username" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">email</label>
                <input type="text" class="form-control" name="email" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Password</label>
                    <input type="text" class="form-control" id="validationCustom05" name="password" required>
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="validationCustom05" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="validationCustom05" name="password_confirmation"
                            required>
                        <div class="invalid-feedback">
                            confirm your password.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
    </form>

</body>
<script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>
