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
    <?php 
    include "kon.inc.php";
    include "navbar.inc.php"; ?>

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
    <div id="Asstand" style="width: 900px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jTable
            $('#Asstand').jtable({
                title: 'ASSET STANDARD',
                actions: {
                    listAction: 'asstand_crud.php?action=list',
                    //createAction: 'user_crud.php?action=create',
                    //updateAction: 'asstand_crud.php?action=update',
                    deleteAction: 'asstand_crud.php?action=delete'
                },
                fields: {
                    id_assets_standard: {
                        title: 'ID Assets Standard',
                        width: '20%',
                        key: true,
                        //create: false,
                        edit: false
                        //list: false
                    },
                    nama_assets_standard: {
                        title: 'Nama Assets Standard',
                        width: '40%'
                    },
                    jumlah_assets_standard: {
                        title: 'Jumlah Assets Standard',
                        width: '30%'
                    },
                    nama_tier: {
                        title: 'Tier',
                        width: '20%'
                    },

                }
            });

            //Load person list from server
            $('#Asstand').jtable('load');

        });
    </script>
          
      </div>
    </div>
  </div>
                        
                        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Input Asset Standard
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="asstand_submit.php" method="post">
                                <!--form input users-->
                                <div class="form-group">
                                    <label for="id_users_label" class="col-sm-2 control-label">ID Asset Standar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_assets_standard" placeholder="ID Asset Standar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Nama Assets Standar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_assets_standard" placeholder="Nama Assets Standar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Jumlah Assets Standard</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jumlah_assets_standard" placeholder="Jumlah Assets Standard">
                                    </div>
                                </div>                                                                
                                    <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">Tier</label>
                                    <div class="col-sm-10">
                                        <select name="id_tier" class="form-control">
                                            <option>Silahkan pilih satu. </option>
                                                <?php $ambil=mysql_query( "SELECT id_tier,nama_tier FROM tier");
                                                    while($data=mysql_fetch_array($ambil)) 
                                                    { echo "<option value=$data[id_tier]>
                                                    $data[nama_tier]</option>"; } ?>                                    
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
    

</body>

</html>
