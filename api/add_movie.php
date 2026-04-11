<?php
include "../koneksi.php";
include "../cek_apikey.php";
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo json_encode(["status"=>"error","message"=>"Gunakan method POST"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode(["status"=>"error","message"=>"Body harus format JSON"]);
    exit;
}

$title  = $data['title']  ?? '';
$genre  = $data['genre']  ?? '';
$year   = $data['year']   ?? '';
$rating = $data['rating'] ?? '';

if($title=='' || $genre=='' || $year=='' || $rating==''){
    echo json_encode(["status"=>"error","message"=>"Semua field wajib diisi"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO movies(title,genre,year,rating) VALUES (?,?,?,?)");
$stmt->bind_param("ssid",$title,$genre,$year,$rating);

if($stmt->execute()){
    echo json_encode(["status"=>"success","message"=>"Movie berhasil ditambahkan"]);
}else{
    echo json_encode(["status"=>"error","message"=>"Gagal tambah movie"]);
}
?>