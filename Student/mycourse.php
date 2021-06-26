<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("../db_connection.php");
include("includemain\header.php");
include_once("../classes/database.php");
include_once("../classes/course.php");
include_once("../classes/student.php");

if(!isset($_SESSION['is_login']))
{
    echo " <script>location.href = '../index.php'; </script> ";
}
 
 $stu_id = $_SESSION['student_id'];


?>
<div class="col-sm-9 mt-5">
    <div class=" mx-5 mt-5 text-center">
        <!-- Table start -->
        <h3 class="bg-dark text-white">Courses</h3>
        <?php
        $course = new Course();
        $result = $course -> LeftjoinMyCourse(); 
        
        if($result -> num_rows > 0)
        {
        ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Course Id</th>
                    <th scope="col">Student Id</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Author</th>
                    <th scope="col">Enroll date</th>
                    <th scope="col">Finish date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Remaining Days</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                ///************check whether any remaining days is zero or not********* */

            while($row = $result -> fetch_assoc())
            {
                $course_id = $row['course_id'];
                
                $date1  = date("Y-m-d"); //current date

                $sql2 = "SELECT end_date FROM enroll Where course_id = '$course_id' and stu_id = '$stu_id' ";

                   //*********diffrence between two dates***********
                $res = $conn->query($sql2);
                $row1 = $res -> fetch_assoc();
                $date2 = $row1['end_date']; // end_date from table

                
                $diff = abs(strtotime($date2) - strtotime($date1) );

                $years = floor($diff / (365*60*60*24));  // To get the year divide the resultant date into total seconds in a year (365*60*60*24)
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                //********delete row if $days = 0*****************
                if($days == 0)
                {
                    $sql2 = "DELETE FROM enroll WHERE course_id = '$course_id' and stu_id = '$stu_id'; ";
                    $res = $conn->query($sql2);
                    
                }

            }



            $sql = "SELECT course.course_id , student.stu_id, course.course_name, course.course_author, enroll.init_date , enroll.end_date FROM enroll LEFT JOIN student ON student.stu_id = enroll.stu_id 
            LEFT JOIN course ON course.course_id = enroll.course_id Where student.stu_id = '$stu_id'";
            $result = $conn -> query($sql);
            while($row = $result -> fetch_assoc())
            {
                //*********diffrence between two dates***********
                $course_id = $row['course_id'];
                $date1  = date("Y-m-d"); //current date

                $sql2 = "SELECT end_date FROM enroll Where course_id = '$course_id' and stu_id = '$stu_id' ";
                $res = $conn->query($sql2);
                $row1 = $res -> fetch_assoc();
                $date2 = $row1['end_date']; // end_date from table

                $diff = abs(strtotime($date2) - strtotime($date1));

                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
         
                
            ?>
                <tr id="data">
                    <td id="courseId">
                        <?php
                    echo $row['course_id'];
                    ?>
                    </td>
                    <td id="courseId">
                        <?php
                    echo $row['stu_id'];
                    ?>
                    </td>
                    <td>
                        <?php
                    echo $row['course_name']
                    ?>
                    </td>
                    <td>
                        <?php
                    echo $row['course_author']
                    ?>
                    </td>
                    <td>
                        <?php
                    echo $row['init_date']
                    ?>
                    </td>
                    <td>
                        <?php
                    echo $row['end_date']
                    ?>
                    </td>

                    <td>
                        <?php 

                    echo '<button class = "btn btn-secondary">ENROLLED</button>';
                    ?>
                    </td>

                    <td>
                        <?php  
                          echo $days ;
                    ?>
                    </td>


                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>
        <?php
        }
        else 
        {
            echo "0 result";
        }
        ?>
    </div>
</div>
</div>




<?php
include("includemain\stufooter.php");
?>