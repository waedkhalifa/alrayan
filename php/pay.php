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
        html,
        body {
            overflow-x: hidden;
        }

        .panel-info > .panel-heading {
            color: #fff;
            background-color: #129f75;
            border-color: #129f75;

        }
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
            <a class="navbar-brand" href="waedAdmin.php"><?php echo $_SESSION["Admin"]; ?></a>
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
                    <a href="waedAdmin.php"><i class="fa fa-users"></i> Guests</a>
                </li><li>
                    <a href="customers.php"><i class="fa fa-user"></i>Customers</a>
                </li>
                <li>
                    <a href="messages.php"><i class="fa fa-comments"></i> Messages</a>
                </li>
                <li>
                    <a href="room.php"><i class="fa fa-bell"></i>Rooms</a>
                </li>
                <li>
                    <a class="active-menu" href="pay.php"><i class="fa fa-credit-card"></i> Payment</a>
                </li>
                <li>
                    <a  href="chart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>  Earnings Chart</a>
                </li>
                <li>
                    <a href="register.php"><i class="fa fa-power-off"></i> Logout</a>
                </li>




            </ul>

        </div>

    </nav>


    <div id="page-wrapper">

        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Payment Details<small> </small>
                    </h1>
                </div>
            </div>

            <div class="container py-5" id="tabll">

                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-5 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="example" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Room type</th>
                                            <th>Number of Rooms</th>
                                            <th>Number of People</th>
                                            <th>Meal</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                            <th>Number of Days</th>
                                            <th>Cost of Room</th>
                                            <th>Cost of Meal</th>
                                            <th>Cost of Hotel Service</th>
                                            <th>Total Cost</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "alrayan");
                                        $sql="select * from pay";
                                        $re = mysqli_query($con,$sql);
                                        while($row = mysqli_fetch_array($re))
                                        {

                                            $id = $row['id'];

                                            echo"<tr>
													<td>".$row['firstn']." ".$row['lastn']."</td>
													<td>".$row['roomtype']."</td>
													<td>".$row['numrooms']."</td>
													<td>".$row['numpeople']."</td>
													<td>".$row['meal']."</td>
												<td>".$row['checkin']."</td>
												<td>".$row['checkout']."</td>
													<td>".$row['numdays']."</td>
													<td>".$row['roomcost']."</td>
													<td>".$row['mealcost']."</td>
													<td>".$row['hotelservice']."</td>
													<td>".$row['Allcost']."</td>
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

    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.metisMenu.js"></script>
    <script src="front/js/morris/raphael-2.1.0.min.js"></script>
    <script src="front/js/morris/morris.js"></script>
    <script src="front/js/custom-scripts.js"></script>


</body>

</html>