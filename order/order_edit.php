<?php include '../connect.php';?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nguyễn Hữu Luân - sinh viên trường Học viện kĩ thuật mật mã">
    <title>Order</title>

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
                        <h1 class="page-header">Order
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="http://localhost/admin/order/order_edit.php" method="POST" id="orderForm">
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control" id="product" name="product" onmousedown="if(this.options.length>3){this.size=3;}"  onchange='this.size=0;' onblur="this.size=0;" required>
                                    <?php
                                        $sql = "SELECT * FROM products p, orderdetail d WHERE p.id = d.ProductId";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result))
                                                if($row['OrderId'] == $_GET['id']):
                                                    $productId = $row['id'];
                                    ?>
                                        <option value="<?= $row['Price']."_".$row['id'] ?>" selected><?= $row['ProductName'] ?></option>   
                                    <?php endif; ?>
                                    <?php 
                                        $sql = "SELECT * FROM products WHERE id != $productId";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result)):  
                                    ?>
                                    <option value="<?= $row['Price']."_".$row['id'] ?>"><?= $row['ProductName'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <?php
                                if (isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM orderdetail WHERE OrderId = $id";
                                    $result = mysqli_query($conn, $sql);
                                    if(isset($result)){
                                        if(mysqli_num_rows($result) > 0){
                                            $row = mysqli_fetch_assoc($result);
                                        }
                                    }
                                }
                            ?>
                            <input type="hidden" value="<?= isset($row['OrderId']) ? $row['OrderId'] : '' ?>" name="Id"/>
                            <div class="form-group">
                                <label>Price (VND)</label>
                                <input class="form-control" name="txtPrice" value="<?= isset($row['Price']) ? $row['Price'] : '' ?>" id="txtPrice" disabled/>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="qty" id="qty" value="<?= isset($row['Quantity']) ? $row['Quantity'] : '' ?>" placeholder="Please Enter Quantity" required/>
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input class="form-control" name="total" value="<?= isset($row['Total']) ? $row['Total'] : '' ?>" id="total" disabled/>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" id="user" name="user" onmousedown="if(this.options.length>3){this.size=3;}"  onchange='this.size=0;' onblur="this.size=0;" required>
                                    <?php
                                        $sql = "SELECT * FROM users u, orderdetail d WHERE u.id = d.IdUser";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result))
                                                if($row['OrderId'] == $_GET['id']):
                                                    $userId = $row['id'];
                                    ?>
                                    <option value="<?= $row['id'] ?>" selected><?= $row['Users'] ?></option>
                                    <?php endif; ?>
                                    <?php
                                        $sql = "SELECT * FROM users WHERE id != '$userId'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) 
                                            while($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['Users'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="" disabled selected>Choose status</option>
                                    <option value="Pending">Pending</option> <!--Đơn hàng đợi admin xác nhận-->
                                    <option value="Processing">Processing</option> <!--Đơn hàng đang trong quá trình giao-->
                                    <option value="Complete">Complete</option> <!--Đơn hàng đã giao thành công-->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default" name="editOrder">Edit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        $("#product").change(function(){
                var selectedProduct = $(this).val().split("_");  
                $("#txtPrice").attr("value",selectedProduct[0]);
        });
        $("#qty").change(function(){
            $("#total").attr("value",$(this).val() * $("#txtPrice").val());
        });
        $("#orderForm").submit(function(){
            <?php 
                if(isset($_POST['editOrder'])){
                    $id = $_POST['Id'];
                    $product = explode("_",$_POST['product']);
                    $productQuantity = $_POST['qty'];
                    $total = $productQuantity * $product[0];
                    $user = $_POST['user'];
                    $status = $_POST['status'];
                    if(isset($product)){
                        $sql = "UPDATE `orderdetail` SET `ProductId`= $product[1],`Price`= $product[0],`Quantity`= $productQuantity,`Total`= $total,`IdUser`= '$user',`Status`= '$status' WHERE `OrderId` = $id";
                    }
                    if (!mysqli_query($conn, $sql)) {
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
