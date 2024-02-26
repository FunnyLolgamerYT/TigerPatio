<?php 

session_start();
if($_SESSION["AdminLVL"] <= 0) {
    header("Location:index.php");

}
include 'db_connection.php';
$conn = OpenCon("TigerPatio");

//Check the connection
if($conn->connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Check if event has been added
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $members = $_POST["members"];
    $genre = $_POST["genre"];   

    //insert into sql database
    $sql = "INSERT INTO bands (bandName, bandMembers, bandGenre) VALUES ('$name', '$members', '$genre')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <h1>Admin</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Band Name: <input type="text" name ="name"> <br>
    Band Members: <input type="number" name="members"> <br>
    Band genre: <input type="text" name="genre"> <br>
    <input type="submit" value="Submit">
</form>
<a href="index.php">terug</a>
</body>
</html>