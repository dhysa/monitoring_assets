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
                                    <a href="tier.php">Record Payment</a>
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
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Agreement Record
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
       
          <body>
     <div id="agreement" style="width: 1000px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jTable
            $('#agreement').jtable({
                title: 'RENTAL TABLE',
                actions: {
                    listAction: 'agreement_crud.php?action=list',
                    //createAction: 'user_crud.php?action=create',
                    //updateAction: 'user_crud.php?action=update',
                    deleteAction: 'agreement_crud.php?action=delete'
                },
                fields: {
                    
                    id_agreement: {
                        title: 'ID asset',
                        width: '10%',
                        key: true
                        
                    },
                    deed_no: {
                        title: 'Deed No.',
                        width: '20%'
                        //key: true
                        //create: false,
                        //edit: false
                        // list: false
                    },
                    date_agreements: {
                        title: 'Date Agreement',
                        width: '20%'
                    },
                    remarks: {
                        title: 'Remarks',
                        width: '40%'
                    },
                    fee_remarks: {
                        title: 'Remarks Fee',
                        width: '30%'
                    },
                }
            });

            //Load person list from server
            $('#agreement').jtable('load');

        });
    </script>
          
      </div>
    </div>
  </div>
                        
                        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Input Agreement Record
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="agreement_submit.php" method="post">
                                <!--form input users-->
                                <div class="form-group">
                                    <label for="id_users_label" class="col-sm-2 control-label">ID Agreement </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_agreement" placeholder="ID Agreement">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Deed No. </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="deed_no" placeholder="Deed No. ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Date </label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control" name="date_agreements" placeholder="Date">
                                    </div>
                                </div>                                                                
                                    <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea name="remarks" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Remarks Fee </label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control" name="fee_remarks" placeholder="Jumlah Assets">
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
