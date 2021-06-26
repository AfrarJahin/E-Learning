<?php

include_once("../classes/database.php");
$db = new Database();

$studentID = empty($_POST['stu_id']) ? null : $_POST['stu_id'];
$response = [
    'status' => 'false',
    'message' => 'something wrong',
    'data' => []
];
if(empty($studentID)){
    echo json_encode($response); exit(0);
}   

$sql = "SELECT course.course_id, course.course_name, course.course_author FROM enroll LEFT JOIN student ON student.stu_id = enroll.stu_id 
LEFT JOIN course ON course.course_id = enroll.course_id where student.stu_id = $studentID" ;

$res = $db->conn ->query($sql);
$courses = [];
$row = $res ->fetch_all(MYSQLI_ASSOC);
$courseCount = mysqli_num_rows($res);

$response['message'] =($courseCount < 1 ? 'No ' : $courseCount ) . ' Course found.';
$response['status'] = $courseCount < 1 ? 'false' : 'success';
$response['data'] = $row;
echo  json_encode($response); exit(0);