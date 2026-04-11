<?php
include "../koneksi.php";
include "../cek_apikey.php";
header("Content-Type: application/json");

if(!isset($_GET['id'])){
    echo json_encode(["status"=>"error","message"=>"ID wajib diisi"]);
    exit();
}

$id = (int)$_GET['id'];

$data = json_decode(file_get_contents("php://input"), true);
if(!$data){
    echo json_encode(["status"=>"error","message"=>"Body harus format JSON"]);
    exit();
}

$stmt = $conn->prepare("SELECT title, genre, year, rating FROM movies WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"Movie dengan ID $id tidak ditemukan"]);
    exit();
}
$old = $result->fetch_assoc();

$title  = $data['title']  ?? $old['title'];
$genre  = $data['genre']  ?? $old['genre'];
$year   = isset($data['year']) ? (int)$data['year'] : (int)$old['year'];
$rating = isset($data['rating']) ? (float)$data['rating'] : (float)$old['rating'];

$update = $conn->prepare("UPDATE movies SET title=?, genre=?, year=?, rating=? WHERE id=?");
$update->bind_param("ssidi", $title, $genre, $year, $rating, $id);

if($update->execute()){
    echo json_encode(["status"=>"success","message"=>"Movie berhasil diupdate"]);
}else{
    echo json_encode(["status"=>"error","message"=>"Gagal update", "error"=>$update->error]);
}
?>