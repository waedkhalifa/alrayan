
<?php
ob_start();
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
$id =$_GET['eid'];
$ntcon="Not Confirmed";
$ed="Not Booked";

$controom="Update rooms SET free='$ed',userid='NULL' WHERE userid=$id";
$rre1 = mysqli_query($con,$controom);

$contguest = "Update users SET status='$ntcon' WHERE id=$id";

$rre2= mysqli_query($con,$contguest);
$newsql ="DELETE FROM `users` WHERE id ='$id' ";
echo "<script>window.location.href='customers.php'</script>";

if(mysqli_query($con,$newsql))
{
    echo "<script>window.location.href='customers.php'</script>";

}




ob_end_flush();
?>

