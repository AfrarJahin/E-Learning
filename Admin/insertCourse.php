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
$enroll_duration = $_POST['enroll_duration'];
$total_seat = $_POST['total_seat'];


if(!empty($course_name) && !empty($course_desc) && !empty($course_author) && !empty($course_duration) && !empty($course_price) && !empty($course_org_price) && !empty($enroll_duration) && !empty($total_seat))
{
    // insert without image

    $date =date("Y-m-d");
    
    $end_date=date('Y-m-d', strtotime("+$enroll_duration days"));

    $sql = "INSERT INTO course(course_name	,course_desc, course_author, course_duration, course_price, course_org_price, create_time, end_time, enroll_duration, total_seat)
     VALUES('$course_name','$course_desc','$course_author', '$course_duration', '$course_price', '$course_org_price', '$date','$end_date', '$enroll_duration', '$total_seat')";

    if($conn->query($sql) == TRUE)
    {
       echo "Inserted";
    }
    else
    {
       echo "Failed";
    }

}

else
{
    echo "Failed";
}
?>