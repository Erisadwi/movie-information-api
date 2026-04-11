<?php
include "../koneksi.php";
include "../cek_apikey.php";
header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM movies");

$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode([
    "status"=>"success",
    "message"=>"Semua data movie",
    "data"=>$data
]);
?>