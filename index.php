<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$files = glob("api/*.php");
$total_endpoints = count($files);

$methods = ["GET","POST","PUT","DELETE"];
$total_methods = count($methods);

$copy = $conn->query("SELECT COUNT(*) as total FROM api_logs");
$dataCopy = $copy->fetch_assoc();
$total_copy = $dataCopy['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>API Hub - Movie API</title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>

<nav class="navbar">

    <div class="logo">
        🎬 Movie API
    </div>

    <div class="nav-right">
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</nav>

<div class="header">
    <h1>🚀 API Hub - Movie</h1>
    <p>Dokumentasi API Movie sederhana</p>
</div>

<div class="container">
    <div class="card-info">
        <h2>Welcome, <?php echo $_SESSION['name']; ?> 👋</h2>
        <p>Gunakan API KEY ini untuk akses endpoint melalui Postman</p>
        <h3 style="background:#eee;padding:10px;border-radius:8px;">
            <?php echo $_SESSION['api_key']; ?>
        </h3>
    </div>

    <div class="stats">
    <div class="stat-box">
        <h2><?= $total_endpoints ?></h2>
        <p>Total Endpoints</p>
    </div>

    <div class="stat-box">
        <h2><?= $total_methods ?></h2>
        <p>HTTP Methods</p>
    </div>

    <div class="stat-box">
        <h2><?= $total_copy ?></h2>
        <p>Endpoint Copied</p>
    </div>
</div>

    <div class="endpoint-box">
    <h2>🎬 Movie API Endpoints</h2>
    <p>Copy link endpoint di bawah ini untuk digunakan di Postman</p>

    <div class="endpoint">
    <div class="endpoint-top">
        <span class="method get">GET</span>
        <input id="e1" value="http://localhost/UTSAPI/api/get_movies.php" readonly>
        <button onclick="copyEndpoint('e1')">Copy</button>
    </div>
    <p>Ambil semua data movie</p>
    </div>

    <div class="endpoint">
        <div class="endpoint-top">
            <span class="method get">GET</span>
            <input id="e2" value="http://localhost/UTSAPI/api/get_movie.php?id=1" readonly>
            <button onclick="copyEndpoint('e2')">Copy</button>
        </div>
        <p>Ambil detail movie berdasarkan ID</p>
    </div>

   <div class="endpoint">
    <div class="endpoint-top">
        <span class="method post">POST</span>
        <input id="e3" value="http://localhost/UTSAPI/api/add_movie.php" readonly>
        <button onclick="copyEndpoint('e3')">Copy</button>
    </div>
    <p>Tambah movie baru</p>
    </div>

    <div class="endpoint">
    <div class="endpoint-top">
        <span class="method put">PUT</span>
        <input id="e4" value="http://localhost/UTSAPI/api/update_movie.php?id=1" readonly>
        <button onclick="copyEndpoint('e4')">Copy</button>
    </div>
    <p>Update data movie</p>
    </div>

    <div class="endpoint">
    <div class="endpoint-top">
        <span class="method delete">DELETE</span>
        <input id="e5" value="http://localhost/UTSAPI/api/delete_movie.php?id=1" readonly>
        <button onclick="copyEndpoint('e5')">Copy</button>
    </div>
    <p>Hapus movie</p>
    </div>
</div>

    <div class="try">
        <h2>🧪 Try Endpoint</h2>
        <p>Test endpoint langsung dari dashboard menggunakan API KEY kamu</p>
        <input id="endpointInput" placeholder="Contoh: api/get_movies.php">
        <br><br>
        <button onclick="testAPI()">Send Request</button>
        <pre id="resultBox"></pre>
    </div>
</div>
<script>

function copyEndpoint(id){
    let copyText = document.getElementById(id);
    copyText.select();
    document.execCommand("copy");

    fetch("log_copy.php", {
        method:"POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body:"endpoint="+copyText.value
    });

    alert("Endpoint berhasil dicopy!");
}


function testAPI(){
    let endpoint = document.getElementById("endpointInput").value;
    let apiKey   = "<?php echo $_SESSION['api_key']; ?>";

    if(endpoint == ""){
        alert("Masukkan endpoint dulu!");
        return;
    }

    fetch("http://localhost/UTSAPI/" + endpoint, {
        method: "GET",
        headers: {
            "API_KEY": apiKey
        }
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById("resultBox").innerText = data;
    })
    .catch(err => {
        document.getElementById("resultBox").innerText = "Error: " + err;
    });
}

</script>

<footer class="footer">
    Movie API • Provider of Movie Services • 2026
</footer>

</body>
</html>