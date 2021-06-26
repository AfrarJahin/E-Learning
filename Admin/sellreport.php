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

<?php
include("footer.php");
?>