<?php
include('DBConn.php');
include_once('StudentController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Student</h4>
                        <a href="student-add.php" class="btn btn-primary float-end">Add New Data</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        $db = new DatabaseConnection(); // Create a new instance of DatabaseConnection
                                        $students = new StudentController($db->conn); // Pass the database connection to the controller
                                        $result = $students->index();
                                        if($result)
                                        {
                                            foreach($result as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['fullname'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['phone'] ?></td>
                                                    <td><?= $row['course'] ?></td>
                                                    <td>
                                                        <a href="student-edit.php?id=<?=$row['id'];?>" class="btn btn-warning">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="student-code.php" method="POST">
                                                            <button type="submit" name="deleteStudent" value="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>