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

                            <form class="form-horizontal" role="form" action="update_act.php" method="post">
                                <!--form input users-->
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">ID Users</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_users" placeholder="Please, input your ID!">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Update Jenis Users</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_users" placeholder=<?php echo $_SESSION[ 'jenis_users']; ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">Update Nama Users</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_users" placeholder="<?php echo $_SESSION['nama_users']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">Cabang</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>
                                                <option>
                                                    <?php include "kon.inc.php"; 
                                                    $ambil=mysql_query( "SELECT nama_cabang FROM cabang");                                                                                   while($data=mysql_fetch_array($ambil)) 
                                                    { echo "<option value=$data[nama_cabang]>
                                                    $data[nama_cabang]</option>"; } ?>
                                                </option>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Passwords" class="col-sm-2 control-label">Update Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pass_users" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input class="btn btn-default" type="submit" name="update" value="Update">
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
