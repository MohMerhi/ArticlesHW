<?php 
require("../connection/connection.php");


$query = "CREATE Table Categories(
            id INT(11) primary key,
            name varchar(255) not null)";

$execute = $mysqli->prepare($query);
$execute->execute();


//INSERT INTO `categories` (`id`, `name`) VALUES (NULL, 'Educational'), (NULL, 'Entertainment'), (NULL, 'Technology'), (NULL, 'Research'), (NULL, 'News');