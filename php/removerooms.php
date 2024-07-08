<?php

session_start();
if(isset($_SESSION['isLoggedInAdmin'])){
    if(($_SESSION['isLoggedInAdmin'])!=1){
        header("location:register.php");

    }
}
else{
    header("location:register.php");

}

?>

<?php
$con = mysqli_connect("localhost", "root", "", "alrayan");
$rsql ="select roomid from rooms";
$rre=mysqli_query($con,$rsql);
ob_start();
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
                    <a  href="addroom.php"><i class="fa fa-plus-circle"></i>Add Rooms</a>
                </li>
                <li>
                    <a  class="active-menu" href="removerooms.php"><i class="fa fa-trash-o fa-lg"></i>Delete Rooms</a>
                </li>



        </div>

    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        DELETE ROOM <small></small>
                    </h1>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Delete room
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post">
                                <div class="form-group">
                                    <label>Select the Room ID *</label>
                                    <select name="id"  class="form-control" required>
                                        <option value selected ></option>
                                        <?php
                                        while($rrow=mysqli_fetch_array($rre))
                                        {
                                            $value = $rrow['roomid'];
                                            echo '<option value="'.$value.'">'.$value.'</option>';

                                        }
                                        ?>

                                    </select>
                                </div>


                                <input type="submit" name="del" value="Delete Room" class="btn btn-primary">
                            </form>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "alrayan");

                            if(isset($_POST['del']))
                            {
                                $did = $_POST['id'];

                                $sql ="DELETE FROM `rooms` WHERE roomid = '$did'" ;
                                if(mysqli_query($con,$sql))
                                {
                                    echo '<script type="text/javascript">alert("Delete the Room") </script>' ;

                                    header("Location: removerooms.php");
                                }else {
                                    echo '<script>alert("Sorry ! Check The System") </script>' ;
                                }
                            }

                            ?>
                        </div>

                    </div>
                </div>


                <?php
                $con = mysqli_connect("localhost", "root", "", "alrayan");
                $sql = "select * from rooms";
                $re = mysqli_query($con,$sql)
                ?>
                <div class="row">


                    <?php
                    while($row= mysqli_fetch_array($re))
                    {
                        $id = $row['roomtype'];
                        if($id == "Superior Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
													<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
															
															
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";
                        }
                        else if ($id == "Deluxe Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
															
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";

                        }
                        else if($id =="Family Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
															
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";

                        }
                        else if($id =="Single Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";

                        }
                        else if($id =="King Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";

                        }
                        else if($id =="Luxury Room")
                        {
                            echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>".$row['roomid']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['roomtype']."

														</div>
													</div>
												</div>";

                        }
                    }
                    ?>

                </div>
                <?php

                ob_end_flush();
                ?>



            </div>
        </div>
    </div>

    <script src="front/js/jquery-1.10.2.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.metisMenu.js"></script>
    <script src="front/js/custom-scripts.js"></script>


</body>
</html>
