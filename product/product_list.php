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
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sold out</th>
                                <th>Product day</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Producer</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT p.*,c.Name,d.ProducerName FROM products p,category c,producer d WHERE p.CatID = c.CatID and p.IdProducer = d.IdProducer";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) 
                                    while($row = mysqli_fetch_assoc($result)):     
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['Name'] ?></td>
                                <th><?= $row['ProductName'] ?></th>
                                <td><?= $row['Price'] ?></td>
                                <td><?= $row['Quantity'] ?></td>
                                <td><?= $row['Sold out'] ?></td>
                                <td><?= $row['ProductDay'] ?></td>
                                <td><?= $row['Image'] ?></td>
                                <td><?= $row['Description'] ?></td>
                                <td><?= $row['ProducerName'] ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="http://localhost/admin/product/product_list.php?id=<?= $row['id'] ?>"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="http://localhost/admin/product/product_edit.php?id=<?= $row['id'] ?>">Edit</a></td>
                            </tr>
                            <?php endwhile;?>
                            <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql = "DELETE FROM products WHERE id = $id";
                                    mysqli_query($conn, $sql);
                                }
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
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
    });
    </script>
</body>

</html>
