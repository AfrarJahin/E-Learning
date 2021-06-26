<?php
include_once("../db_connection.php");

if(!isset($_SESSION))
{
    session_start();
}
// admin Login varification 

if(!isset($_SESSION['is_admin_login']))
{
   if(isset($_POST['adminLogemail']) && isset($_POST['adminLogpass']))
   {

       $adminLogemail = $_POST['adminLogemail'];
       $adminLogpass = $_POST['adminLogpass'];
        

    //    $sql = "SELECT id from admin WHERE 
    //    email ='".$adminLogemail."'  AND password = '".$adminLogpass."' ";


    $sql = "SELECT id FROM admin WHERE email = '$adminLogemail' and password = '$adminLogpass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      echo row;

    //    $result = $conn -> query($sql);
    //   echo $row = $result ->num_rows;
       
    //    if($row > 0)
    //    {
        
    
    //        echo json_encode($row);
    //    }
    //    else if($row == 0)
    //    {
    //     // echo "ad";
    //        echo json_encode($row);
    //    }
   }
}


?>