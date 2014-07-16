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
    <?php include "kon.inc.php"; ?>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Dashboard</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <br/>
                            <?php echo "ID anda: ". $_SESSION[ 'id_users']; ?>
                            <br/>
                        </li>
                        <li>
                            <a href="profile_users.php"><i class="glyphicon glyphicon-user fa-fw"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="create_users.php"><i class="glyphicon glyphicon-pencil fa-fw"></i> Create User</span></a>

                        </li>
                        <li>
                            <a href="forms.html"><i class="glyphicon glyphicon-th-large fa-fw"></i> Assets Standard</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-home fa-fw"></i> Cabang<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tier.php">Tier</a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
                                        <p class="form-control-static"><?php echo $_SESSION['nama_users']; ?></p>
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
