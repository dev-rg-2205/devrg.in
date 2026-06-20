<?php
require 'auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dev.rg - Services</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/img/logo.png">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
         <?php include 'include/slider.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include 'include/header.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   <h1 class="h3 mb-2 text-gray-800">Skills</h1>
                  <p class="mb-4">
                  Manage all your skills details from here. You can view, search, sort, and paginate skills entries easily.
                  Use this section to update content, monitor publish status, and keep your skills details organized.
                </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">All Skills</h6>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addSkillModal">
                        <i class="fas fa-plus"></i> Add Skill
                        </button>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tableSkills" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%;">Posted Date</th>
                                            <th style="width: 15%;">Title</th>
                                            <th style="width: 15%;">Score</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                   </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'include/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</body>

<script src="assets/js/skills.js"></script>

</html>