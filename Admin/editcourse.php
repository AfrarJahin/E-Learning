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


    $course_id = $_POST['id'];
    $sql = "SELECT * FROM course WHERE course_id =  $course_id ";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


?>

<div class="col-sm-6 mt-5 mx-3 jumbotrom">
    <h3 class="text-center">Update Course</h3>
    <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
    <form action="" enctype="multipart/form-data" id="addCourseForm">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name" value = "<?php
            if(isset($row['course_name']))
            {
                echo $row['course_name'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <input type="text" class="form-control" id="course_desc" placeholder="Enter Course Description"
                name="course_desc" value = "<?php
            if(isset($row['course_desc']))
            {
                echo $row['course_desc'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="course_author">Author Name</label>
            <input type="text" class="form-control" id="course_author" name="course_author"
                placeholder="Enter Author Name" value = "<?php
            if(isset($row['course_author']))
            {
                echo $row['course_author'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration"
                placeholder="Enter Course Duration" value = "<?php
            if(isset($row['course_duration']))
            {
                echo $row['course_duration'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price"
                placeholder="Enter Course Selling Price" value = "<?php
            if(isset($row['course_price']))
            {
                echo $row['course_price'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="course_org_price">Course Original price</label>
            <input type="text" class="form-control" id="course_org_price" name="course_org_price"
                placeholder="Enter Course Original price" value = "<?php
            if(isset($row['course_org_price']))
            {
                echo $row['course_org_price'];
            }
            ?>">
        </div>
        <div class="form-group">
            <label for="total_seat">Total Seats</label>
            <input type="text" class="form-control" id="total_seat" name="total_seat"
                placeholder="Enter total seats for this course" value = "<?php
            if(isset($row['total_seat']))
            {
                echo $row['total_seat'];
            }
            ?>">
        </div>
        <!-- <div class="form-group">
            <label for="course_img">Choose Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div> -->
        </form>
        <div>
            <button type="submit" class="btn btn-danger"  onclick="reqUpdate(<?php echo $course_id; ?>)" > Update</button>
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
    

</div>








<?php
include("footer.php");
?>

<script>
function reqUpdate(course_id)
{
    console.log("ssssssssssss");
    var course_name = $("#course_name").val();
    var course_desc = $("#course_desc").val();
    var course_author = $("#course_author").val();
    var course_duration = $("#course_duration").val();
    var course_price = $("#course_price").val();
    var course_org_price = $("#course_org_price").val();
    var total_seat = $("#total_seat").val();
    var course_id = course_id;
    $.ajax({
        url: "update.php",
        method: "POST",
        data: {

            course_name: course_name,
            course_desc: course_desc,
            course_author: course_author,
            course_duration: course_duration,
            course_price: course_price,
            course_org_price: course_org_price,
            total_seat: total_seat,
            course_id : course_id
        },
        success: function (data) {
            console.log(data);
           // $('#addCourseForm')[0].reset();

            if (data = 'Inserted') {
                $('#insertSuccess').html("<span class= 'alert alert-success'>Updated</span>");
            }
            else {
                $('#insertSuccess').html("<span class= 'alert alert-success'>Unable to Update Data</span>");
            }
        }

    });

}
</script>
