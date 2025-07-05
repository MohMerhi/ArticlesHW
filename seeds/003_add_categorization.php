<?php 
require("../connection/connection.php");


$query = "INSERT INTO `categorization`  VALUES (1,1), (1,2), (2,3), (2,4), (4,4), (4,5);";

$execute = $mysqli->prepare($query);
$execute->execute();


