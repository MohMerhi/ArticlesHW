<?php 
require("../connection/connection.php");


$query = "CREATE Table Categories(
            id INT(11) primary key,
            name varchar(255) not null)";

$execute = $mysqli->prepare($query);
$execute->execute();

