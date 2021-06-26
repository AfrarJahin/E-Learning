<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Ischool</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">

    <!-- fontawsome -->
    <!--
    <link href=“https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css” /> -->

    <link rel="stylesheet" href="css/all.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>


<body>

    <!-- ************start navigation************* -->


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
        <a class="navbar-brand" href="index.php">iSchool</a>
        <span class="navbar-text">Learn and Implement</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Home</a> </li>
                <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a> </li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Payment</a> </li>
                <?php
                    session_start();
                    if(isset($_SESSION['is_login']))
                    {
                        echo '<li class="nav-item custom-nav-item"><a href="\Elearning\Student\profile.php" class="nav-link">My profile</a></li>';
                         
                        echo '<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                    }
                    elseif(isset($_SESSION['adminLogin']))
                    {
                        echo '<li class="nav-item custom-nav-item"><a href="Admin/adminDashboard.php" class="nav-link">Dashboard</a></li>';
                         
                        echo '<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal"
                        data-target="#stuLoginModalCenter">Login</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal"
                        data-target="#stuRegModalCenter">Sign Up</a></li>';
                    }
                ?>

                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>


    <!--************ end navigation************** -->