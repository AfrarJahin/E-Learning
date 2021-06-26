<?php
if(!isset($_SESSION))
{
    session_start();
}
// include_once("../db_connection.php");


// //student registration varificaion 
// if(isset($_POST['stuname']) && 
// isset($_POST['stuemail']) && isset($_POST['stupass']))
// {
//     $stuname = $_POST['stuname'];
//     $stuemail = $_POST['stuemail'];
//     $stupass =  password_hash($_POST['stupass'], PASSWORD_DEFAULT);
//     $sql = "INSERT INTO student(stu_name, stu_email, stu_pass)  VALUES('$stuname', '$stuemail', '$stupass')";
    
//    if($conn -> query($sql) == TRUE) 
//    {
//       echo ("ok");
//    }
//     else
//     {
//         echo ("failed");
//     }


// }

include_once("../classes/database.php");
include_once("../classes/student.php");

$db = new Database();
$student = new Student();
//student registration varificaion 
if(!empty($_POST['stuname']) && 
!empty($_POST['stuemail']) && !empty($_POST['stupass']))
{
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass =  password_hash($_POST['stupass'], PASSWORD_DEFAULT);
    
    if($student -> checkEmail($stuemail) == false)
    {
        $student -> addStudent($stuname, $stuemail, $stupass);

        echo false;
    }
    else
    {
        echo $student -> checkEmail($stuemail);
    }


}
else
{
    echo "no";
}






?>