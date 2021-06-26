
<?php
if(!isset($_SESSION))
{
    session_start();
}

// include_once("../classes/database.php");
// include_once("../classes/student.php");

// $student = new Student();
// if(!isset($_SESSION['is_login']))
//  {
//     if(isset($_POST['stuLogemail']) && isset($_POST['stuLogpass']))
//     {

//         $stuLogemail = $_POST['stuLogemail'];
//         $stuLogpass = $_POST['stuLogpass'];
     
//         if($student -> checkLogin($stuLogemail,  $stuLogpass))
//         {
//             $_SESSION['is_login'] = true;
//             $_SESSION['stuLogEmail'] = $stuLogemail;
//             $_SESSION['student_id'] = $student -> GetStudentId($_SESSION['stuLogEmail']);
//             echo true;
//         } 
//         else
//         {
//             echo false;
//         }



       
//     }
// }





//student login varification
 include_once("../db_connection.php");
 if(!isset($_SESSION['is_login']))
 {
    if(isset($_POST['stuLogemail']) && isset($_POST['stuLogpass']))
    {

        $stuLogemail = $_POST['stuLogemail'];
        $stuLogpass = $_POST['stuLogpass'];
     

        // $sql = "SELECT stu_email , stu_pass from student WHERE 
        // stu_email ='".$stuLogemail."'  AND stu_pass =  '".$stuLogpass."' ";

        $sql = "SELECT stu_email , stu_pass from student WHERE 
        stu_email ='$stuLogemail'  "  ;



        $result = $conn -> query($sql);
        $log_row = $result -> fetch_assoc();
        $row = $result ->num_rows;
        
        if($row >= 1 && password_verify($stuLogpass,$log_row["stu_pass"]))
        {
            $_SESSION['is_login'] = true;
            $_SESSION['stuLogEmail'] = $stuLogemail;
            

            $sql = "SELECT stu_id from student WHERE 
            stu_email ='$stuLogemail' "  ;



            $result = $conn -> query($sql);
            $log_row = $result -> fetch_assoc();
            $_SESSION['student_id'] = $log_row['stu_id'];

            echo json_encode($row);
        }
        else 
        {
            $row = 0;
            echo json_encode($row);
        }
    }
}
?>