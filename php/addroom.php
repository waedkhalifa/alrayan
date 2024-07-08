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
    <link href="front/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        h1{
            background: linear-gradient(330deg,rgba(40,183,141,0.8),rgba(255,222,89,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
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
                    <a href="adminInfo.php"><i class="fa fa-user fa-fw"></i>Admins Data</a>
                </li><li>
                    <a href="avroom.php"><i class="fa fa-bell"></i>Available Rooms</a>
                </li>
                <li>
                    <a class="active-menu" href="addroom.php"><i class="fa fa-plus-circle"></i>Add Rooms</a>
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
                        NEW ROOM <small></small>
                    </h1>
                </div>
            </div>


            <div class="row">

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post">
                                <div class="form-group">
                                    <label>Type Of Room *</label>
                                    <select name="troom"  class="form-control" required>
                                        <option value selected ></option>
                                        <option value="Superior Room">SUPERIOR ROOM</option>
                                        <option value="Deluxe Room">DELUXE ROOM</option>
                                        <option value="Luxury Room">LUXURY ROOM</option>
                                        <option value="Single Room">SINGLE ROOM</option>
                                        <option value="Family Room">FAMILY ROOM</option>
                                        <option value="King Room">KING ROOM</option>
                                    </select>
                                </div>


                                <input type="submit" name="add" value="Add New" class="btn btn-primary">
                            </form>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "alrayan");
                            if(isset($_POST['add']))
                            {
                                $room = $_POST['troom'];
                                $free = 'Not Booked';

                                $check="SELECT * FROM rooms WHERE type = '$room'";
                                $rs = mysqli_query($con,$check);

                                    $sql ="INSERT INTO `rooms`( `roomtype`,`free`) VALUES ('$room','$free')" ;
                                    if(mysqli_query($con,$sql))
                                    {
                                        echo '<script>alert("New Room has been Added") </script>' ;
                                    }else {
                                        echo "<script> alert('An error in the registration process')</script>";

                                    }

                            }

                            ?>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                ROOMS INFORMATION
                            </div>
                            <div class="panel-body">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <?php
                                    $sql = "select * from rooms";
                                    $re = mysqli_query($con,$sql)
                                    ?>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Room ID</th>
                                                    <th>Room Type</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                while($row= mysqli_fetch_array($re))
                                                {
                                                    $id = $row['roomid'];

                                                        echo "<tr>
													<td>".$row['roomid']."</td>
													<td>".$row['roomtype']."</td>
												</tr>";

                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>
    <script src="front/js/jquery-1.10.2.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.metisMenu.js"></script>
    <script src="front/js/custom-scripts.js"></script>


</body>
</html>
