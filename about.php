<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"&& isset($_POST['logout'])) {
    session_destroy();
    header ('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="aboutStyle.css">
</head>


<body>
    <div class="top"></div>
<nav class="hotbar">
    <ul class="hotbar-list">
        <li class="list"><a id="home-button" href="index.php">Home</a></li>
        <li class="list"><a href="about.php">About</a></li>
        <?php
        if(isset($_SESSION["AdminLVL"]) && $_SESSION["AdminLVL"] >= 1) {
        echo '<a href="admin.php"><li class="list">Admin</li></a>';
        } 
        ?>
        <?php
        if(isset($_SESSION['username'])) {
        echo "<li class='list'><a href='login.php'>Logged in</a></li>";
        echo "<li class='list'><form method='POST'><button type='submit' name='logout'>logout</button></form></li>";
        } else {
           echo "<li class='list'><a  href='login.php'>Login</a></li>";
        }
       
        ?> 
    </ul>
</nav>

<main>


<h1 class="header1About">
    Welcome
    </h1>


</main>



</body>
</html>
