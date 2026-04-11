<?php
include "../koneksi.php";
include "../cek_apikey.php";
header("Content-Type: application/json");

if(!isset($_GET['id'])){
    echo json_encode(["status"=>"error","message"=>"ID wajib diisi"]);
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM movies WHERE id=$id");

if($result->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"Movie tidak ditemukan"]);
}else{
    echo json_encode([
        "status"=>"success",
        "data"=>$result->fetch_assoc()
    ]);
}
?>