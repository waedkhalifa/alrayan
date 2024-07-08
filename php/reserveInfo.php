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
    <title>RESERVATION ALRAYAN HOTEL</title>
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
<?php

$qid = $_GET['qid'];

if(isset($_POST['submit']))
{
    $code1=$_POST['code1'];
    $code=$_POST['code'];
    if($code1!="$code")
    {
        echo "<script> alert('Invalide code')</script>";
    }
    else {

        @$con = mysqli_connect("localhost", "root", "", "alrayan");
        $safu = "SELECT * FROM `users`";
        $rw4 = mysqli_query($con, $safu);
        while ($row = mysqli_fetch_array($rw4)) {
            $id = $row['id'];
            $ntcnf = "Not Confirmed";
            $thisId= $_SESSION['theId'];
            $contguest = "Update users SET firstn='$_POST[fname]',lastn='$_POST[lname]',gender='$_POST[gender]',country='$_POST[country]',phonenum='$_POST[phone]',visa='$_POST[visa]',roomtype='$_POST[troom]',numrooms='$_POST[nroom]',numpeople='$_POST[npeople]',meal='$_POST[meals]',checkin='$_POST[cin]',checkout='$_POST[cout]',status='$ntcnf',numdays=datediff('$_POST[cout]','$_POST[cin]') WHERE id='$thisId'";

        }
        if (mysqli_query($con, $contguest)) {
            echo "<script> alert('Your booking information has been sent')</script>";

        } else {
            echo "<script> alert('Error')</script>";

        }
    }

}
?>
<div id="wrapper">
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a  href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg> Main Page</a>
                </li>

            </ul>

        </div>

    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        COMPLETE RESERVATION &hearts;<small></small>


                    </h1>
                </div>
            </div>


            <div class="row">

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post">

                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input name="fname" class="form-control" placeholder="First Name" required>

                                </div>
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input name="lname" class="form-control" placeholder="Last Name" required>

                                </div>

                                <div class="form-group">
                                    <label>Gender *</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender"  value="Male" checked="">Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender"  value="Female ">Female
                                    </label>

                                </div>
                                <?php

                                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan","Palestine","Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                                ?>
                                <div class="form-group">
                                    <label>Country *</label>
                                    <select name="country" class="form-control" required>
                                        <option value selected ></option>
                                        <?php
                                        foreach($countries as $key => $value):
                                            echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone" class="form-control" placeholder="(00xxx)-(xx)-(xxxxxxxx)"
                                           pattern="[0]{1}[0]{1}[0-9]{12}" required>


                                </div>
                                <div class="form-group">
                                    <label>VISA</label>
                                    <input type="number" name="visa" class="form-control" placeholder="000000000000"
                                           pattern="[0-9]{12}" required>


                                </div>
                        </div>

                    </div>
                </div>
<?php
@$con = mysqli_connect("localhost", "root", "", "alrayan");

$sqlq ="select * from rooms where roomid = '$qid' ";
$rem = mysqli_query($con,$sqlq);
while($row=mysqli_fetch_array($rem))
{
$namie = $row['roomtype'];}
?>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                RESERVATION INFORMATION
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Number Of Room</label><br>
                                    <input name="tnuroom" class="form-control" value="<?php echo $qid ?>" placeholder="Last Name" required readonly>

                                </div>

                                <div class="form-group">
                                    <label>Type Of Room</label>
                                    <input name="troom" class="form-control" value="<?php echo $namie ?>" placeholder="Last Name" required readonly>


                                </div>

                                <div class="form-group">
                                    <label>Number of Rooms *</label>
                                    <select name="nroom" class="form-control" required>
                                        <option value selected ></option>
                                        <option value="1">1</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Number of people *</label>
                                    <select name="npeople" class="form-control" required>
                                        <option value selected ></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>

                                    </select>
                                </div>

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
                                </div>
                                <div class="form-group">
                                    <label>Check-In</label>
                                    <input name="cin" type ="date" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label>Check-Out</label>
                                    <input name="cout" type ="date" class="form-control">

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12">
                        <div class="well">
                            <h4>HUMAN VERIFICATION</h4>
                            <p>Type Below this code <?php $Random_code=rand(); echo$Random_code; ?> </p><br />
                            <p>Enter the random code<br /></p>
                            <input  type="text" name="code1" title="random code" />
                            <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                            <input type="submit" name="submit" class="btn btn-primary">

                            </form>

                        </div>
                    </div>



                    <div class="panel-body">
                        <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
                            Send Message to the Administration staff
                        </button>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Message</h4>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="ema" class="form-control" placeholder="Enter Email">
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
                                                <textarea name="news" class="form-control" rows="5" id="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            <input type="submit" name="se" value="Send" class="btn btn-primary">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    @$con = mysqli_connect("localhost", "root", "", "alrayan");

                    if(isset($_POST['se']))
                    {
                        $chk=$_POST['ema'];

                        $isuser = "SELECT * FROM `users` where email='$chk'";
                        $iu = mysqli_query($con,$isuser);
                        $notRead="unseen";
                        $s='';
                        while($rowss = mysqli_fetch_array($iu))
                        {
                            $s ="INSERT INTO `messages`(`guestsemail`, `title` ,`subject`, `message`, `done`) VALUES ('$_POST[ema]','$_POST[title]','$_POST[subject]','$_POST[news]','$notRead')";

                        }

                        $ii = "SELECT * FROM `messages` where guestsemail='$chk'";
                        $iur = mysqli_query($con,$ii);

                        if ($iur->num_rows == 1) {
                            echo '<script>alert("The message has been sent, we will answer you very soon!") </script>' ;

                        }

                        else {
                            echo '<script>alert("Sorry, You have not registerd, you can not send message here") </script>' ;

                        }

                    }


                    ?>

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
