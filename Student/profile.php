<?php
if(!isset($_SESSION))
{
    session_start();
}
// include_once("../db_connection.php");
 include("includemain\header.php");
include_once("../classes/database.php");
include_once("../classes/student.php");
$student = new Student();

if(!isset($_SESSION['is_login']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}
$stuemail = $_SESSION['stuLogEmail'];
$row = $student -> getStudentInfo($stuemail);

?>


<div class="col-sm-6 mt-5 mx-3 jumbotrom">
    <h3 class="text-center bg-dark text-white">Student Information</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_if">Student Id</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php
            if(isset($row['stu_id']))
            {
                echo $row['stu_id'];
            }
            ?>" readonly>
        </div>

        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" placeholder="Enter Course Name" value="<?php
            if(isset($row['stu_name']))
            {
                echo $row['stu_name'];
            }
            ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email:</label>
            <input type="text" class="form-control" id="stu_email" placeholder="Enter student email" name="stu_email"
                value="<?php
            if(isset($row['stu_email']))
            {
                echo $row['stu_email'];
            }
            ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" placeholder="" value="<?php
            if(isset($row['stu_occ']))
            {
                echo $row['stu_occ'];
            }
            ?>" readonly>
        </div>
        <div>
            <?php
                     echo 
                     ' <form action="updateInfo.php" method="POST" class="d-inline">
                         <input type="hidden" name="id" value='.$row['stu_id'].'>
                         <button type="submit" class="btn btn-info mr-3" name="view" value="View">Update Info <i
                                class="fas fa-pen"></i>
                        </button>
                        </input>
                        </form> '
                        ?>

        </div>
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
    </form>
</div>









<?php
include("includemain\stufooter.php");
?>