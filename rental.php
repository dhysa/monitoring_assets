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
    include "navbar.inc.php";?>

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
          Rental Record
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body">
       
          <body>
     <div id="rental" style="width: 1000px;"></div>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jTable
            $('#rental').jtable({
                title: 'RENTAL TABLE',
                actions: {
                    listAction: 'rental_crud.php?action=list',
                    //createAction: 'user_crud.php?action=create',
                    //updateAction: 'user_crud.php?action=update',
                    deleteAction: 'rental_crud.php?action=delete'
                },
                fields: {
                    
                    id_rental: {
                        title: 'ID rental',
                        width: 'auto',
                        key: true
                        
                    },
                    jenis_rental: {
                        title: 'Jenis',
                        width: 'auto'
                        //key: true
                        //create: false,
                        //edit: false
                        // list: false
                    },
                    size_rental: {
                        title: 'Size (m2)',
                        width: 'auto'
                    },
                    note_rental: {
                        title: 'Size (m2)',
                        width: 'auto'
                    },
                    deed_no: {
                        title: 'Deed No.',
                        width: 'auto'
                    },
                    date_agreements: {
                        title: 'Date Agreement',
                        width: 'auto'
                    },
                    remarks: {
                        title: 'Remarks Agreement',
                        width: 'auto'
                    },
                    fee_remarks: {
                        title: 'Remarks Fee',
                        width: 'auto'
                    },
                }
            });

            //Load person list from server
            $('#rental').jtable('load');

        });
    </script>
          
      </div>
    </div>
  </div>
                        
                        <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Input Rental Record
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="rental_submit.php" method="post">
                                <!--form input users-->
                                <div class="form-group">
                                    <label for="id_users_label" class="col-sm-2 control-label">ID Rental </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_rental" placeholder="ID Rental">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Jenis </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_rental" placeholder="Jenis Rental">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Size </label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control" name="size_rental" placeholder="Size">
                                    </div>
                                </div>                                                                
                                    <div class="form-group">
                                    <label for="nama_users_label" class="col-sm-2 control-label">Agreement</label>
                                    <div class="col-sm-10">
                                        <select name="id_agreement" class="form-control">
                                            <option>Deed No./Date </option>
                                                <?php $ambil=mysql_query( "SELECT id_agreement,deed_no,date_agreements FROM agreements");
                                                    while($data=mysql_fetch_array($ambil)) 
                                                    { echo "<option value=$data[id_agreement]>
                                                    $data[deed_no]/$data[date_agreements]</option>"; } ?>                                    
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_users_label" class="col-sm-2 control-label">Notes </label>
                                    <div class="col-sm-10">
                                     <textarea name="note_rental" class="form-control" rows="3"></textarea>
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
