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

//Checks the database if the same email has existed
//If registered, redirect you back to the page
function checkIfExists($conn, $email) {
    $sql = "SELECT * FROM user WHERE email='".$email."'";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();
    return (is_array($row) && count($row) > 0);
}

//If user successfully adds information, saves the data to the database
//Directs you to the login page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password'] === $_POST['repassword']) {
    $email = $_POST['email'];
    $user = $_POST['username'];
    $password = $_POST['password'];

    if (!checkIfExists($conn, $email)){
        $sql = "INSERT INTO user (email, username, password)
            VALUES ('$email', '$user', '$password')";

        $conn->query($sql);
        $conn->close();
        header('Location: login.html');
    }
}
?>


<!--HTML File -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
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
        <h1>Sign Up</h1>

        <!-- Database will be monitored and collected here-->
        <form action="signup.php" method="post">
            <input type="text" placeholder="User Name" id="" required name="username">
            <input type="text" placeholder="Email" id="" required name="email">
            <input type="password" placeholder="Password" id="" required name="password">
            <input type="password" placeholder="Re-Enter Password" id="" required name="repassword">
            <!--Checks if email has already been registered in the Database -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password'] != $_POST['repassword']) {
                echo "<p>Passwords don't match!</p>";
                }
            if(checkIfExists($conn, $_POST['email'])) {
                echo "<p>This Email has been Registered Already!</p>";
            }
            ?>
            <a>
                <button>SIGN UP</button>
            </a>
        </form>

        <!--Link that redirects you to the login page -->
        <div class="member">
            Registered? <a href="./login.html"> Login Here</a>
        </div>

    </div>

</body>
</html>
