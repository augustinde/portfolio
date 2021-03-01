<?php 

	include "db.php";
	session_start();

	$user = $_SESSION["user"];
	$token = "";

    $req1 = $bdd->prepare('UPDATE admin SET tokenAuth = :token WHERE user = :user');
    $req1->execute(array(

        'token' => $token,
        'user' => $user
    ));



	session_destroy();
	if($_COOKIE["tokenAuth"]){
		setcookie("tokenAuth", NULL, -1);
		unset($_COOKIE["tokenAuth"]);
	}
	header("Location: connexion.php");

?>