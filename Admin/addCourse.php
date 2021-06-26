<?php
if(!isset($_SESSION))
{
    session_start();
}
include("header.php");
include("../db_connection.php");



if(!isset($_SESSION['adminLogin']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotrom">
    <h3 class="text-center">Add Course</h3>
    <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
    <form action="" enctype="multipart/form-data" id="addCourseForm">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <input type="text" class="form-control" id="course_desc" placeholder="Enter Course Description"
                name="course_desc">
        </div>
        <div class="form-group">
            <label for="course_author">Author Name</label>
            <input type="text" class="form-control" id="course_author" name="course_author"
                placeholder="Enter Author Name">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration"
                placeholder="Enter Course Duration">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price"
                placeholder="Enter Course Selling Price">
        </div>
        <div class="form-group">
            <label for="course_org_price">Course Original price</label>
            <input type="text" class="form-control" id="course_org_price" name="course_org_price"
                placeholder="Enter Course Original price">
        </div>
        <div class="form-group">
            <label for="enroll_duration">Enrollment time(In days)</label>
            <input type="text" class="form-control" id="enroll_duration" name="enroll_duration"
                placeholder="Enter Course enroll_duration">
        </div>

        <div class="form-group">
            <label for="total_seat">Total Seats</label>
            <input type="text" class="form-control" id="total_seat" name="total_seat"
                placeholder="Enter total seats for this course">
        </div>
        <!-- <div class="form-group">
            <label for="course_img">Choose Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div> -->
        <div>
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Add Course</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
            <span id="insertSuccess"></span>
        </div>
        <div id="msg"></div>
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
    </form>

</div>
<?php
include("footer.php");
?>