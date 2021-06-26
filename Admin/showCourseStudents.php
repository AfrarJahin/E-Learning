<?php

include_once("../classes/database.php");
$db = new Database();

$courseID = empty($_POST['course_id']) ? null : $_POST['course_id'];
$response = [
    'status' => 'false',
    'message' => 'something wrong',
    'data' => []
];
if(empty($courseID)){
    echo json_encode($response); exit(0);
}   

$sql4 = "SELECT student.stu_id, student.stu_name, student.stu_email FROM enroll LEFT JOIN student ON student.stu_id = enroll.stu_id 
LEFT JOIN course ON course.course_id = enroll.course_id where course.course_id = $courseID" ;

$res4 = $db->conn ->query($sql4);
$students = [];
$row4 = $res4 ->fetch_all(MYSQLI_ASSOC);
$studentCount = mysqli_num_rows($res4);

$response['message'] =($studentCount < 1 ? 'No ' : $studentCount ) . ' Course student found.';
$response['status'] = $studentCount < 1 ? 'false' : 'success';
$response['data'] = $row4;
echo  json_encode($response); exit(0);