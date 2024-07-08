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
if(!isset($_GET["rid"]))
{
    header("location:waedAdmin.php");
}
else {
    $con = mysqli_connect("localhost", "root", "", "alrayan");
    if($con-> connect_error){
        die("connection failed:".$con->connect_error);
    }
    $id = $_GET['rid'];
    $todaydate=date("Y/m/d");
    $safuwi ="Select * from users where id = '$id'";
    $rw3 = mysqli_query($con,$safuwi);
    while($row=mysqli_fetch_array($rw3))
    {
        $id=$row['id'];
        $firstname = $row['firstn'];
        $lastname = $row['lastn'];
        $email = $row['email'];
        $gender = $row['gender'];
        $country = $row['country'];
        $Phone = $row['phonenum'];
        $typeroom = $row['roomtype'];
        $numroom = $row['numrooms'];
        $numpeople =$row['numpeople'];
        $meal = $row['meal'];
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $numdays = $row['numdays'];
        $status = $row['status'];

    }


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
                    <a  class="active-menu" href="waedAdmin.php"><i class="fa fa-users"></i> Guests</a>
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
                    <a href="pay.php"><i class="fa fa-credit-card"></i> Payment</a>
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
                            Room Booking<small>	<?php echo  $todaydate; ?> </small>
                        </h1>
                    </div>


                    <div class="col-md-8 col-sm-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Booking Confirmation
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>

                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th><?php echo $id; ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $firstname.$lastname; ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Gender </th>
                                            <th><?php echo $gender; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>

                                        </tr>
                                        <tr>
                                            <th>Phone No </th>
                                            <th><?php echo $Phone; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Type Of the Room </th>
                                            <th><?php echo $typeroom; ?></th>

                                        </tr>
                                        <tr>
                                            <th>No Of the Room </th>
                                            <th><?php echo $numroom; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Meal</th>
                                            <th><?php echo $meal; ?></th>

                                        </tr>

                                        <tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $checkin; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Check-out Date</th>
                                            <th><?php echo $checkout; ?></th>

                                        </tr>
                                        <tr>
                                            <th>No of days</th>
                                            <th><?php echo $numdays; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Status Level</th>
                                            <th><?php echo $status; ?></th>

                                        </tr>





                                    </table>
                                </div>



                            </div>
                            <div class="panel-footer">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Select the Confirmation</label>
                                        <select name="conf" class="form-control">
                                            <option value selected>	</option>
                                            <option value="Confirm">Confirm</option>


                                        </select>
                                    </div>
                                    <input type="submit" name="co" value="Confirm" class="btn btn-primary btn">

                                </form>
                            </div>
                        </div>
                    </div>



                    <?php
                    $rsql ="select * from rooms";
                    $rre= mysqli_query($con,$rsql);
                    $r =0 ;
                    $sc =0;
                    $lr =0;
                    $sr = 0;
                    $dr = 0;
                    $fr =0;
                    $kr =0;
                    while($rrow=mysqli_fetch_array($rre))
                    {
                        $r = $r + 1;
                        $s = $rrow['roomtype'];
                        $p = $rrow['free'];
                        if($s=="Superior Room")
                        {
                            $sc = $sc+ 1;
                        }

                        if($s=="Luxury Room")
                        {
                            $lr = $lr + 1;
                        }
                        if($s=="Single Room" )
                        {
                            $sr = $sr + 1;
                        }
                        if($s=="Deluxe Room" )
                        {
                            $dr = $dr + 1;
                        }
                        if($s=="Family Room")
                        {
                            $fr = $fr + 1;
                        }
                        if($s=="King Room" )
                        {
                            $kr = $kr + 1;
                        }

                    }

                    $csql ="select * from pay";
                    $cre= mysqli_query($con,$csql);
                    $cr =0 ;
                    $csc =0;
                    $clr =0;
                    $csr = 0;
                    $cdr = 0;
                    $cfr =0;
                    $ckr =0;
                    while($crow=mysqli_fetch_array($cre))
                    {
                        $cr = $cr + 1;
                        $cs = $crow['roomtype'];

                        if($cs=="Superior Room" )
                        {
                            $csc = $csc+ 1;
                        }

                        if($cs=="Luxury Room")
                        {
                            $clr = $clr + 1;
                        }
                        if($cs=="Single Room" )
                        {
                            $csr = $csr + 1;
                        }
                        if($cs=="Deluxe Room" )
                        {
                            $cdr = $cdr + 1;
                        }
                        if($cs=="Family Room" )
                        {
                            $cfr = $cfr + 1;
                        }
                        if($cs=="King Room" )
                        {
                            $ckr = $ckr + 1;
                        }


                    }

                    ?>
                    <!--DEMO END-->

                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Available Room Details
                            </div>
                            <div class="panel-body">
                                <table width="200px">

                                    <tr>
                                        <td><b>Superior Room</b></td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php
                                                $f1 =$sc - $csc;
                                                if($f1 <=0 )
                                                {	$f1 = "NO";
                                                    echo $f1;
                                                }
                                                else{
                                                    echo $f1;
                                                }


                                                ?>

                                            </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Luxury Room</b>	 </td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php
                                                $f2 =  $lr -$clr;
                                                if($f2 <=0 )
                                                {	$f2 = "NO";
                                                    echo $f2;
                                                }
                                                else{
                                                    echo $f2;
                                                }

                                                ?>

                                            </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Single Room</b></td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php
                                                $f3 =$sr - $csr;
                                                if($f3 <=0 )
                                                {	$f3 = "NO";
                                                    echo $f3;
                                                }
                                                else{
                                                    echo $f3;
                                                }

                                                ?>

                                            </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Deluxe Room</b>	 </td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php

                                                $f4 =$dr - $cdr;
                                                if($f4 <=0 )
                                                {	$f4 = "NO";
                                                    echo $f4;
                                                }
                                                else{
                                                    echo $f4;
                                                }
                                                ?>

                                         </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Family Room</b>	 </td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php

                                                $f5 =$fr - $cfr;
                                                if($f5 <=0 )
                                                {	$f5 = "NO";
                                                    echo $f5;
                                                }
                                                else{
                                                    echo $f5;
                                                }
                                                ?>

                                            </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>King Room</b>	 </td>
                                        <td><button type="button" class="btn btn-primary btn-circle">

                                                <?php

                                                $f6 =$kr - $ckr;
                                                if($f6 <=0 )
                                                {	$f6 = "NO";
                                                    echo $f6;
                                                }
                                                else{
                                                    echo $f6;
                                                }
                                                ?>

                                            </button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Rooms	</b> </td>
                                        <td> <button type="button" class="btn btn-danger btn-circle">

                                                <?php

                                                $f7 =$r-$cr;
                                                if($f7 <=0 )
                                                {	$f7 = "NO";
                                                    echo $f7;
                                                }
                                                else{
                                                    echo $f7;
                                                }
                                                ?>
                                             </button></td>
                                    </tr>
                                </table>





                            </div>
                            <div class="panel-footer">

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



<?php
if(isset($_POST['co']))
{
    $st = $_POST['conf'];

    if($st=="Confirm")
    {

        $urb = "UPDATE `users` SET `status`='$st' WHERE id = '$id'";

            if ($f1 == "NO" && $typeroom=="Superior Room") {
                echo "<script type='text/javascript'> alert('Sorry! Not Available Superior Room ')</script>";
            }



        else if($f2 =="NO" && $typeroom=="Luxury Room")
        {
            echo "<script type='text/javascript'> alert('Sorry! Not Available Luxury Rooms')</script>";

        }


           else if ($f3 == "NO" && $typeroom=="Single Room") {
                echo "<script type='text/javascript'> alert('Sorry! Not Available Single Room')</script>";
            }



            else if ($f4 == "NO" && $typeroom=="Deluxe Room") {
                echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
            }


            else if ($f5 == "NO" && $typeroom=="Family Room") {
                echo "<script type='text/javascript'> alert('Sorry! Not Available Family Room')</script>";
            }


            else if ($f6 == "NO" && $typeroom=="King Room") {
                echo "<script type='text/javascript'> alert('Sorry! Not Available King Room')</script>";
            }



    else if( mysqli_query($con,$urb))
        {

            $type_of_room = 0;
            if($typeroom=="Superior Room")
            {
                $type_of_room = 250;

            }
            else if($typeroom=="Deluxe Room")
            {
                $type_of_room = 198;
            }
            else if($typeroom=="Luxury Room")
            {
                $type_of_room = 120;
            }
            else if($typeroom=="Single Room")
            {
                $type_of_room = 100;
            }
            else if($typeroom=="Family Room")
            {
                $type_of_room = 350;
            }
            else if($typeroom=="King Room")
            {
                $type_of_room = 240;
            }

            $num_of_people = 0;
            if($numpeople==1)
            {
                $num_of_people = $type_of_room * 1;
            }
            else if($numpeople==2)
            {
                $num_of_people = $type_of_room * 2;
            }
            else if($numpeople==3)
            {
                $num_of_people = $type_of_room * 3;
            }
            else if($numpeople==4)
            {
                $num_of_people = $type_of_room * 4;
            }
            else if($numpeople==5)
            {
                $num_of_people = $type_of_room * 5;
            }

            if($meal=="Nothing")
            {
                $type_of_meal=0;
            }
            else if($meal=="Lemon and Ment")
            {
                $type_of_meal=$num_of_people * 4;
            }else if($meal=="Fruit Waffels")
            {
                $type_of_meal=$num_of_people * 6;

            }else if($meal=="Burger Meal")
            {
                $type_of_meal=$num_of_people* 15;
            }
            else if($meal=="Oreo Frappuccino")
            {
                $type_of_meal=$num_of_people *5.5;
            }
            else if($meal=="Loaded Sweet Potato Fries")
            {
                $type_of_meal=$num_of_people * 13;
            }
            else if($meal=="Pancake for Breakfast")
            {
                $type_of_meal=$num_of_people * 6;
            }
            else if($meal=="Mediterranean Salad")
            {
                $type_of_meal=$num_of_people * 4.5;
            }
            else if($meal=="Avocado and Egg Toast")
            {
                $type_of_meal= $num_of_people *10;
            }
            else if($meal=="BBQ Paneer Pizza")
            {
                $type_of_meal=$num_of_people * 18.99;
            }



            $roomcost = $type_of_room * $numdays * $numroom;
            $mealcost = $type_of_meal * $numdays;
            $hotelservice = 5 *$numdays;

            $Allcost = $roomcost + $mealcost + $hotelservice ;



            $psql = "INSERT INTO `pay`(`id`,`firstn`, `lastn`, `roomtype`, `numrooms`,`numpeople` ,`meal` ,`checkin`, `checkout`, `numdays` ,`mealcost` ,`roomcost`, `hotelservice`, `Allcost`) VALUES ('$id','$firstname','$lastname','$typeroom','$numroom','$numpeople','$meal','$checkin','$checkout','$numdays','$mealcost','$roomcost','$hotelservice','$Allcost')";

            if(mysqli_query($con,$psql) or die(mysqli_error($con)))

            {

                $booked="Booked";
                $rpsql = "UPDATE `rooms` SET `free`='$booked',`userid`='$id' where `roomtype`='$typeroom' ";
                if(mysqli_query($con,$rpsql) or die(mysqli_error($con)))
                {

                    echo "<script type='text/javascript'> alert('Booking Confirmed')</script>";
                    echo "<script type='text/javascript'> window.location='waedAdmin.php'</script>";
                }


            }

        }


    }

}



?>