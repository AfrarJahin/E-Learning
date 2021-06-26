<?php
if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['adminLogin']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}
include("header.php");
 include_once("../classes/database.php");
 include_once("../classes/course.php");
 include_once("../classes/student.php");

 $course = new Course();
$student = new Student();
$db = new Database();
// include("../db_connection.php");

 if(!isset($_SESSION['adminLogin']))
 {
    echo " <script>location.href = '../index.php'; </script> ";
}

//total course ID COUNT

$total_course = $course -> total_course_count();

//student ID COUNT

$total_student = $student -> total_student_count();


//Sold COUNT




?>
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <?php 
       echo '<div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h4 class="card-title">'.$total_course.'</h4>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h4 class="card-title">'.$total_student.'</h4>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem">
                <div class="card-header">Sold</div>
                <div class="card-body">
                    <h4 class="card-title">'.$total_student.'</h4>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div> ' 
    ?>
        <div class=" mx-5 mt-5 text-center">

            <!-- Table start -->
            <h3 class="bg-dark text-white">Courses</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Remaining Time for Enroll</th>
                        <th scope="col">Total students enrolled</th>
                        <th scope="col">Available seats</th>
                        <th scope="col">See all student</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $sql = "SELECT course.course_id, course.course_name, course.course_author FROM enroll LEFT JOIN student ON student.stu_id = enroll.stu_id 
                    // LEFT JOIN course ON course.course_id = enroll.course_id"; 
                    
                    $courses = $course ->  getAllCourse();
                    $id = 1;
                    while($row = $courses -> fetch_assoc())
                    {
                        $course_name = $row['course_name'];
                        $course_id = $row['course_id'];
                        //**************total dtudent enrolled***************
                        $total_stu = $course -> total_Student_Enroll_OnCourse($course_id);
                        
                        //************* available seats******************
                        
                        $total_seat =$course -> total_Student_OnCourse($course_id);
                        $avail_seat = $total_seat - $total_stu; 


                        //*************remaining time for enroll */

                        $sql2 = "SELECT end_time FROM course Where course_id = '$course_id'";
                        $result2 = $db->conn->query($sql2);
                        $row2 = $result2 -> fetch_assoc();
                        $date2 = $row2['end_time']; //ending
  
                        $date1  = date("Y-m-d",  strtotime('+1 days')); //current date
                        //*********difference between two dates */
                        $datetime1 = new DateTime($date1);
                        $datetime2 = new DateTime($date2);
                        $interval = $datetime1->diff($datetime2) ;

                    ?>

                    <tr>
                    
                    <td>
                    <?php
                    echo $course_id;
                    // echo $id++;
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $course_name;
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $interval->format('%R%a days') ;
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $total_stu;
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $avail_seat;
                    ?>
                    </td>

                    <td>
                   <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary"
                            onclick="showStudents('<?php echo $course_id; ?>', '<?php echo $course_name;  ?>')"> Students</button>
                    </td>
                    </tr>
                        <?php       
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="courseStudentsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="course-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody id="students-info"></tbody>
        </table>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





    <?php
include("footer.php");
?>




<script>
function showStudents(courseID, courseTitle){
    
    $.ajax({
        url: "/Elearning/Admin/showCourseStudents.php",
        method: "POST",
        data: {'course_id' : courseID}
    })
    .done(function( response ) {
       var responseData = JSON.parse(response);
       var students = responseData.data;
       var studentDataRender = ``;
       if(responseData.status == 'success'){
            students.forEach(function( student, key){
                studentDataRender += ` <tr>
                                            <td><p class="student-id">`+student.stu_id+`<p></td>
                                            <td><p class="student-name">`+student.stu_name+`<p></td>
                                            <td><p class="student-email">`+student.stu_email+`<p></td>
                                    </tr>`;
            });
       } else {
            studentDataRender += ` <tr>
                                            <td colspan="3"><p class="student-id">`+responseData.message+`<p></td>
                                    </tr>`;
        }
       
       $('#course-title').html(courseTitle);
       $('#students-info').html(studentDataRender);
    })
    
    .fail(function() {
        alert( "error" );
    })
    
    $('#courseStudentsModel').modal('show');

}

</script>