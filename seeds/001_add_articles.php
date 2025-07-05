<?php 
require("../connection/connection.php");


$query = 'INSERT INTO Articles (name, author, description) VALUES 
("SE Book", "Mohammad Merhi", "This book helps developers in becoming software engineers"),
("This Book Loves You", "Pewdiepie", "250 illustrated pages with parodied inspirational quotes, and was described as being a coffee table–styled book. The book was made available in numerous languages other than English, including Swedish, French and German."),
("The Valley Of Fear", "Conan Doyle", "The Valley of Fear is the fourth and final Sherlock Holmes novel by British writer Arthur Conan Doyle. It is loosely based on the Molly Maguires and Pinkerton agent James McParland. The story was first published in the Strand Magazine between September 1914 and May 1915."),
("Crime and Punishment", "Fyodor Dostoevsky", "Crime and Punishment is a novel by Fyodor Dostoevsky, first published in 1866, that explores the psychological torment of Rodion Raskolnikov, a former student in St. Petersburg, after he murders an elderly pawnbroker. The novel delves into themes of morality, free will, and redemption."),
("Don Quixote", "Miguel de Cervantes", "Don Quixote is a Spanish novel by Miguel de Cervantes. Originally published in two parts in 1605 and 1615, it is considered a founding work of Western literature and is often said to be the first modern novel. It is one of the most-translated and best-selling novels of all time.")';
$execute = $mysqli->prepare($query);
$execute->execute();


