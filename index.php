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
    <link rel="stylesheet" href="style.css?v=0">
</head>


<body>
<nav class="HotBar">
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Admin</a></li>
        <?php
        if(isset($_SESSION['username'])) {
        echo "<li><a href='login.php'>Logged in</a></li>";
        echo "<li><form method='POST'><button type='submit' name='logout'>logout</button></form></li>";
        } else {
           echo "<li><a href='login.php'>Login</a></li>";
        }
       
        ?> 
    </ul>
</nav>

<main>
<h1 >Upcoming events</h1>

<div class="Event">
    <div>This is an event</div>
    <div>This is the date</div>
</div>

<p> HEHEHE</p>

<p>Tets</p>
</main>



</body>
</html>
