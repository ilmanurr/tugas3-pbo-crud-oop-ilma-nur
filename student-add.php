<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h5>".$_SESSION['message']."</h5>";
                        unset($_SESSION['message']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add Data Student</h4>
                        <a href="index.php" class="btn btn-primary float-end">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="student-code.php" method="POST">
                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input type="text" name="fullname" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input type="text" name="course" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Phone No</label>
                                <input type="text" name="phone" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-success">Save Student</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>