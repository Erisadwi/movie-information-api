<?php
include "koneksi.php";

$headers = getallheaders();
$api_key = $headers['API_KEY'] ?? '';

$cek = $conn->query("SELECT * FROM users WHERE api_key='$api_key'");

if($cek->num_rows == 0){
    echo json_encode(["message"=>"API KEY tidak valid"]);
    exit;
}
?>