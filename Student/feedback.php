<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("../db_connection.php");
include("includemain\header.php");


if(!isset($_SESSION['is_login']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}

?>


<?php
include("includemain\stufooter.php");
?>