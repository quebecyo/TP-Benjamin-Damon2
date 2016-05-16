<?php 	
	require('dbpackages.php');

	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$pass =$_POST['pass'];
	$ville = $_POST['ville'];
	$province = $_POST['province'];
	$postal = $_POST['postal'];
	$adresse = $_POST['adresse'];

	if (!$_POST['submit']) {
		echo 'entrer les champs requis!';

	}
	else{

		INSERT INTO `user`(`id`, `firstname`, `lastname`, `username`, `password`, `email`, `adresse`, `city`, `province`, `postalcode`) VALUES (NULL,"$firstname","$lastname","$username","$pass","$email","$adresse","$ville","$province","$postal");

		echo "USER has been added!";
		header ("../index.php")
	}
 ?>