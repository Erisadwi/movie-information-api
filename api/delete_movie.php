<?php
include "../koneksi.php";
include "../cek_apikey.php";
header("Content-Type: application/json");

if(!isset($_GET['id'])){
    echo json_encode(["status"=>"error","message"=>"ID wajib diisi"]);
    exit();
}

$id = $_GET['id'];
$query = "DELETE FROM movies WHERE id=$id";

if($conn->query($query)){
    echo json_encode(["status"=>"success","message"=>"Movie berhasil dihapus"]);
}else{
    echo json_encode(["status"=>"error","message"=>"Gagal hapus movie"]);
}
?>