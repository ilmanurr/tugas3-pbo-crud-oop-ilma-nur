<?php

class StudentController
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($inputData)
    {
        $fullname = $inputData['fullname'];
        $email    = $inputData['email'];
        $phone    = $inputData['phone'];
        $course   = $inputData['course'];

        $studentQuery = "INSERT INTO students (fullname,email,phone,course) VALUES ('$fullname','$email','$phone','$course')";
        $result       = $this->conn->query($studentQuery);

        return $result;
    }

    public function index()
    {
        $studentQuery = "SELECT * FROM students";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function edit($id)
    {
        $student_id = mysqli_real_escape_string($this->conn, $id);
        $studentQuery = "SELECT * FROM students WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $student_id = mysqli_real_escape_string($this->conn, $id);
        $fullname = $inputData['fullname'];
        $email = $inputData['email'];
        $phone = $inputData['phone'];
        $course = $inputData['course'];

        $studentQuery = "UPDATE students SET fullname='$fullname', email='$email', phone='$phone', course='$course' WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $student_id = mysqli_real_escape_string($this->conn,$id);
        $studentDeleteQuery = "DELETE FROM students WHERE id='$student_id' LIMIT 1";
        $result = $this->conn->query($studentDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>
