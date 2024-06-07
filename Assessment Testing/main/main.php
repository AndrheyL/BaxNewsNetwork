<?php
//Starts a session
session_start();
if (!isset($_SESSION["loggedin"])) {
 header("Location: login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Headlines</title>
</head>
<body>
    <!--Plays a video running in the background -->
    <video autoplay muted loop>
        <source src="imgvid\globeloop.mp4" type="video/mp4">
    </video>

    <!--Navbar created for Logo, Logout, Search bar and the button -->
    <nav>
        <div class="navbar obj-width">
            <img src="imgvid/logo2.png" alt="BAX NEWS NETWORK">

            <div class="logout">
                <li><a href="logout.php">Log Out</a></li>
            </div>

            <div class="searchbar">
                <input type="text" placeholder="Search News" id="searchInput">
                <button id="searchButton">ENTER</button>
            </div>
        </div>
    </nav>

    <!-- Creates a section 
         API will be directed here -->
    <main id="newsContainer" class="obj-width">
        <!--<div class="newsCard">
            <img src="https://placehold.co/600x400" alt="">
            <h2> This is the Title</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus odio placeat animi et ea aliquid neque explicabo. Excepturi, eius quas?</p>
        </div>
        <div class="newsCard">
            <img src="https://placehold.co/600x400" alt="">
            <h2> This is the Title</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus odio placeat animi et ea aliquid neque explicabo. Excepturi, eius quas?</p>
        </div>
        <div class="newsCard">
            <img src="https://placehold.co/600x400" alt="">
            <h2> This is the Title</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus odio placeat animi et ea aliquid neque explicabo. Excepturi, eius quas?</p>
        </div>
        <div class="newsCard">
            <img src="https://placehold.co/600x400" alt="">
            <h2> This is the Title</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus odio placeat animi et ea aliquid neque explicabo. Excepturi, eius quas?</p>
        </div>
        <div class="newsCard">
            <img src="https://placehold.co/600x400" alt="">
            <h2> This is the Title</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus odio placeat animi et ea aliquid neque explicabo. Excepturi, eius quas?</p>
        </div>-->

    </main>

    <script src="script.js"></script>

</body>
</html>