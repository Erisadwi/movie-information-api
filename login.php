<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "koneksi.php";

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
}

$message = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if($result->num_rows == 0){
        $message = "Email tidak ditemukan!";
    }else{
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            
            $_SESSION['login']   = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name']    = $user['name'];
            $_SESSION['api_key'] = $user['api_key'];

            header("Location: index.php");
            exit();

        }else{
            $message = "Password salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - Movie API</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="card">
    <h1>🎬 MOVIE API</h1>
    <h3>Login</h3>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Register</a></p>

    <div class="msg"><?php echo $message; ?></div>
</div>

</body>
</html>