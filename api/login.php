<?php
include "../koneksi.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password = $data['password'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($query);

if($result->num_rows == 0){

    echo json_encode([
        "status"=>false,
        "message"=>"Email tidak ditemukan"
    ]);

}else{

    $user = $result->fetch_assoc();

    if(password_verify($password, $user['password'])){

        echo json_encode([
            "status"=>true,
            "name"=>$user['name'],
            "api_key"=>$user['api_key']
        ]);

    }else{

        echo json_encode([
            "status"=>false,
            "message"=>"Password salah"
        ]);
    }
}
?>