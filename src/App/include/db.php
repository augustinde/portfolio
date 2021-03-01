<?php


	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}


?>