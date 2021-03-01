<?php 
	error_reporting(E_ALL); 

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare("DELETE FROM todo WHERE id = :id");
	$req->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
	$req->execute();
	header('Location: index.php');

?>
