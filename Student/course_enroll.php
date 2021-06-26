<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("../classes/database.php");
include_once("../classes/course.php");


$course = new Course();

if(isset($_POST['course_id']) && isset($_POST['student_id']))
{
    $course_id = $_POST['course_id'];
    $student_id = $_SESSION['student_id'];

    if($course->enroll($course_id,  $student_id) == TRUE)
    {
        echo ("inserted");
    }
    else
    {
        echo ("failed");
    }
}

?>