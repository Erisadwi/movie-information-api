<?php
include "koneksi.php";

if(isset($_POST['endpoint'])){
    $endpoint = $_POST['endpoint'];
    $conn->query("INSERT INTO api_logs(endpoint) VALUES('$endpoint')");
}
?>