<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movie API Documentation</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background: linear-gradient(
        135deg,
        #0f2027,
        #2c5364,
        #6a82fb
    );
    min-height:100vh;
    color:#333;

    padding-top:90px;
}

.container{
    width:95%;
    max-width:1200px;
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

    z-index:9999;
}

.logo{
    color:#fff;
    font-size:32px;
    font-weight:800;
    display:flex;
    align-items:center;
    gap:12px;
    text-shadow:none;
}

.nav-links{
    display:flex;
    align-items:center;
    gap:15px;
}

.nav-links a{
    text-decoration:none;
    color:rgba(255,255,255,0.85);
    font-weight:600;
    font-size:17px;
    padding:12px 24px;
    border-radius:10px;
    transition:all .3s ease;
}

.nav-links a:hover{
    color:#ffffff;
    background:rgba(255,255,255,0.15);
    text-shadow:0 0 10px rgba(255,255,255,0.8);
    transform:translateY(-2px);
}

.nav-links a.active{
    background:#273b73;
    color:#ffffff;
}

.doc-link{
    color:#2563eb;
    text-decoration:underline;
    font-weight:500;
}

.doc-link:hover{
    color:#1d4ed8;
}

.hero{
    margin-top:25px;
    padding:90px 40px;
    text-align:center;
    color:white;
    border-radius:20px;
    position:relative;
    overflow:hidden;

    background:
    linear-gradient(
        rgba(158, 154, 154, 0.25),
        rgba(255, 255, 255, 0.45)
    ),
    url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=1920');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    box-shadow:0 25px 50px rgba(0,0,0,.45);
    border:1px solid rgba(255,255,255,.15);
}

.hero{
    position:relative;
    overflow:hidden;
}

.hero::before{
    content:"";
    position:absolute;
    top:-100px;
    left:-100px;
    width:300px;
    height:300px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
}

.hero::after{
    content:"";
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to right,
        rgba(16,36,82,.45),
        rgba(79,70,229,.15)
    );

    z-index:1;
}

.hero h1{
    font-size:68px;
    font-weight:900;
    margin-bottom:20px;

    text-shadow:
        0 4px 10px rgba(0,0,0,.8),
        0 0 20px rgba(255,255,255,.3);

    position:relative;
    z-index:2;
}

.hero p{
    font-size:22px;
    opacity:.95;
    text-shadow:0 2px 10px rgba(0,0,0,.6);
    position:relative;
    z-index:2;
}

.hero-btn{
    position:relative;
    z-index:2;

    margin-top:30px;
    padding:14px 35px;

    border:none;
    border-radius:10px;

    background:#ffffff;
    color:#4f46e5;
    font-weight:bold;
    font-size:16px;

    cursor:pointer;
    transition:.3s;
}

.hero-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(255,255,255,.3);
}

.card{
    background:white;
    margin-top:25px;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

.card h2{
    margin-bottom:15px;
    color:#2c5364;
}

.card p{
    line-height:1.8;
}

.card ol{
    margin-left:25px;
    line-height:2;
}

.endpoint{
    background:#f4f6fb;
    margin-top:20px;
    border-radius:12px;
    overflow:hidden;
}

.endpoint-header{
    background:#eef2ff;
    padding:20px;
}

.method{
    color:white;
    padding:5px 12px;
    border-radius:6px;
    font-weight:bold;
    margin-right:10px;
}

.get{
    background:#28a745;
}

.post{
    background:#007bff;
}

.put{
    background:#ffc107;
    color:black;
}

.delete{
    background:#dc3545;
}

.endpoint-body{
    padding:20px;
}

.code{
    background: linear-gradient(
        135deg,
        rgba(145, 137, 231, 0.9),
        rgba(124,58,237,.9)
    );

    color:white;
    padding:18px;
    border-radius:12px;
    margin-top:10px;
    overflow:auto;
    white-space:pre-wrap;
    font-family:Consolas;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

.footer{
    width:100%;
    background:#f3f4f6;
    border-top:1px solid #d9dce1;
    text-align:center;
    padding:18px;
    color:#7b7f86;
    font-size:14px;
    margin-top:40px;
}

@media(max-width:768px){

    .stats{
        flex-direction:column;
    }

    .hero h1{
        font-size:36px;
    }

}

</style>
</head>

<body>

<div class="container">

    <nav class="navbar">

        <div class="logo">
            🎬 Movie API
        </div>

        <div class="nav-links">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="landing_page.php" class="active">Dashboard</a>
        </div>

    </nav>

    <div class="hero">

        <h1>Movie Database API</h1>

        <p>
            Access movie data through a simple and powerful API.
        </p>

        <a href="register.php">
            <button class="hero-btn">
                Get Started
            </button>
        </a>

    </div>

    <div class="card">

        <h2>🚀 Getting Started</h2>

        <ol>
            <li>
            Create an account through our
            <a href="register.php" class="doc-link">
                registration page
            </a>
        </li>
            <li>Login to your account to get your API Key.</li>
            <li>If you are using Postman, copy your API Key from the Dashboard and add it to the request header.</li>
            <li>If you are using the Web Client, simply log in to your account. The API Key will be sent automatically by the system.</li>
            <li>Send requests to the available endpoints.</li>
            <li>View and manage the returned data directly through the website.</li>
        </ol>

    </div>

    <div class="card">

        <h2>🔐 Authentication</h2>

        <p>
            Every endpoint requires API Key authentication.
        </p>

        <div class="code">
{
   "API_KEY":"your-api-key"
}
        </div>

    </div>

    <div class="card">

        <h2>📘 API Endpoints</h2>

        <div class="endpoint">

            <div class="endpoint-header">
                <span class="method get">GET</span>
                /api/get_movies.php
            </div>

            <div class="endpoint-body">

                <p>Get all movie data.</p>

                <div class="code">
{
   "status":"success",
   "data":[]
}
                </div>

            </div>

        </div>

        <div class="endpoint">

            <div class="endpoint-header">
                <span class="method get">GET</span>
                /api/get_movie.php?id=1
            </div>

            <div class="endpoint-body">

                <p>Get movie by ID.</p>

                <div class="code">
{
   "id":1,
   "title":"Avengers Endgame",
   "genre":"Action",
   "year":2019
}
                </div>

            </div>

        </div>

        <div class="endpoint">

            <div class="endpoint-header">
                <span class="method post">POST</span>
                /api/add_movie.php
            </div>

            <div class="endpoint-body">

                <p>Add new movie.</p>

                <div class="code">
{
   "title":"Interstellar",
   "genre":"Sci-Fi",
   "year":2014
}
                </div>

            </div>

        </div>

        <div class="endpoint">

            <div class="endpoint-header">
                <span class="method put">PUT</span>
                /api/update_movie.php?id=1
            </div>

            <div class="endpoint-body">

                <p>Update existing movie.</p>

                <div class="code">
{
   "title":"Interstellar Updated",
   "genre":"Sci-Fi",
   "year":2014
}
                </div>

            </div>

        </div>

        <div class="endpoint">

            <div class="endpoint-header">
                <span class="method delete">DELETE</span>
                /api/delete_movie.php?id=1
            </div>

            <div class="endpoint-body">

                <p>Delete movie by ID.</p>

                <div class="code">
{
   "status":"success",
   "message":"Movie deleted successfully"
}
                </div>

            </div>

        </div>

    </div>
    
    <div class="card">

        <h2>📬 Using API with Postman</h2>

        <p>Endpoint URL:</p>

        <div class="code">
http://localhost/UTSAPI/api/get_movies.php
        </div>

        <br>

        <p>Request Header:</p>

        <div class="code">
Key   : API_KEY
Value : your-api-key
        </div>

    </div>
</div>

<footer class="footer">
    Movie API • Provider of Movie Services • 2026
</footer>

</body>

</body>
</html>