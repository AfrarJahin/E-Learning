<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("../db_connection.php");

$course_name =$_POST['course_name'];
$course_desc = $_POST['course_desc'];
$course_author = $_POST['course_author'];
$course_duration = $_POST['course_duration'];
$course_price = $_POST['course_price'];
$course_org_price = $_POST['course_org_price'];
$total_seat = $_POST['total_seat'];
$course_id = $_POST['course_id'];

    $sql = "UPDATE course SET course_name='$course_name', course_desc='$course_desc', course_author='$course_author',course_duration='$course_duration', 
    course_price='$course_price', course_org_price='$course_org_price', total_seat='$total_seat'  Where course_id='$course_id'";

    if($conn->query($sql) == TRUE)
    {
       echo "Inserted";
    }
    else
    {
       echo "Failed";
    }

?>