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

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $father = $_POST['father_name'];
    $mother = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $roll = $_POST['roll_no'];
    $address = $_POST['address'];

    $conn->query("UPDATE students SET 
        name='$name',
        email='$email',
        father_name='$father',
        mother_name='$mother',
        dob='$dob',
        roll_no='$roll',
        address='$address'
        WHERE id=$id");

    header("Location: view.php?msg=updated");
    exit;
}
?>

<h2 class="text-center mb-4">Edit Student</h2>

<form method="POST" class="card p-4 shadow">
<input class="form-control mb-2" name="name" value="<?php echo $data['name']; ?>">
<input class="form-control mb-2" name="email" value="<?php echo $data['email']; ?>">
<input class="form-control mb-2" name="father_name" value="<?php echo $data['father_name']; ?>">
<input class="form-control mb-2" name="mother_name" value="<?php echo $data['mother_name']; ?>">
<input class="form-control mb-2" type="date" name="dob" value="<?php echo $data['dob']; ?>">
<input class="form-control mb-2" name="roll_no" value="<?php echo $data['roll_no']; ?>">
<textarea class="form-control mb-2" name="address"><?php echo $data['address']; ?></textarea>

<button class="btn btn-success">Update Student</button>
</form>

<?php
 include("../includes/footer.php"); 
 ?>