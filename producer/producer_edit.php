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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

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
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="http://localhost/admin/producer/producer_edit.php" method="POST" id="producerForm">
                            <?php
                                if (isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM producer WHERE IdProducer = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(isset($result)){
                                        if(mysqli_num_rows($result) > 0){
                                            $row = mysqli_fetch_assoc($result);
                                        }
                                    }
                                }
                            ?>
                            <input type="hidden" name="id" value="<?= isset($row['IdProducer']) ? $row['IdProducer'] : '' ?>"/>
                            <div class="form-group">
                                <label>ID Producer</label>
                                <input class="form-control" name="idProducer" placeholder="Please Enter Id Producer" value="<?= isset($row['IdProducer']) ? $row['IdProducer'] : '' ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtProducer" placeholder="Please Enter Producer Name" value="<?= isset($row['ProducerName']) ? $row['ProducerName'] : '' ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="txtAddress" placeholder="Please Enter Address" value="<?= isset($row['Address']) ? $row['Address'] : '' ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="tel" class="form-control" name="tel" placeholder="Please Enter Telephone Number" value="<?= isset($row['Tel']) ? $row['Tel'] : '' ?>" required/>
                            </div>
                            <button type="submit" class="btn btn-default" name="editProducer">Edit</button>
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
                if(isset($_POST['editProducer'])){
                    $id = $_POST['id'];
                    $idProducer = $_POST['idProducer'];
                    $name = $_POST['txtProducer'];
                    $address = $_POST['txtAddress'];
                    $telephone = $_POST['tel'];
                    if(!empty($name)){
                        $sql = "UPDATE `producer` SET `IdProducer`='$idProducer',`ProducerName`='$name',`Address`='$address',`Tel`='$telephone' WHERE `IdProducer` = '$id'";
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
