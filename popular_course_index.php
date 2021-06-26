
<?php
include_once("classes/database.php");
include_once("classes/course.php");

?>
<!-- start popular course -->

<style>
.col-md-4 {
    margin-bottom: 40px;
}
</style>
<?php
if(!isset($_SESSION['is_login']))
{

?>
<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>

    <!-- start most popular course  card deck -->

    <div class="card-deck mt-4 row mb-3">
        <?php 

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
                                    
                                     <a href="#" class="btn btn-primary text-white font-weight-bolder float-right" data-toggle="modal"data-target="#stuLoginModalCenter">Login for Enroll</a>   
                            
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php
}
}
?>
</div>

</div>
<?php
   include('student_log.php');
   ?>