<?php
if(!isset($_SESSION))
{
    session_start();
}
include("includemain\header.php");
include_once("../classes/database.php");
include_once("../classes/student.php");
include_once("../classes/course.php");

if(!isset($_SESSION['is_login']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}

 
?>
<!-- start course page banner -->
<!-- start popular course -->
<style>
.col-md-4 {
    margin-bottom: 40px;
}
</style>

<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>

    <!-- start most popular course  card deck -->

    <div class="card-deck mt-4 row mb-3">
        <?php 
            $mail =  $_SESSION['stuLogEmail']; 
            $student = new Student();
            $studenId = $student ->  GetStudentId($mail);
            
            $course = new Course();
            $res = $course -> getAllCourse();

            while ($row = $res->fetch_assoc())
            {
                ?>
                   <div class="col-md-4" style="margin-bottom: 50px;">
                    <a href="" class="btn" style="text-align:left; padding:0px; margin:0px; ">
                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['course_name']?></h5>
                            <p class="card-text">
                            <?php echo$row['course_desc']?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>
                                        &#36 <?php echo $row['course_org_price'] ?></del></small><span class="font-weight-bolder">
                                    &#36 <?php echo $row['course_price']?></span></p>

                             <?php
                             //**check whether the course is enrolled or not by the logged in student***
                                    $course_id = $row['course_id'];

                                    $isEnroll = $course->checkEnroll($studenId, $course_id);

                                    if($isEnroll)
                                    {
                                       echo ' <a  class="btn btn-secondary text-white font-weight-bolder float-right">Enrolled </a>' ;
                                    } 
                                    else
                                    {
                                        $total_enroll = $course -> total_Student_Enroll_OnCourse($course_id);

                                        $total_Student = $course -> total_Student_OnCourse($course_id);
                                        if($total_enroll >= $total_Student)
                                        {
                                          echo '  <button   class="btn btn-secondary text-white font-weight-bolder float-right" href="#"> Overload </button>' ;
                                        }
                                        else
                                        {
                                            echo '  <button   class="btn btn-primary text-white font-weight-bolder float-right" href="#" onclick="test('.$row['course_id'].' , '.$studenId.')"
                                            id = "enrollBtn<?='.$row['course_id'].' ?>"> Enroll </button>' ;
                                        }

                                    }
                                ?>
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php
}
?>
</div>

</div>
<!-- end most popular course 1st card deck  -->



<script>
function test(course_id, student_id) {

    $.ajax({
        url: 'course_enroll.php',
        method: 'POST',
        data: {
            course_id: course_id,
            student_id: student_id
        },
        success: function(data) {
            console.log(data);
        }

    });
}



</script>


<br>
<br>


<!-- end course page banner -->
<?php
include("includemain\stufooter.php");
?>