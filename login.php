<?php

session_start();

include "db_connection.php";
$conn = OpenCon("tigerpatio");

if ($conn -> connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["uname"]) && isset($_POST['password'])) {
        function validate($data)
        {
            $data = trim($data);

            $data = stripslashes($data);

            return htmlspecialchars($data);
        }

        $uname = validate($_POST['uname']);

        $pass = $_POST['password'];


        if(empty($uname)) {
            header("Location: login.php?error=Username is required" );
            exit();
        } else if(empty($pass)) {
            header("Location: login.php?error=Password is required");
            exit();
        } else {
            $pass = crypt( $_POST['password'], "st");

            $sql = "SELECT * FROM login WHERE username='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if($row['username'] === $uname && $row['password'] === $pass) {

                    $_SESSION ['username'] = $row['username'];

                    $_SESSION['UserID'] = $row['UserID'];

                    $_SESSION['AdminLVL'] = $row['AdminLVL'];

                    header ("Location: index.php");

                } else {
                    header ("Location: login.php?error=Incorrect username or password.");

                }
            } else {
                header("Location: login.php?error=Incorrect username or password.");

            }
            exit();
        }
    
    } else {
        header("Location: login.php");

        exit();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) {?>
            <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>

        <label>User name</label>

        <label>
            <input type="text"  name="uname" placeholder="User Name">
        </label><br>
        <label>Password</label>
        <label>
            <input type="password"  name="password" placeholder="Password">
        </label><br>
        <button type="submit" name="login">Login</button>

    </form>
</body>
</html>
