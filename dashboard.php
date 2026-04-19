<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); 
    exit;
}
?>
<?php include("includes/header.php"); ?>
<?php include("config/db.php"); ?>

<h2 class="text-center mb-4">Dashboard</h2>

<div class="row">

<?php
$total = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
?>

<div class="col-md-4">
    <div class="card text-center shadow p-3">
        <h4>Total Students</h4>
        <h2 class="text-primary"><?php echo $total; ?></h2>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-center shadow p-3">
        <h4>Add Student</h4>
        <a href="students/add.php" class="btn btn-success">Go</a>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-center shadow p-3">
        <h4>View Students</h4>
        <a href="students/view.php" class="btn btn-info">Go</a>
    </div>
</div>

</div>

<?php include("includes/footer.php"); ?>