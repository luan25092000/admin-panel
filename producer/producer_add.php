<?php include '../connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nguyễn Hữu Luân - sinh viên trường Học viện kĩ thuật mật mã">
    <title>Producer</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <?php include '../template.php';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Producer
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="http://localhost/admin/producer/producer_add.php" method="POST" id="producerForm">
                            <div class="form-group">
                                <label>ID Producer</label>
                                <input class="form-control" name="idProducer" placeholder="Please Enter Id Producer" required/>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtProducer" placeholder="Please Enter Producer Name" required/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="txtAddress" placeholder="Please Enter Address" required/>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="tel" class="form-control" name="tel" placeholder="Please Enter Telephone Number" required/>
                            </div>
                            <button type="submit" class="btn btn-default" name="addProducer">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#producerForm").submit(function(){
            <?php 
                if(isset($_POST['addProducer'])){
                    $idProducer = $_POST['idProducer'];
                    $name = $_POST['txtProducer'];
                    $address = $_POST['txtAddress'];
                    $tel = $_POST['tel'];
                    if(!empty($idProducer)){
                        $sql = "INSERT INTO producer (IdProducer, ProducerName, Address, Tel) VALUES ('$idProducer', '$name', '$address', '$tel');";
                    }
                    if(!mysqli_query($conn, $sql)){
                        die("Error: ".mysqli_error($conn));
                    }
                    mysqli_close($conn);
                }
            ?>
        });
    });
    </script>
</body>

</html>
