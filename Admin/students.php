<?php
if(!isset($_SESSION))
{
    session_start();
}
include("header.php");

include_once("../classes/student.php");
include_once("../classes/course.php");
include_once("../classes/database.php");

$student = new Student();
$course = new Course();
?>
<div class="col-sm-9 mt-5">
<div class=" mx-5 mt-5 text-center">

            <!-- Table start -->
            <h3 class="bg-dark text-white">Students Information</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Id</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Total enrolled course</th>
                        <th scope="col">See all Course</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = $student->getAllStudents();
                

                while($row = $result -> fetch_assoc())
                {
                    $total_enroll = $course -> total_course_Enroll_byStudent($row['stu_id']);
                    ?>
                    <tr>
                    <td>
                    </td>

                    <td>
                    <?php
                    echo $row['stu_id'];
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $row['stu_name'];
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $row['stu_email'];
                    ?>
                    </td>

                    <td>
                    <?php
                    echo $total_enroll;
                    ?>
                    </td>

                    <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary"
                            onclick="showStudents('<?php echo $row['stu_id']; ?>', '<?php echo $row['stu_name'];  ?>')"> Courses</button>
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
function showStudents(studentID, studentName){
    
    $.ajax({
        url: "/Elearning/Admin/showCourses.php",
        method: "POST",
        data: {'stu_id' : studentID}
    })
    .done(function( response ) {
       var responseData = JSON.parse(response);
       var courses = responseData.data;
       var courseDataRender = ``;
       if(responseData.status == 'success'){
            courses.forEach(function( course, key){
                courseDataRender += ` <tr>
                                            <td><p class="student-id">`+course.course_id+`<p></td>
                                            <td><p class="student-name">`+course.course_name+`<p></td>
                                            <td><p class="student-email">`+course.course_author+`<p></td>
                                    </tr>`;
            });
       } else {
        courseDataRender += ` <tr>
                                            <td colspan="3"><p class="student-id">`+responseData.message+`<p></td>
                                    </tr>`;
        }
       
       $('#course-title').html( studentName);
       $('#students-info').html(courseDataRender);
    })
    
    .fail(function() {
        alert( "error" );
    })
    
    $('#courseStudentsModel').modal('show');

}

</script>