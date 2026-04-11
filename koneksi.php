<?php
$conn = new mysqli("localhost","root","","movie_db");

if($conn->connect_error){
    die("Koneksi gagal");
}
?>