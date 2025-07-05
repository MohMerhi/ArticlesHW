<?php 
require("../connection/connection.php");


$query = 'INSERT INTO `Articles` VALUES 
(1,"SE Book","Mohammad Merhi","This book helps developers in becoming software engineers"),
("This Book Loves You","Pewdiepie"," 250 illustrated pages with parodied inspirational quotes,[3] and was described as being a coffee table\u2013styled book.[4] The book was made available in numerous languages other than English, including Swedish,[5] French[6] and German.),
("The Valley Of Fear","Conan Doyle","The Valley of Fear is the fourth and final Sherlock Holmes novel by British writer Arthur Conan Doyle. It is loosely based on the Molly Maguires and Pinkerton agent James McParland. The story was first published in the Strand Magazine between September 1914 and May 1915."),
("Crime and Punishment","Fyodor Dostoevsky","AI Overview\r\n\"Crime and Punishment\" is a novel by Fyodor Dostoevsky, first published in 1866, that explores the psychological torment of Rodion Raskolnikov, a former student in St. Petersburg, after he murders an elderly pawnbroker. The novel delves into themes of morality, free will, and redemption, examining Raskolnikov\'s rationalization of the crime based on his belief in the \"extraordinary man\" theory and his subsequent struggle with guilt and paranoia"),
("Don Quixote","Miguel de Cervantes","Don Quixote,[a][b] the full title being The Ingenious Gentleman Don Quixote of La Mancha,[c] is a Spanish novel by Miguel de Cervantes. Originally published in two parts in 1605 and 1615, the novel is considered a founding work of Western literature and is often said to be the first modern novel.[2][3] The novel has been labelled by many well-known authors as the \"best novel of all time\"[d] and the \"best and most central work in world literature\".[5][4] Don Quixote is also one of the most-translated books in the world[6] and one of the best-selling novels of all time.")';

$execute = $mysqli->prepare($query);
$execute->execute();


