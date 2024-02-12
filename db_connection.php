<?php
function OpenCon($dbname)
{
    $dbhost = "localhost:3307";
    $dbuser = "EssentialBee";
    $dbpass = "S9CMSQDo6KRRB&kD";


    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: %s\n". $conn -> error);
    return $conn;
}