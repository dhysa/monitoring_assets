<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Monitoring Assets</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
   <?php 
    include "kon.inc.php"; 
    include "navbar.inc.php";?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $_SESSION['nama_users']; ?> </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- panel-heading -->
                            <i class="glyphicon glyphicon-pencil fa-fw"></i> Create Users
                        </div>

                        <div class="panel-body">
                            <!-- panel-body -->

                            <form class="form-horizontal" role="form" action="update_users.php" method="post">
                                <!--form tampilkan user-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID User</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static"><?php echo $_SESSION['id_users']; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama User </label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static"><?php echo $_SESSION['nama_users']; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis User </label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static"><?php echo $_SESSION['jenis_users']; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Cabang </label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">not work yet</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"  class="btn btn-default">Update</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>


    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
    <script src="js/sb-admin.js"></script>
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
