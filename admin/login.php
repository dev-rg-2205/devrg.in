<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="../public/assets/img/logo.png" width="200px" height="200px" alt="Logo">
                        <h1 class="h4 text-gray-900">Welcome Back!</h1>
                    </div>
                    <form class="user" id="loginForm">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                   placeholder="Enter Email Address..." required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                   placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<!-- jQuery MUST be first -->
<script src="../admin/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SB Admin -->
<script src="assets/js/sb-admin-2.min.js"></script>
<script src="assets/js/login.js"></script>

</html>
