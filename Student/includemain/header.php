<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("../db_connection.php");

if(!isset($_SESSION['is_login']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}

    $stuLogmail = $_SESSION['stuLogEmail'];
    $sql = "SELECT stu_img from student WHERE stu_email = '$stuLogmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img']
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Student Dashboard
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custome CSS -->
    <link rel="stylesheet" href="../css/adminstyle.css">

    <!-- Google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #265b91">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="profile.php" style="margin-left:10 px;">E-Learning</a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fab fa-accessible-icon"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mycourse.php">
                                <i class="fas fa-book"></i>
                                My courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feedback.php">
                                <i class="fas fa-users"></i>
                                Feedback
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="\Elearning\Student\courses.php">
                                <i class="fab fa-paypal"></i>
                                All courses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="changepass.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>