<?php
    include('mainInclude/header.php');
    ?>
<!-- Start Video -->

<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banner.mp4">
        </video>
        <div class="vid-overlay">

        </div>
    </div>

    <div class="vid-content">
        <h1 class="my-content" style="color: #fff;">Welcome to iSchool</h1><br>
        <small class="my-content" style="color: #fff;">Learn and Implement</small><br />
        <?php
        if(!isset($_SESSION['is_login']) && !isset($_SESSION['adminLogin']))
        {
            echo '<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
        }
        else 
        {
            if(!isset($_SESSION['adminLogin']))
            {
                echo '<a href="Student/profile.php" class="btn btn-primary mt-3">My Profile</a>';
                
            }
            else 
            {
                echo '<a href="Admin/adminDashboard.php" class="btn btn-primary mt-3">Admin Dashboard</a>';
            }
        }
        ?>

        <!-- Button trigger modal -->
    </div>
</div>


<!--  End Video -->



<!-- start text banner -->
<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open"></i> 100% Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users"></i>
                Expert Instructor</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard"></i>
                Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-money-check-alt"></i></i>
                Moneyback Guarantee</h5>
        </div>
    </div>
</div>
<!-- end text banner -->


<!-- start popular course -->

<?php
        include('popular_course_index.php');
    ?>

<!-- End most popular course -->


<!-- Start contact us -->

<?php
if(!isset($_SESSION['adminLogin']))
{ 
        include('./contact.php');
}
?>
<!-- End contact us -->


<?php
if(!isset($_SESSION['is_login']) && !isset($_SESSION['adminLogin']))
{ 

    include('mainInclude/footer.php');
}
?>