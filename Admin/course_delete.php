<?php
include_once("../db_connection.php");

    $sql = "DELETE FROM course WHERE course_id =  '" . $_GET["id"] . "'";
    if($conn -> query($sql) == TRUE)
    {
       echo 'deleted';
    }
    else 
    {
        echo "failed";
    }

?>