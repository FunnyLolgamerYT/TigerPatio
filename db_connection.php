<?php
function OpenCon($dbname)
{
    $dbhost = "lcoalhost:3307";
    $dbuser = "EssentialBee";
    $dbpass = "S9CMSQDo6KRRB&kD0";


    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    return $conn;
}