<?php
session_start();
include("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $u = $_POST['username'];
    $p = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE username='$u'");
    $data = $res->fetch_assoc();

    if ($data && password_verify($p, $data['password'])) {
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Login Failed</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}

.login-box {
    width: 350px;
    margin: 100px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.login-box input {
    margin-bottom: 15px;
}

.login-box button {
    width: 100%;
    border-radius: 20px;
}
</style>

</head>

<body>

<div class="login-box">
    <h3 class="text-center mb-3">Login</h3>

    <form method="POST">

        <input type="text" name="username" class="form-control" placeholder="Username" required>

        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>
</div>

</body>
</html>