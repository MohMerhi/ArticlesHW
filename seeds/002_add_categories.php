<?php 
require("../connection/connection.php");


$query = "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, 'Educational'), (NULL, 'Entertainment'), (NULL, 'Technology'), (NULL, 'Research'), (NULL, 'News');";

$execute = $mysqli->prepare($query);
$execute->execute();


