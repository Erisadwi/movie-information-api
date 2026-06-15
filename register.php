<?php
include "koneksi.php";

$message = "";

if(isset($_POST['register'])){
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $api_key = "MOVIE-API-" . bin2hex(random_bytes(5));

    $cek = $conn->query("SELECT id FROM users WHERE email='$email'");
    if($cek->num_rows > 0){
        $message = "Email sudah terdaftar!";
    }else{
        $query = "INSERT INTO users(name,email,password,api_key,created_at)
                  VALUES('$name','$email','$pass','$api_key',NOW())";

        if($conn->query($query)){
            header("Location: login.php?success=1");
            exit;
        }else{
            $message = "Register gagal!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register - Movie API</title>
<link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="card">
    <h1>🎬 MOVIE API</h1>
    <h3>Register</h3>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Register</button>
    </form>

    <div class="msg"><?php echo $message; ?></div>
</div>

</body>
</html>