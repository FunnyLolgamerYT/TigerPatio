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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>


<body>
    <div class="top"></div>
<nav class="hotbar">
    <ul class="hotbar-list">
        <li class="list"><a id="home-button" href="index.php">Home</a></li>
        <li class="list"><a href="about.php">About</a></li>
        <?php
        if(isset($_SESSION["AdminLVL"]) && $_SESSION["AdminLVL"] >= 1) {
        echo '<li class="list"><a href="admin.php">Admin</li></a></li>';
        } 
        ?>
        <?php
        if(isset($_SESSION['username'])) {
        echo "<li class='list'><form  method='POST'><button id='BsButton' type='submit' name='logout'>logout</button></form></li>";
        } else {
           echo "<li class='list'><a  href='login.php'>Login</a></li>";
        }
       
        ?> 
    </ul>
</nav>

<main>

<h1 class="MainEventTitle" >Upcoming events</h1>
<?php 
include 'db_connection.php';
$conn = OpenCon("TigerPatio");

$sql = 'select EventTitle, DATE_FORMAT(EventDate, "%d-%m-%Y") as EventDate, EventDesc, EventGenre, EventBand, EventPrice     from events';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo  "<div class='Event'>
        <div class='EventTitle'>" . $row["EventTitle"] . "</div>
        <div class='EventDate'>" . $row["EventDate"] . "</div>
        <div class='EventGenre'>Genre: " . $row["EventGenre"] . "</div>
        <div class='EventBand'>Band: " . $row["EventBand"] . "</div>
        <div class='EventDesc'>" . $row["EventDesc"] . "</div>
        <div class='EventPrice'>€" . $row["EventPrice"] . "</div>
        <div class='EventBuy'>Buy</div>
        </div>";
    }

    } else {
        echo "No events coming up";
    }
?>
<div class="Event">
    <div class="EventTitle">PowerWolf concert</div>
    <div class="EventDate">Date: 01-01-2025</div>
    <div class="EventGenre">Genre: Rock</div>
    <div class="EventBand">Band: PowerWolf</div>
    <div class="EventDesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia totam iure, pariatur qui id quas numquam perspiciatis molestiae a earum expedita. Ipsam quibusdam mollitia id laboriosam aliquam? Ad, illum dolor? </div>
    <div class="EventPrice">€125,-</div>
    <div class="EventBuy">Buy</div>
</div>



</main>



</body>
</html>
