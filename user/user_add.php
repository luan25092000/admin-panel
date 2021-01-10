<?php include '../connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nguyễn Hữu Luân - sinh viên trường Học viện kĩ thuật mật mã">
    <title>User</title>

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
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>ID User</label>
                                <input class="form-control" name="idUser" placeholder="Please Enter Id User" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div style="position: relative">
                                    <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" id="password"/>
                                    <i class="far fa-eye" id="togglePassword" style="position: absolute;left:95%;top:34%;cursor:pointer;"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <div style="position: relative">
                                    <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter Password Again" id="rePassword"/>
                                    <i class="far fa-eye" id="toggleRePassword" style="position: absolute;left:95%;top:34%;cursor:pointer;"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default" name="addUser">Add</button>
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
                if(isset($_POST['addUser'])){
                    $idUser = $_POST['idUser'];
                    $username = $_POST['txtUser'];
                    $password = $_POST['txtPass'];
                    $rePassword = $_POST['txtRePass'];
                    if(!empty($username) && $password==$rePassword){
                        $password = password_hash($password,PASSWORD_BCRYPT);
                        $sql = "INSERT INTO users (id,Password, Users) VALUES ('$idUser', '$password', '$username');";
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
