<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movie API Documentation</title>
<link rel="stylesheet" href="css/style.css">
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