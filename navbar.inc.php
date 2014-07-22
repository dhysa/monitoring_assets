<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Assets Standard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <!--    jTable      -->
    <link href="scripts/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
    <script src="js/sb-admin.js"></script>
    <script src="js/demo/dashboard-demo.js"></script>
    <!--    jTable      -->
    <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

</head>
<body>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dash_admin.php">Admin Dashboard</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout_act.inc.php"><i class="fa fa-sign-out fa-fw"  ></i> Logout</a>
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
                            <a href="assets_standard.php"><i class="glyphicon glyphicon-th-large fa-fw"></i> Assets Standard</a>
                        </li>
                        <li>
                            <a href="cabang.php"><i class="glyphicon glyphicon-home fa-fw"></i> Cabang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tier.php">Tier</a>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="agreement.php">Agreement</a>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="rental.php">Rental</a>
                                </li>
                            </ul>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Contract Info. <span class="fa arrow"></a>
                                    <ul class="nav nav-third-level collapse in" style="height: auto;">
                                        <li>
                                            <a href="#">Fee Record</a>
                                        </li>
                                        <li>
                                            <a href="#">Payment Record</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>