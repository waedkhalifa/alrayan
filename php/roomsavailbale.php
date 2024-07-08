<?php

session_start();
if(isset($_SESSION['isLoggedIn'])){
    if(($_SESSION['isLoggedIn'])!=1){
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
    <title>Administration</title>
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
            <a class="navbar-brand" href="index.html">MAIN PAGE </a>
        </div>


    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">



        </div>

    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Available Rooms
                    </h1>
                </div>
            </div>


            <?php
            $con = mysqli_connect("localhost", "root", "", "alrayan");
            $sql = "select * from rooms";
            $re = mysqli_query($con,$sql);
            $ntbkd="Not Booked";
            ?>
            <div class="row">


                <?php
                while($row= mysqli_fetch_array($re)) {
                    $checkkk = $row['free'];
                    if ($checkkk == $ntbkd) {
                        $id = $row['roomtype'];
                        if ($id == "Superior Room") {
                            $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
													<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
															
															
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";
                        } else if ($id == "Deluxe Room") {
                            $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
															
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";

                        } else if ($id == "Family Room") {
                            $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
															
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";

                        } else if ($id == "Single Room") {                    $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";

                        } else if ($id == "King Room") {
                            $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";

                        } else if ($id == "Luxury Room") {                    $qid = $row['roomid'];

                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3 style='font-weight: bold'>" . $row['roomid'] . "</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=reserveInfo.php?qid=".$qid."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Book
													</button></a>
															" . $row['roomtype'] . "

														</div>
													</div>
												</div>";

                        }
                    }
                }
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
