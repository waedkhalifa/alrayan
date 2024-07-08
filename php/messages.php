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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <style>
        h1{
            background: linear-gradient(330deg,rgba(40,183,141,0.8),rgba(255,222,89,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .quotes {
            width: 200px;
            min-height: 400px;
            margin-right: 70px;
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: space-between;
            z-index: 2;
            box-sizing: border-box;
        }
        .quotes .box {
            position: relative;
            width: 20vw;
            height: 50vh;
            min-height: 320px;
            background: #f2f2f2;
            overflow: hidden;
            transition: all 0.5s ease-in;
            z-index: 2;
            box-sizing: border-box;
            padding: 30px;
            box-shadow: -10px 25px 50px rgba(0, 0, 0, 0.3);
        }
        .pe{

            color:rgb(40, 183, 141);

        }
        .pe:hover{
            color:black;
        }

        .quotes .box::before {
            content: '\201C';
            position: absolute;
            top: -20px;
            left: 5px;
            width: 100%;
            height: 100%;
            font-size: 120px;
            opacity: 0.2;
            background: transparent;
            pointer-events: none;
        }
        .quotes .box::after {
            content: '\201D';
            position: absolute;
            bottom: -10%;
            right: 5%;
            font-size: 120px;
            opacity: 0.2;
            background: transparent;
            filter: invert(1);
            pointer-events: none;
        }
        .quotes .box p {
            margin: 0;
            padding: 10px;
            font-size: 1.2rem;
        }

        .quotes .box h2 {
            position: absolute;
            margin: 0;
            padding: 0;
            bottom: 10%;
            right: 10%;
            font-size: 1.5rem;
        }
        .quotes .box:hover {
            color: #000000;
            box-shadow: 20px 50px 100px rgba(0, 0, 0, 0.5);
            background: rgb(246, 220, 115);
            background: -moz-linear-gradient(-45deg, #ffde59 15%, #3ec8a0 100%);
            background: -webkit-linear-gradient(-45deg, #ffde59 15%, #3ec8a0 100%);
            background: linear-gradient(135deg, #ffde59 15%, #3ec8a0 100%);
            z-index: 3;
        }
        .quotes .bg {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            transition: all 0.5s ease-in;
            pointer-events: none;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .quotes .box.box1:hover,
        .quotes .box.box1:hover~.bg {
            opacity: 1;

            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2a9e5', endColorstr='#2b94e5',GradientType=1 );
        }


.sendd:hover {
    border: 2px solid #c83e9a;

}
        @media (max-width:767px){
            .quotes{
                width:100%;
                padding:20px;
            }
            .quotes .box {
                width:100%;
                margin-bottom: 20px;
            }
        }

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
                    <a class="active-menu" href="messages.php"><i class="fa fa-comments"></i> Messages</a>
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

        <?php
        $con = mysqli_connect("localhost", "root", "", "alrayan");
        $notRead="unseen";
        $fsql = "SELECT * FROM `messages` where done='$notRead'";
        $fre = mysqli_query($con,$fsql);
        $f =0;
        while($row=mysqli_fetch_array($fre) )
        {
            $f = $f + 1;

        }

        ?>

        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Messages<small> there are <?php echo $f ; ?> new messages </small>
                    </h1>
                </div>
            </div>


<?php
$conne = mysqli_connect("localhost", "root", "", "alrayan");
$mail = "SELECT * FROM `messages`";
$rew = mysqli_query($conne,$mail);
?>


            <?php
while($mrow=mysqli_fetch_array($rew) )
{
    $br = $mrow['done'];
    if($br=="unseen") {
        $gem= $mrow['guestsemail'];
        $gtitle=$mrow['title'];
        $gsubject=$mrow['subject'];
        $gmessage=$mrow['message'];
        echo "<div class='container quotes'>
            <div>
                <div class='card'>
                    <div class='box box1'>
                        <p class='pe'>"."Email:"." ".$gem." <br>"."Title:"." ".$gtitle." <br> "."Subject:"." ".$gsubject." <br> "."Message:"." ".$gmessage." </p>
                        <!--<h2>email of sender</h2>-->
                        <a href='#' class='sendd' data-toggle='modal' data-target='#myModal' style='text-transform: uppercase; text-decoration: none;
    border: 2px solid #3ec8a0;  position: absolute;
    color: black;
    font-weight: bold;
    margin: 0;
    padding: 4px;
    bottom: 5%;
    right: 10%;
    font-size: 1.5rem;' onMouseOver='this.style.borderColor='#ffde59''
                           onMouseOut='this.style.borderColor='#3ec8a0''>Send Message</a>
<a href='#' name='d' class='sendd' data-toggle='modal' data-target='#myModall' style='text-transform: uppercase; text-decoration: none;
    border: 2px solid #3ec8a0;  position: absolute;
    color: black;
    font-weight: bold;
    margin: 0;
    padding: 4px;
    bottom: 5%;
    left: 50px;
    font-size: 1.5rem;' onMouseOver='this.style.borderColor='#ffde59''
                           onMouseOut='this.style.borderColor='#3ec8a0''>Done</a>
                    </div>
                    <div class='bg'></div>
                </div>

            </div>

            </div>";

            }

            }

            ?>
</div>
</div>

</div>

<form name='form1' action="mailto:waedbkh@gmail.com" method="GET" class="form contact-form">

<div class="panel-body">

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Message</h4>
                </div>
                <form name='form2' method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="to" class="form-control" placeholder="Enter Email" >
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Subject</label>
                            <input name="subject" class="form-control" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="comment">News</label>
                            <textarea name="body" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="xuz" value="dn" class="btn btn-default" data-dismiss="modal">Close</button>

                        <input type="submit" name="log" value="Send" class="btn btn-primary">

            </div>
                </form>
        </div>
    </div>
</div>

            </div>
</form>

<div class="panel-body">

    <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Message</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>To make sure that you read it, please write the email of guest:</label>
                            <input type="email" name="su" class="form-control" placeholder="Enter guest email" required>
                        </div>

                    <div class="modal-footer">

                        <input type="submit" name="ddd" value="Done" class="btn btn-primary">

                    </div>
            </div>
        </div>
    </div></div>

        </div>

<?php

if(isset($_POST['ddd'])) {

    $meil = $_POST['su'];


    $ism = "SELECT * FROM `messages` where guestsemail='$meil'";
    $iuse = mysqli_query($con, $ism);
    $read = "seen";
    while ($rowss = mysqli_fetch_array($iuse)) {
        echo ' <script> alert("The message has been read!") </script>';
        $updatsqll = "UPDATE `messages` SET `done`='$read' where guestsemail='$meil'";
        $iuu = mysqli_query($con, $updatsqll);

    }
}

?>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.metisMenu.js"></script>
    <script src="front/js/morris/raphael-2.1.0.min.js"></script>
    <script src="front/js/morris/morris.js"></script>
    <script src="front/js/custom-scripts.js"></script>


</body>

</html>