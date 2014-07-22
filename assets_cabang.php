<?php session_start(); ?>

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
                <a class="navbar-brand" href="dash_admin.php">Data Entry Dashboard</a>
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
                            <a href="profile_users_de.php"><i class="glyphicon glyphicon-user fa-fw"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="assets_standard.php"><i class="glyphicon glyphicon-th-large fa-fw"></i> Assets Cabang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $_SESSION['nama_users'] ; ?> </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--      Collapse              -->
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Table Gabungan Asset Cabang dan Assets Standard
        </a>
        </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id="UserTable" style="width: 1000px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jTable
            $('#UserTable').jtable({
                title: 'ASSET GABUNGAN',
                actions: {
                    listAction: 'assets_gab_crud.php?action=list'
                    //createAction: 'user_crud.php?action=create',
                    //updateAction: 'user_crud.php?action=update',
                    //deleteAction: 'user_crud.php?action=delete'
                },
                fields: {
                    
                    nama_tier: {
                        title: 'Tier',
                        width: '20%',
                        key: true
                        
                    },
                    nama_assets: {
                        title: 'Nama Assets',
                        width: '20%',
                        //key: true
                        //create: false,
                        //edit: false
                        // list: false
                    },
                    jumlah_assets: {
                        title: 'Jumlah Assets',
                        width: '20%'
                    },
                    nama_assets_standard: {
                        title: 'Asset Standard',
                        width: '20%'
                    },
                    jumlah_assets_standard: {
                        title: 'Jumlah Assets Standard',
                        width: '30%'
                    },
                }
            });

            //Load person list from server
            $('#UserTable').jtable('load');

        });
    </script>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Table Assets Standard
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
       
          <body>
     <div id="AsCab" style="width: 1000px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jTable
            $('#AsCab').jtable({
                title: 'ASSET CABANG',
                actions: {
                    listAction: 'ascab_crud.php?action=list',
                    //createAction: 'user_crud.php?action=create',
                    //updateAction: 'user_crud.php?action=update',
                    deleteAction: 'user_crud.php?action=delete'
                },
                fields: {
                    
                    id_assets: {
                        title: 'ID asset',
                        width: '20%',
                        key: true
                        
                    },
                    nama_assets: {
                        title: 'Nama Assets',
                        width: '20%'
                        //key: true
                        //create: false,
                        //edit: false
                        // list: false
                    },
                    jumlah_assets: {
                        title: 'Jumlah Assets',
                        width: '20%'
                    },
                    id_assets_standard: {
                        title: 'ID Assets Standard',
                        width: '20%'
                    },
                }
            });

            //Load person list from server
            $('#AsCab').jtable('load');

        });
    </script>
          
      </div>
    </div>
  </div>
                        
                        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Input Asset Cabang
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="ascab_submit.php" method="post">
                                <!--form input users-->
                                <div class="form-group">
                                    <label for="id_users_label" class="col-sm-2 control-label">ID Asset </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_assets" placeholder="ID Asset">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Nama Assets </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_assets_standard" placeholder="Nama Assets">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Jumlah Assets </label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control" name="jumlah_assets_standard" placeholder="Jumlah Assets">
                                    </div>
                                </div>                                                                
                                    <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">ID Assets Standard</label>
                                    <div class="col-sm-10">
                                        <select name="id_assets_standard" class="form-control">
                                            <option>Silahkan pilih satu. </option>
                                                <?php $ambil=mysql_query( "SELECT id_assets_standard FROM assets_standard");
                                                    while($data=mysql_fetch_array($ambil)) 
                                                    { echo "<option value=$data[id_assets_standard]>
                                                    $data[id_assets_standard]</option>"; } ?>                                    
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="create" value="create" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
      </div>
    </div>
  </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
