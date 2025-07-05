<?php 
require("../connection/connection.php");


$query = "CREATE Table Categorization(
            article_id INT(11),
            category_id INT(11),
            foreign key (article_id) references articles(id),
            foreign key (category_id) references categories(id),
            primary key (article_id, category_id))";
            

$execute = $mysqli->prepare($query);
$execute->execute();

