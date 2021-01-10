<?php include '../connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nguyễn Hữu Luân - sinh viên trường Học viện kĩ thuật mật mã">
    <title>Category</title>

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
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="http://localhost/admin/category/cate_edit.php" method="POST" id="cateForm">
                            <?php
                                if (isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM category WHERE CatID = $id";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        $row = mysqli_fetch_assoc($result);
                                    }
                                }
                            ?>
                                <input type="hidden" name="id" value="<?= isset($row['CatID']) ? $row['CatID'] : '' ?>" />
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" name="txtCateName" value="<?= isset($row['Name']) ? $row['Name'] : '' ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="cateImage">
                                </div>
                            <button type="submit" class="btn btn-default" name="edit">Edit</button>
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
        $("#cateForm").submit(function(){
            <?php 
                if(isset($_POST['edit'])){
                    $id = $_POST['id'];
                    $cateName = $_POST['txtCateName'];
                    $cateImage = $_POST['cateImage'];
                    if(!empty($cateName)){
                        $sql = "UPDATE category SET Name='$cateName',Image='$cateImage' WHERE CatID=$id;";
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
