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
    <?php include "kon.inc.php"; include "navbar.inc.php";?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Welcome <?php echo $_SESSION['nama_users'] ; ?> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- panel-heading -->
                        <i class="glyphicon glyphicon-book fa-fw"></i> Data Tier
                    </div>

                    <div class="panel-body">
                        <div id="TierTable" style="width: 300px;"></div>
                        <script type="text/javascript">
                            $(document).ready(function () {

                                //Prepare jTable
                                $('#TierTable').jtable({
                                    title: 'Table Tier',
                                    actions: {
                                        listAction: 'tier_crud.php?action=list',
                                        createAction: 'tier_crud.php?action=create',
                                        updateAction: 'tier_crud.php?action=update',
                                        deleteAction: 'tier_crud.php?action=delete'
                                    },
                                    fields: {
                                        id_tier: {
                                            key: true,
                                            create: false,
                                            edit: false,
                                            list: false
                                        },
                                        nama_tier: {
                                            title: 'Nama Tier',
                                            width: '30%'
                                        },

                                    }
                                });

                                //Load person list from server
                                $('#TierTable').jtable('load');

                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- panel-heading -->
                        <i class="glyphicon glyphicon-pencil fa-fw"></i> Create Tier
                    </div>

                    <div class="panel-body">
                        <!-- panel-body -->

                        <form class="form-horizontal" role="form" action="tier_act.php" method="post">
                            <!--form input users-->
                            <div class="form-group">
                                <label for="id_users_label" class="col-sm-2 control-label">Nama Tier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_tier" placeholder="Nama Tier">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
