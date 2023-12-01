<?php
include('dbconn.php');
include_once('StudentController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP OOPS - Edit & Update Data into database in php mysql using oops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit</h4>
                        <a href="student-view.php" class="btn btn-primary float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $db = new DatabaseConnection();
                            $student_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                            $student = new StudentController($db->conn);
                            $result = $student->edit($student_id);

                            if($result)
                            {
                                ?>
                                <form action="student-code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?=$result['id']?>">

                                    <div class="mb-3">
                                        <label for="">Full Name</label>
                                        <input type="text" name="fullname" value="<?=$result['fullname']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email ID</label>
                                        <input type="text" name="email" value="<?=$result['email']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Course</label>
                                        <input type="text" name="course" value="<?=$result['course']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone No</label>
                                        <input type="text" name="phone" value="<?=$result['phone']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-success">Update Student</button>
                                    </div>
                                </form>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Record Found</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>Something Went Wront</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>