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
<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background: linear-gradient(
        135deg,
        #0f2027,
        #2c5364,
        #6a82fb
    );
    color:#333;
    min-height:100vh;
    padding-top:90px;
}
.header{
    text-align:center;
    padding:40px 20px;
    color:white;
}

.container{
    width:100%;
    max-width:1100px;
    margin:auto;
}
.navbar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:80px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:0 50px;

    background:#102452;
    border-bottom:1px solid rgba(255,255,255,.08);

    box-shadow:0 4px 15px rgba(0,0,0,.15);
    box-sizing:border-box;
}

.logo{
    color:white;
    font-size:32px;
    font-weight:800;
    display:flex;
    align-items:center;
    gap:10px;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:15px;
}

.nav-right a{
    text-decoration:none;
    color:white;
    font-weight:600;
    font-size:17px;
    padding:12px 24px;
    border-radius:10px;
    transition:all .3s ease;
}

.nav-right a:hover{
    color:#ffffff;
    background:rgba(255,255,255,0.15);
    text-shadow:0 0 10px rgba(255,255,255,0.8);
    transform:translateY(-2px)
}

.logout-btn{
    background:#ff2d3e !important;
}

.logout-btn:hover{
    background:#e11d48 !important;
}

.card-info{
    background:white;
    padding:20px;
    border-radius:12px;
    text-align:center;
    margin-bottom:20px;
}
.stats{
    display:flex;
    gap:20px;
    justify-content:center;
    margin:30px 0;
}
.stat-box{
    background:white;
    padding:20px;
    border-radius:12px;
    width:200px;
}
.endpoint-box{
    background:white;
    padding:25px;
    border-radius:12px;
    margin-bottom:30px;
}

.endpoint{
    background:#f4f6fb;
    padding:18px;
    border-radius:12px;
    margin:15px 0;
    display:flex;
    flex-direction:column;
}

.endpoint-top{
    display:flex;
    align-items:center;
    width:100%;
}

.endpoint-top input{
    flex:1;
    padding:11px;
    border-radius:8px;
    border:1px solid #ccc;
    background:white;
    font-size:14px;
}

.endpoint-top button{
    margin-left:auto;
    margin-left:15px;
    background:#28a745;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

.endpoint p{
    margin-top:10px;
    color:#555;
}
.method{
    font-weight:bold;
    color:white;
    padding:4px 10px;
    border-radius:6px;
    margin-right:10px;
}
.get{background:#28a745;}
.post{background:#007bff;}
.put{background:#ffc107;color:black;}
.delete{background:#dc3545;}
.try{
    background:white;
    padding:25px;
    border-radius:12px;
    margin-bottom:50px;
}
input{
    padding:10px;
    width:70%;
    margin-top:10px;
    border-radius:6px;
    border:1px solid #ccc;
    background:#f4f6fb;
}

button{
    padding:10px 20px;
    background:#667eea;
    color:white;
    border:none;
    border-radius:6px;
}

#resultBox{
    background: linear-gradient(
        135deg,
        rgba(67, 56, 202, 0.85),
        rgba(124, 58, 237, 0.85)
    );
    color: #f1f5ff;
    padding:20px;
    margin-top:20px;
    border-radius:14px;
    text-align:left;
    max-height:300px;
    overflow:auto;
    border:1px solid rgba(255,255,255,0.15);
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    font-size:14px;
    backdrop-filter: blur(6px);
}

.footer{
    background:#f3f4f6;
    border-top:1px solid #d9dce1;
    text-align:center;
    padding:18px;
    color:#7b7f86;
    font-size:14px;
    margin-top:40px;
}

</style>
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