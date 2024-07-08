<?php
session_start();
if(isset($_SESSION["isLoggedInAdmin"]))
{
    if(($_SESSION['isLoggedInAdmin'])!=1){
        header("location:register.php");

    }
}
else{
    header("location:register.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administratration	</title>

    <link href="front/css/bootstrap.css" rel="stylesheet" />
    <link href="front/css/font-awesome.css" rel="stylesheet" />
    <link href="front/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="front/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="css/fontawesome.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <style>
        h1{
            background: linear-gradient(330deg,rgba(40,183,141,0.8),rgba(255,222,89,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <script>
        $(function() {
            $(document).ready(function() {
                $('#example').DataTable();
            });
        });

    </script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="waedAdmin.php">MAIN MENU </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="adminInfo.php"><i class="fa fa-gear fa-fw"></i>Main Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="register.php"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>

            </li>
        </ul>
    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">


                <li>
                    <a class="active-menu" href="adminInfo.php"><i class="fa fa-user fa-fw"></i>Admins Data</a>
                </li><li>
                    <a href="avroom.php"><i class="fa fa-bell"></i>Available Rooms</a>
                </li>
                <li>
                    <a href="addroom.php"><i class="fa fa-plus-circle"></i>Add Rooms</a>
                </li>
                <li>
                    <a href="removerooms.php"><i class="fa fa-trash-o fa-lg"></i>Delete Rooms</a>
                </li>



        </div>

    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        ADMINS<small> accounts </small>
                    </h1>
                </div>
            </div>


            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="color: #129f75; font-weight: bold; font-size: 15px">ID</th>
                                        <th style="color: #129f75; font-weight: bold; font-size: 15px">FIRST NAME</th>
                                        <th style="color: #129f75; font-weight: bold; font-size: 15px">LAST NAME</th>
                                        <th style="color: #129f75; font-weight: bold; font-size: 15px">EMAIL</th>
                                        <th style="color: #129f75; font-weight: bold; font-size: 15px">PASSWORD</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    ob_start();
                                    @$con = mysqli_connect("localhost", "root", "", "alrayan");
                                    $sfa = "SELECT * FROM `admin`";
                                    $rw5 = mysqli_query($con,$sfa);
                                    while($row = mysqli_fetch_array($rw5))
                                    {

                                        $id = $row['adminid'];
                                        $em=$row['adminemail'];
                                        $fn = $row['firstn'];
                                        $sn = $row['lastn'];
                                        $ps = $row['passwordadmin'];

                                            echo"<tr>
													<td>".$id."</td>
													<td>".$fn."</td>
													<td>".$sn."</td>
													<td>".$em."</td>
													<td>".$ps."</td>
											
													
												</tr>";



                                    }

                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
                            Add New Admin
                        </button>
                        <button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'> Update </button>
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Add new Admin</h4>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Add Admin first name</label>
                                                <input name="newfn"  class="form-control" placeholder="Enter first name" required>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Add Admin last name</label>
                                                <input name="newln"  class="form-control" placeholder="Enter last name" required>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Add Email</label>
                                                <input name="neweml" type="email" class="form-control" placeholder="Enter email" required>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input name="newps"  class="form-control" placeholder="Enter Password" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            <input type="submit" name="in" value="Add" class="btn btn-primary">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                if(isset($_POST['in']))
                {
                    $newfn = $_POST['newfn'];
                    $newln = $_POST['newln'];
                    $newps = $_POST['newps'];
                    $newemm=$_POST['neweml'];

                    $sql ="Insert into admin (firstn,lastn,adminemail,passwordadmin) values ('$newfn','$newln','$newemm','$newps')";
                    if(mysqli_query($con,$sql))
                    {
                        echo' <script> alert("New Admin has been Added") </script>';
                    }
                    else {
                        echo "<script> alert('An error in the registration process')</script>";

                    }
                    header("Location: adminInfo.php");
                    exit();

                }
                if(isset($_POST['up'])){
                    $id= $_POST['iidd'];
                    $ffname=  $_POST['ffname'];
                    $llname = $_POST['llname'];
                    $passwo = $_POST['passw'];
                    if(isset($_POST['ffname'])&&!empty($_POST['ffname'])){
                        $sql1="UPDATE admin SET firstn='$ffname' WHERE adminid='$id'";
                        $st1 = mysqli_query($con,$sql1);

                    }
                    if(isset($_POST['llname'])&&!empty($_POST['llname'])){
                        $sql2="UPDATE admin SET lastn='$llname' WHERE adminid='$id'";
                        $st2 = mysqli_query($con,$sql2);

                    }
                    if(isset($_POST['passw'])&& !empty($_POST['passw'])){
                        $sql3="UPDATE admin SET passwordadmin='$passwo' WHERE adminid='$id'";
                        $st3 = mysqli_query($con,$sql3);

                    }


                }
                ?>

                <div class="panel-body">

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Change Admin name and Password</h4>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Enter Admin ID</label>
                                            <input name="iidd" value=" " class="form-control" placeholder="Enter Admin ID">
                                        </div>
                                        <div class="form-group">
                                            <label>Change Admin first name</label>
                                            <input name="ffname" class="form-control" placeholder="Enter Admin first name">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Change Admin last name</label>
                                            <input name="llname" class="form-control" placeholder="Enter Admin last name">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="passw" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        <input type="submit" name="up" value="Update" class="btn btn-primary">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            ob_end_flush();

            ?>


        </div>
        </div>
    </div>





</div>
</div>

<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery.metisMenu.js"></script>
<script src="front/js/morris/raphael-2.1.0.min.js"></script>
<script src="front/js/morris/morris.js"></script>
<script src="front/js/custom-scripts.js"></script>

</body>
</html>
