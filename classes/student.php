<?php
include_once("database.php");
if(!isset($_SESSION))
{
    session_start();
}

class Student{

    private $db;
    function __construct(){
        $this->db = new Database();
    }

 
    function checkEmail($email)
    {
        $sql = "SELECT stu_email from student where stu_email = '$email'";
        $result = $this->db->conn->query($sql);
        $row = $result->num_rows;
        if ( $row == 0)
            return false; //no mail
        else
            return true; //email exist
    }

    function addStudent($name, $email, $pass)
    {
        $sql = "INSERT into student(stu_name,stu_email,stu_pass) values('$name', '$email', '$pass')";
        $res = $this -> db -> conn -> query($sql); 
    }

    function checkLogin($mail, $pass)
    {
        $sql = "SELECT stu_email , stu_pass from student WHERE stu_email ='$mail' "  ;
        $result = $this->db->conn -> query($sql);
        $log_row = $result -> fetch_assoc();
        $row = $result ->num_rows;
        if($row >= 1 && password_verify($pass,$log_row["stu_pass"]))
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['is_login'] = true;
            $_SESSION['stuLogEmail'] = $stuLogemail;
            echo true;
        }
        else 
        {
            
            echo false;
        }
    }

    function GetStudentId($email)
    {
        $sql = "SELECT stu_id from student WHERE  stu_email ='$email' "  ;
        
        $result = $this->db->conn -> query($sql);
        $log_row = $result -> fetch_assoc();
        return $log_row['stu_id'];
        

    }
    function getAllStudents()
    {
        $sql = "SELECT * from student";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    function GetStudentInfo($email)
    {
        $sql = "SELECT * from student WHERE stu_email = '$email'";
        $result = $this->db->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    function  total_student_count()
    {
        
        $sql = "SELECT COUNT(stu_id) as total FROM student";
        $result = $this->db->conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        return $count;
    }
}


?>