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
<div class="col-sm-9 mt-5">
    <div class=" mx-5 mt-5 text-center">
        <!-- Table start -->
        <h3 class="bg-dark text-white">Courses</h3>
        <?php
        $sql = "SELECT * FROM course";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0)
        {
        ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Course Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            while($row = $result -> fetch_assoc())
            {
            ?>
                <tr id="data">
                    <td id="courseId">
                        <?php
                    echo $row['course_id']
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

                        <form action="editcourse.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value='<?php echo $row['course_id']?>'>
                            <button type="submit" class="btn btn-info mr-3" name="view" value="View"> <i
                                    class="fas fa-pen"></i>
                            </button>
                            </input>
                        </form>
                    


                        <form action="" class="d-inline" id="formId">
                            <input type="hidden" name="id" value="<?= $row['course_id'] ?>">

                            <button type="submit" class="btn btn-secondary" name="delete"
                                id="courseDelete<?= $row['course_id'] ?>">
                                <i class="far fa-trash-alt"></i>
                            </button>

                            <!-- <button type="submit" class="btn btn-secondary" name="delete" id="coursedelete">
                               
                            </button> -->

                        </form>


                        <!-- **************course delete using ajax********* -->


                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
                        </script>
                        <script>
                        $('#courseDelete<?= $row['course_id'] ?>').click(function(e) {

                            e.preventDefault();
                            var answer = confirm("Delete this record ?");
                            var id = <?= $row['course_id'] ?>;
                            // console.log(id);
                            $.ajax({
                                url: 'course_delete.php',
                                method: 'GET',
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    console.log(data);
                                    if (data == "deleted") {

                                        console.log("deleted");

                                        setTimeout(() => {
                                            window.location.href =
                                                "courses.php";
                                        }, 1000);
                                    } else {
                                        console.log("failed");
                                    }

                                }
                            });

                            return false;

                        });
                        </script>

                        <!-- end course delete -->
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
// if(isset($_GET['delete']))
// {
//     echo "{$_GET['id']}";
//     $sql = "DELETE FROM course WHERE course_id =  '" . $_GET["id"] . "'";
//     if($conn -> query($sql) == TRUE)
//     {
//        echo 'deleted';
//     }
//     else 
//     {
//         echo "failed";
//     }
// }
// else
// {
//     echo "Nnn";
// }
?>





<div>
    <a href="addCourse.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i></a>
</div>
<?php
include("footer.php");






?>