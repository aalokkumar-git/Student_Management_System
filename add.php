<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php"); // dashboard में ../ हटाओ
    exit;
}
?>
<?php
include("../includes/header.php");
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $father = $_POST['father_name'] ?? '';
    $mother = $_POST['mother_name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $roll = $_POST['roll_no'] ?? '';
    $address = $_POST['address'] ?? '';

    $conn->query("INSERT INTO students 
    (name,email,father_name,mother_name,dob,roll_no,address)
    VALUES 
    ('$name','$email','$father','$mother','$dob','$roll','$address')");

    header("Location: view.php?msg=added");
    exit;
}
?>

<h2 class="text-center mb-4">Add Student</h2>

<form method="POST" class="card p-4 shadow">
<input class="form-control mb-2" name="name" placeholder="Name">
<input class="form-control mb-2" name="email" placeholder="Email">
<input class="form-control mb-2" name="father_name" placeholder="Father Name">
<input class="form-control mb-2" name="mother_name" placeholder="Mother Name">
<input class="form-control mb-2" type="date" name="dob">
<input class="form-control mb-2" name="roll_no" placeholder="Roll No">
<textarea class="form-control mb-2" name="address" placeholder="Address"></textarea>

<button class="btn btn-primary">Add Student</button>
</form>

<?php include("../includes/footer.php"); ?>