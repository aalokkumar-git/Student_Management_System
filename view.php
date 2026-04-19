<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php"); // dashboard में ../ हटाओ
    exit;
}
?>
<?php include("../includes/header.php"); ?>
<?php include("../config/db.php"); ?>

<h2 class="text-center mb-4">Student List</h2>

<!-- 🔍 Search Box -->
<input type="text" id="search" class="form-control mb-3" placeholder="🔍 Search student...">

<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'added') {
        echo "<div class='alert alert-success'>Student Added Successfully</div>";
    }
    if ($_GET['msg'] == 'updated') {
        echo "<div class='alert alert-primary'>Student Updated Successfully</div>";
    }
    if ($_GET['msg'] == 'deleted') {
        echo "<div class='alert alert-danger'>Student Deleted Successfully</div>";
    }
}
?>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Roll No</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
<?php
$data = $conn->query("SELECT * FROM students");

while($row = $data->fetch_assoc()) {
echo "<tr>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['roll_no']."</td>
<td>".$row['father_name']."</td>
<td>".$row['mother_name']."</td>
<td>".($row['dob'] == '0000-00-00' ? '-' : $row['dob'])."</td>
<td>".$row['address']."</td>
<td>
    <div class='d-flex justify-content-center gap-2'>
        <a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>

        <a href='delete.php?id=".$row['id']."' 
        onclick='return confirm(\"Are you sure?\")' 
        class='btn btn-danger btn-sm'>Delete</a>
    </div>
</td>
</tr>";
}
?>
    </tbody>
</table>
</div>

<!-- 🔍 Live Search Script -->
<script>
document.getElementById("search").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

<?php include("../includes/footer.php"); ?>
<script>
setTimeout(() => {
    let alert = document.querySelector(".alert");
    if(alert) alert.style.display = "none";
}, 3000);
</script>