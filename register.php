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
<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(120deg,#141e30,#243b55);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}
.card{
    background:white;
    padding:40px;
    width:350px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ccc;
}
button{
    width:100%;
    padding:12px;
    background:#243b55;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}
button:hover{ background:#141e30; }
.msg{margin-top:15px;color:green;}
</style>
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