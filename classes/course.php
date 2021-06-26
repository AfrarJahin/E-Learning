<?php
include_once("database.php");
class Course{

    private $db;

    function __construct(){
        $this->db = new Database();
    }

    function getAllCourse()
    {
        $sql = "SELECT * from course ";
        $result = $this-> db -> conn-> query($sql);

        return $result;
    }



    function checkEnroll($studentId, $courseId)
    {
        $sql = "SELECT COUNT(stu_id) as total FROM enroll WHERE stu_id = '$studentId' and course_id = '$courseId' ";
        $result = $this->db->conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        if($count > 0) return true;
        else return false;
    }

    function total_course_Enroll_byStudent($Id)
    {
        $sql = "SELECT COUNT(course_id) as total FROM enroll Where stu_id = '$Id'";
        $result = $this->db->conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        return $count;
    }

    function total_Student_Enroll_OnCourse($courseId)
    {
        $sql = "SELECT COUNT(course_id) as total FROM enroll Where course_id = '$courseId'";
        $result = $this->db->conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];
        return $count;
    }

    function total_Student_OnCourse($courseId)
    {
        $sql = "SELECT total_seat from course where course_id = '$courseId' ";
        $result = $this->db->conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total_seat'];
    }

    function enroll($course_id,  $student_id)
    {
        // start_date and end_date of course when student enrolls a course

        $sql1 = "SELECT course_duration FROM course Where course_id = '$course_id' ";
        $res = $this -> db -> conn->query($sql1);
        $row = $res -> fetch_assoc();
        $day = $row['course_duration'];

    
        $start_date =date("Y-m-d");
        $end_date=date('Y-m-d', strtotime("+$day days"));

        //insert to enroll table
        $sql = "INSERT INTO enroll(stu_id,course_id, init_date , end_date) VALUES('$student_id', '$course_id', '$start_date', ' $end_date')";
        if($this -> db -> conn -> query($sql) == TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function LeftjoinMyCourse()
    {
        $sql = "SELECT course.course_id , course.course_name, course.course_author FROM enroll LEFT JOIN student ON student.stu_id = enroll.stu_id 
        LEFT JOIN course ON course.course_id = enroll.course_id";
        $result = $this -> db -> conn -> query($sql);
        return $result;
    }


    function  total_course_count()
    {
        $sql = "SELECT COUNT(course_id) as total
        FROM course";
        $result = $this -> db -> conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['total'];

        return $count;
    }


}
?>