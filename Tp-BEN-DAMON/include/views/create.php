<?php 	
	include('connection.php');

	if (!$_POST['submit']) {
		echo 'entrer les champs requis!';
		header('location: inscription.php');

	}
	else{
		mysql_query("INSERT INTO users(`id`,`username`,`firstname`,`lastname`) VALUES(NULL,'$username','$firstname','$lastname')") or die(mysql_error());

		echo "USER has been added!";
		header('Loaction: inscription.php');
	}
 ?>