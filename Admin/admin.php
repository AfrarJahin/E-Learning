<?php
include_once("../db_connection.php");

if(!isset($_SESSION))
{
    session_start();
}
//admin login varification

// if(!isset($_SESSION['is_admin_login']))
// {
//     if(isset($_POST['adminLogemail']) && isset($_POST['adminLogpass']))
//     {
//         $adminLogemail = $_POST['adminLogemail'];
//         $adminLogpass = $_POST['adminLogpass'];
//         $sql = "SELECT id FROM admin WHERE email = '$adminLogemail' and password = '$adminLogpass'";
//         $result = mysqli_query($conn,$sql);
//         $row = mysqli_fetch_assoc($result);
//         if($row > 0)
//         {
//                $_SESSION['is_admin_login'] = true;
//             echo 'success';
//         }
//         else
//         {
//             echo 'error';
//         }
//     }
// }




 
$sql = "SELECT email,pass from admin WHERE id = 1";
$result = $conn -> query($sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['adminLogemail'] = $row['email'];
$_SESSION['adminLogpass'] = $row['pass'];


$adminLogemail = $_SESSION['adminLogemail'];
$adminLogpass = $_SESSION['adminLogpass'];

$sql = "SELECT id FROM admin WHERE email = '$adminLogemail' AND pass = '$adminLogpass' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row > 0){
    $_SESSION['adminLogin'] = TRUE;
    echo 'success';
}
else{
    echo 'error';
}
?>