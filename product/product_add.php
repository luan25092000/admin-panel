<?php include '../connect.php';?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nguyễn Hữu Luân - sinh viên trường Học viện kĩ thuật mật mã">
    <title>Product</title>

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
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="http://localhost/admin/product/product_add.php" method="POST" id="productForm">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option value="" disabled selected>Choose category</option>
                                    <?php
                                        $sql = "SELECT * FROM category";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result)):     
                                    ?>
                                    <option value="<?= $row['CatID'] ?>"><?= $row['Name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtProductName" placeholder="Please Enter Productname" required/>
                            </div>
                            <div class="form-group">
                                <label>Price (VND)</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" required/>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="qty" placeholder="Please Enter Quantity" required/>
                            </div>
                            <div class="form-group">
                                <label>Sold out</label>
                                <select class="form-control" name="soldOut">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product day</label>
                                <input class="form-control" name="productDay" placeholder="Please Enter Product Day"/>
                                <small>Format: yyyy-mm-dd (Ex: 2020-11-12)</small>
                            </div>
                            <div class="form-group">
                                <label>Producer</label>
                                <select class="form-control" name="producer">
                                    <option value="" disabled selected>Choose producer</option>
                                    <?php
                                        $sql = "SELECT * FROM producer";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result)):     
                                    ?>
                                    <option value="<?= $row['IdProducer'] ?>"><?= $row['ProducerName'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default" name="addProduct">Add</button>
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
        $("#productForm").submit(function(){
            <?php 
                if(isset($_POST['addProduct'])){
                    $category = $_POST['category'];
                    $productName = $_POST['txtProductName'];
                    $productPrice = $_POST['txtPrice'];
                    $productQuantity = $_POST['qty'];
                    $soldOut = $_POST['soldOut'];
                    $productDay = $_POST['productDay'];
                    $image = $_POST['fImages'];
                    $description = $_POST['description'];
                    $producer = $_POST['producer'];
                    if(!empty($productName)){
                        $sql = "INSERT INTO `products`(`ProductName`, `CatID`, `Quantity`, `Description`, `Image`, `Sold out`, `Price`, `ProductDay`, `IdProducer`) VALUES ('$productName', $category, $productQuantity, '$description', '$image', $soldOut, $productPrice, '$productDay', '$producer')";
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
