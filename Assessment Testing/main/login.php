<?php
//Creating a session for this .php file to load
session_start();
if (isset($_SESSION["loggedin"])) {
    header("Location: main.php");
}
//Data will be saved once inputting Data
$servername= "localhost";
$username = "root";
$password="";
$database="bnndb";
$conn = mysqli_connect($servername, $username, $password, $database);

//Shows if any error has occured
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

//Function that checks if data is already in the Database
function login($conn, $email, $password){
    $sql = "SELECT * FROM user WHERE email='".$email."' AND password='".$password."'";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();
    return $row;
}

//Checks the database if User inputted data that matches
//If yes, it directs you to the Main Page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = login($conn, $email, $password);
    if (is_array($login) && count ($login) > 0){
        $_SESSION["loggedin"] = "true";
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $login["username"];
        header('Location: main.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
    <!-- Background Video -->
    <video autoplay muted loop>
        <source src="imgvid\mainlog.mp4" type="video/mp4">
    </video>

    <!-- LOGO -->
    <div class="logoreg">
        <img src="imgvid/logo.png" alt="BAX NEWS NETWORK">
    </div>

    <!-- Sign Up Box -->
    <div class="wrapper">
        <h1>Login</h1>
        
        <!-- Database will be monitored here-->

        <form action="login.php" method="post">
            <input type="text" placeholder="Email" id="" required name="email">
            <input type="password" placeholder="Password" id="" required name="password">

            <a>
                <button>LOGIN</button>
            </a>
        </form>

        <div class="member">
            Not Registered? <a href="./signup.html"> Sign Up Here</a>
        </div>
    </div>
</body>
</html>