<?php  

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare("INSERT INTO todo (libelle, description, priorite) VALUES (:libelle, :description, :priorite)");
	$req->execute(array(
		":libelle"=>$_POST["libelle"],
		":description"=>$_POST["description"],
		":priorite"=>$_POST["priorite"]
	));
	header('Location: index.php');

?>
