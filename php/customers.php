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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>




    <style>
        h1{
            background: linear-gradient(330deg,rgba(40,183,141,0.8),rgba(255,222,89,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        html,
        body {
            overflow-x: hidden;
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
                    <a class="active-menu" href="customers.php"><i class="fa fa-user"></i>Customers</a>
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

    <?php
    $con = mysqli_connect("localhost", "root", "", "alrayan");
    $sql = "SELECT * FROM `users`";
    $re = mysqli_query($con,$sql);
    ?>
    <div id="page-wrapper">

        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        All Customers<small> </small>
                    </h1>
                </div>
            </div>

<div style="Overflow-x:auto; width:100%">
            <div class="container py-5">

                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-5 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="example" style="width:100%;" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="color: #129f75; font-weight: bold">ID</th>
                                            <th style="color: #129f75; font-weight: bold">FIRST NAME</th>
                                            <th style="color: #129f75; font-weight: bold">LAST NAME</th>
                                            <th style="color: #129f75; font-weight: bold">EMAIL</th>
                                            <th style="color: #129f75; font-weight: bold">TYPE OF ROOM</th>
                                            <th style="color: #129f75; font-weight: bold">NUMBER OF ROOMS</th>
                                            <th style="color: #129f75; font-weight: bold">MEAL</th>
                                            <th style="color: #129f75; font-weight: bold">CHECK IN</th>
                                            <th style="color: #129f75; font-weight: bold">CHECK OUT</th>
                                            <th style="color: #129f75; font-weight: bold">NUMBER OF DAYS</th>
                                            <th style="color: #129f75; font-weight: bold">DELETE</th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "alrayan");
                                        $tsql = "select * from users";
                                        $tre = mysqli_query($con,$tsql);
                                        while($trow=mysqli_fetch_array($tre) )
                                        {
                                            $co =$trow['status'];
                                            $id = $trow['id'];
                                            $fna = $trow['firstn'];
                                            $lna = $trow['lastn'];
                                            $ps = $trow['password'];
                                            $phn=$trow['phonenum'];
                                            $rt=$trow['roomtype'];
                                            $meal=$trow['meal'];
                                            $cheout=$trow['checkout'];

                                            if($co=="Confirm")
                                            {
                                                echo"<tr>
												<th>".$trow['id']."</th>
												<th>".$trow['firstn']."</th>
												<th>".$trow['lastn']."</th>
												<th>".$trow['email']."</th>
												<th>".$trow['roomtype']."</th>
										        <th>".$trow['numrooms']."</th>
												<th>".$trow['meal']."</th>
												<th>".$trow['checkin']."</th>
												<th>".$trow['checkout']."</th>
												<th>".$trow['numdays']."</th>
										
                                            <td style='overflow-x: auto;'><a href=DeleteUsers.php?eid=".$id ." <button onclick='myFunction()' class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												
												</tr>";
                                            }

                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="panel-body">

                    <button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'> Update </button>
                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
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


                <div class="panel-body">

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Change Information</h4>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Enter Customer ID</label>
                                            <input name="iidd"  class="form-control" placeholder="Enter Customer ID">
                                        </div></div>
                                    <div class="modal-body">

                                    <div class="form-group">
                                            <label>Change Admin first name</label>
                                            <input name="ffname" class="form-control" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Change Admin last name</label>
                                            <input name="llname" class="form-control" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="passw" class="form-control" placeholder="Enter new Password">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label>Meals</label>
                                        <select name="meals" class="form-control"required>
                                            <option value selected ></option>
                                            <option value="Nothing">Nothing</option>
                                            <option value="Lemon and Ment">Lemon and Ment</option>
                                            <option value="Fruit Waffels">Fruit Waffels</option>
                                            <option value="Burger Meal">Burger Meal</option>
                                            <option value="Oreo Frappuccino">Oreo Frappuccino</option>
                                            <option value="Loaded Sweet Potato Fries">Loaded Sweet Potato Fries</option>
                                            <option value="Pancake for Breakfast">Pancake for Breakfast</option>
                                            <option value="Mediterranean Salad">Mediterranean Salad</option>
                                            <option value="Avocado and Egg Toast">Avocado and Egg Toast</option>
                                            <option value="BBQ Paneer Pizza">BBQ Paneer Pizza</option>


                                        </select>
                                    </div></div>


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

    if(isset($_POST['up'])){
        $id= $_POST['iidd'];
        $ffname=  $_POST['ffname'];
        $llname = $_POST['llname'];
        $passwo = $_POST['passw'];
        $meaal=$_POST['meals'];
        if(isset($_POST['ffname'])&&!empty($_POST['ffname'])){
            $sql1="UPDATE users SET firstn='$ffname' WHERE id='$id'";
            $st1 = mysqli_query($con,$sql1);

        }
        if(isset($_POST['llname'])&&!empty($_POST['llname'])){
            $sql2="UPDATE users SET lastn='$llname' WHERE id='$id'";
            $st2 = mysqli_query($con,$sql2);

        }
        if(isset($_POST['passw'])&& !empty($_POST['passw'])){
            $sql3="UPDATE users SET password='$passwo' WHERE id='$id'";
            $st3 = mysqli_query($con,$sql3);

        }
        if(isset($_POST['meals'])&& !empty($_POST['meals'])){
            $sql4="UPDATE users SET meal='$meaal' WHERE id='$id'";
            $st4 = mysqli_query($con,$sql4);

        }

    }
    ?>
</div>



        </div>
    </div>
    <br><br>

    <div id="chart"><canvas id="bar-chart" width="800" height="450"></canvas>
    </div>
    <?php
    //index.php
    $con = mysqli_connect("localhost", "root", "", "alrayan");


    $query = "SELECT COUNT(id) AS countie, YEAR(checkin) AS year FROM users group by year order by year desc";
    $result = mysqli_query($con, $query);
    $years='';
    $count='';
    while ($row = mysqli_fetch_assoc($result)) {
        $years = $years .'"'.$row["year"].'",';
        $count = $count .'"'.$row["countie"].'",';


    }
    $years=trim($years,",");
    $count=trim($count,",");
    ?>

</div>
<script>
    function myFunction() {
        confirm("Are You Sure You Want To Delete The Customer?");
    }
</script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery.metisMenu.js"></script>
<script src="front/js/morris/raphael-2.1.0.min.js"></script>
<script src="front/js/morris/morris.js"></script>
<script src="front/js/custom-scripts.js"></script>


</script>


    </div>
    </div>

    <script>
var ctx = document.getElementById('bar-chart').getContext('2d');
let gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
gradientFill.addColorStop(0, "rgba(40,183,141,0.8)");
gradientFill.addColorStop(1, "rgba(255,222,89,0.8)");
var chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels:[<?php echo $years; ?>],
        datasets: [{
            label: 'Total',
            backgroundColor: gradientFill,
            //    borderColor: 'rgba(40,183,141,0.8)',
            data:  [<?php echo $count; ?>]
        }]
    },

    // Configuration options go here
    options: {

        legend: { display: false },
        title: {
            display: true,
            text: 'Report For Yearly Number of Guests of Al-Rayan Hotel'
        },


    }



});

</script>
</body>

</html>