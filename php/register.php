<?php
ob_start();

session_start();

$_SESSION['isLoggedIn']=0;
$_SESSION['isLoggedInAdmin'] = 0;

$errors = array();
$db=new mysqli('localhost','root','','alrayan');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if(isset($_POST['register'])){
  //  session_start();
    $userIdd=$_POST['userId'];
    $emaill=$_POST['email'];
    $password11=$_POST['password1'];
    $password22=$_POST['password2'];
    $vkey=md5(time().$userIdd);
    if($password11 != $password22){
array_push($errors,"Not matched passwords");
      //  $_SESSION['message']="You are now logged in";
        //$_SESSION['userIdd']="$userIdd";
       //
        }

$user_check_query = "SELECT * FROM users WHERE id='$userIdd' OR email='$emaill' LIMIT 1";
$result = mysqli_query($db, $user_check_query); //$result=$db->query($user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['id'] === $userIdd) {
        array_push($errors, "ID already exists");
    }

    if ($user['email'] === $emaill) {
        array_push($errors, "email already exists");
    }
}
if (count($errors) == 0) {
    if(isset($_POST['checkbox'])) {
        $password1 = password_verify($password11);

        $sql = "INSERT INTO users (id,email,password,confirmpass)
                VALUES ('$userIdd', '$emaill','$password11','$password22')";
        mysqli_query($db, $sql);
        echo "<script>alert('You have successfully registered')</script>";

    }
    else {
        echo "<script>alert('you should agree on terms and conditions')</script>";

    }
    }

else{
        echo "error";
    }


}


$valid_user=0;

if(isset($_POST['loginlog'])){

    @$db=new mysqli('localhost','root','','alrayan');

    if(mysqli_connect_errno()){
        echo "error couldn't connect to database";
        die();
    }

    $usern = $_POST['emaail'];
    $passw = $_POST['passwword'];


    $sql = " SELECT * FROM admin WHERE adminemail = '$usern' AND passwordadmin = '$passw'";
    $result = mysqli_query($db, $sql);

    if ($result->num_rows == 1) {
        $row=$result->fetch_array();

        $valid_user=1;
        $_SESSION['isLoggedInAdmin'] = 1;
        $_SESSION["Admin"]=$row[2]." ".$row[3];
        header("location: waedAdmin.php");
        exit();

    } elseif ($result->num_rows > 1) {
        //there should not be more than one rows with same credentials. Two rows with same (username, password), Make username primary key.
        throw new Exception("Multiple entry with same username and password in admin table");
    } else {
        //Given credentials are not in admin table, check user table.
        $sql1 = " SELECT * FROM users WHERE email = '$usern' AND password = '$passw'";
        $result1 = mysqli_query($db, $sql1);
        if ($result1->num_rows == 1) {
            $row=$result1->fetch_array();
            $valid_user=1;
            $_SESSION['isLoggedIn']=1;
            $_SESSION['theId']=$row[0];
            echo "<script type='text/javascript'>window.location.href = 'roomsavailbale.php';</script>";
        exit();

        } elseif ($result1->num_rows > 1) {
            throw new Exception("Multiple entry with same username and password in user table");
        }



    }


    if($valid_user==0){
        echo "<script>alert('Wrong Email or Password')</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Al Rayan Login and registeration</title>

    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            box-sizing: border-box;
        }
        html,
        body {
            font-family: "Helvetica Neue", Helvetica, Arial;
            font-size: 15px;
            margin: 0;
            padding: 0;
            background: #5ec792;
        }
        .h {
            margin-top: 0;
        }
        .button {
            display: inline-block;
            margin: 0;
            padding: 10px 15px;
            background-color: #5ec792;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            -webkit-transition: 0.3s all ease-in-out;
            transition: 0.3s all ease-in-out;
        }
        .button:hover {
            box-shadow: inset 0 -2.5px rgba(0, 0, 0, 0.4);
        }
        .hero {
            position: absolute;
            top: 50%;
            left: 50%;
            color: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(0, 0, 0, 0.4);
            -webkit-transform: translate3d(-50%, -50%, 0);
            transform: translate3d(-50%, -50%, 0);
        }
        .state {
            position: absolute;
            top: 0;
            left: -100vw;
        }
        .state:checked ~ .content {
            -webkit-transform: none;
            transform: none;
        }
        .state:checked ~ .backdrop {
            bottom: 0;
            opacity: 1;
            z-index: 1;
        }
        .lightbox {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            height: 0;
            padding: 0 20px;
        }
        .lightbox .content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            overflow: hidden;
            position: relative;
            z-index: 2;
            max-width: 500px;
            max-height: 95vh;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            -webkit-transform: translateY(-200%);
            transform: translateY(-200%);
            -webkit-transition: 0.3s -webkit-transform ease-in-out;
            transition: 0.3s -webkit-transform ease-in-out;
            transition: 0.3s transform ease-in-out;
            transition: 0.3s transform ease-in-out, 0.3s -webkit-transform ease-in-out;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        .lightbox .header,
        .lightbox .footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .lightbox .header .h,
        .lightbox .footer .h {
            margin: 0;
        }
        .lightbox .header .button:not(:first-child),
        .lightbox .footer .button:not(:first-child) {
            margin-left: auto;
        }
        .lightbox .header {
            padding-bottom: 10px;
        }
        .lightbox .footer {
            padding-top: 20px;
        }
        .lightbox .main {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            overflow: scroll;
        }
        .lightbox .backdrop {
            position: fixed;
            z-index: -1;
            top: 0;
            right: 0;
            bottom: 100%;
            left: 0;
            opacity: 0;
            background: rgba(0, 0, 0, 0.3);
            -webkit-transition: 0.3s opacity ease-in-out;
            transition: 0.3s opacity ease-in-out;
        }
    </style>

</head>
<body>




<div class ="hero">
<div class ="form-box">
<div class="button-box">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()">Login</button>
    <button type="button" class="toggle-btn" onclick="register()">Register</button>

</div>

    <div class="social-icons">

        <img src="../alrayanimg/Untitled-3.png">
    </div>


    <form id="register" class="input-group" action="register.php" method="post">
        <input type="text" name="userId" class="input-field" placeholder="User Id" required>
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="password" name="password1" class="input-field" placeholder="Enter Password" required>
        <input type="password" name="password2" class="input-field" placeholder="Confirm Password" required>
        <input type="checkbox" name="checkbox" class="check-box"><label for="lightbox-1"><span>I agree to the terms and condition</span></label>





        <aside class="lightbox">
            <input type="checkbox" class="state" id="lightbox-1" />
            <article class="content">
                <header class="header">
                    <h3 class="h h3">TERMS & CONDITIONS of AL-RAYAN HOTEL</h3>
                    <label class="button" for="lightbox-1">&times;</label>
                </header>
                <main class="main">
                    <div class="view">
                        <p>

                        <ul>
                            <h4>Reservations</h4>
                            Through our online booking system, you will be able to check room availability (for most hotels) and make your booking. For peace of mind, you will receive by email a reservation confirmation, including the details of your reservation. It is recommended that you keep a copy of this reservation confirmation, preferably by printing the page.

                            In the event that you have to modify or cancel your booking, please contact our reservation office as specified in your reservation confirmation.

                            <h4> Guaranteed Reservations</h4>
                            By securing your onlinebooking with a visa card, your booking  is guaranteed. All reservations made through our website must be guaranteed by a major credit card (e.g. Visa,, or direct palawan pawnshop).



                            <h4>Cancellation </h4>
                            <li>If there is a cancellation of a room reservation within 24hours prior to the arrival date, but the payments cannot refund once you already booking for the reservation.
                            <li>Additional Requests
                            <li>All additional or special requests are subject to availability and we cannot guarantee the provision for special requests. Any additional requests made should be prior to your arrival at the hotel, giving reasonable advance notice.
                            <li>General Information
                            <li>Accommodation: As a minimum, all bedrooms feature a private ensuite bathroom with either a bath & shower or a shower and colour television.
                            <li>Opening hours: Our reception is open 24hours. If you wish to check-in to the hotel out of these hours, please discuss with reception at the time of booking.
                            <li>Payment Methods: We accept most major credit and debit cards, cash.

                                <h4>Price Guarantee</h4>
                            <li>On receipt of written confirmation the prices quoted and confirmed in writing by the Hotel remain fixed except for any alterations in the Government rates of taxation and/or duty such as VAT, for which we reserve the right to alter pricing to take account of any variation.
                            <li>Making a booking
                            <li>By making a booking you are confirming that you are authorised to do so on behalf of all persons named in the booking and you are acknowledging that all members of your party agree to be bound by these Booking Terms & Conditions.
                            <li>When your booking has been made a confirmation can be sent to you by email using the email address that you have supplied, or by post. Booking confirmations are subject to the availability of accommodation at the hotel.
                            <li>You should carefully check the details of your confirmation as soon as you receive it. You must contact Magbanua’s beach resort immediately if any of the details are incorrect or incomplete.
                            <li>We will always endeavour to rectify any inaccuracies or accommodate any alterations you wish to make to your booking. We cannot accept liability for any inaccuracies that are not brought to our attention within seven days of issuing your confirmation, nor can we accept responsibility for inaccurate information that you have supplied.

                                <h4>Paying for your booking</h4>
                                Credit or debit card details will be required when you make your booking. No money will actually be taken although your card will be verified at the time of booking for 100% of your first nights stay. See our cancellation policy for charges that may be taken. In some instances, a non-refundable deposit or full payment may be required at the time of booking.
                                Unless stated as part of your booking, additional items such as (but not limited to) the cost of external telephone calls, are not included in the price of your stay. If you incur any such additional costs you must settle the sum involved on your departure from the hotel.

                                <h4>Circumstances beyond our control</h4>
                            <li>We cannot accept responsibility for unforeseen circumstances beyond our control. These include (but are not limited to) adverse weather conditions, fire, riot, war, terrorist activity (or threat of such activity), industrial dispute, natural disaster, or injuries and death of an individual(s) through accidental circumstances unconnected with the hotel.
                            <li>By making a booking you are accepting responsibility for any damage or loss caused by yourself or a member of your party. Full payment for any such damage or loss must be paid to the hotel owner or manager on demand. If you fail to do so, you will be responsible for meeting any claims subsequently made (together with our own and the other party's full legal costs) as a result of your actions.

                                <h4>Complaints</h4>
                            <li>If you are dissatisfied with any aspect of your stay you should bring the problem or issue to the attention of the duty manager or senior member of staff at the hotel as soon as possible so that all reasonable efforts can be made to rectify the situation. If, for any reason, the issue cannot be resolved to your satisfaction and you wish to make a complaint, you should put it in writing and send it to the owner  at: Al-Rayan House , omiles cauayan negros occidental,.


                                If you have any questions, please email at alrayan2020@gmail.com or call (970) 501 – 6415

                                Thank you for choosing Al-Rayan Hotel

                                Respectfully your,

                                Al-Rayan Hotel
                        </ul>
                        </p>
                    </div>
                </main>
                <footer class="footer">
                    <button class="button" type="button">Ok</button>
                    <label class="button" for="lightbox-1">Close</label>
                </footer>
            </article>
            <label class="backdrop" for="lightbox-1"></label>
        </aside>







        <button type="submit" name="register" class="submit-btn">Register</button>

    </form>
    <form id="login" class="input-group" action="register.php" method="post">
        <input type="email" name="emaail" class="input-field" placeholder="Email" required>
        <input type="password" name="passwword" class="input-field" placeholder="Enter Password" required>
        <button type="submit" name="loginlog" class="submit-btn">Log in</button>
    </form>




    <?php

    if (count($errors) > 0) {

        ?>

            <?php foreach ($errors as $error) {
                echo "<script>alert('$error');</script>";
            } ?>
    <?php }
    ob_end_flush();
    ?>

</div>

    <script>


        var y=document.getElementById("register");
        var x=document.getElementById("login");
        var z=document.getElementById("btn");

        function register(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login(){
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";
        }
    </script>
</div>
</body>
</html>