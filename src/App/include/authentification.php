<?php 

session_start();
include "db.php";

$url = $_SERVER["REQUEST_URI"];
// if(!empty($_SESSION["pseudo"])){//si ya la session
// 	header('Location: dashboard.php');
// }else if(!empty($_COOKIE["tokenAuth"])){ //si y'a pas de session mais un cookie

// 	$token = $_COOKIE["tokenAuth"];

// 	$reqRecup = $bdd->prepare('SELECT * FROM utilisateurs WHERE tokenAuth = :token');

// 	$reqRecup->execute(array(

// 		'token' => $token

// 	));

// 	while($donnees = $reqRecup->fetch()){
// 		$_SESSION["id"] = $donnees["id"];

// 		$_SESSION["email"] = $donnees["email"];

// 		$_SESSION["pseudo"] = $donnees["pseudo"];

// 		$_SESSION["avatar"] = $donnees["avatar"];

// 	}

// 	header('Location: dashboard.php');
// 	echo $url;
// }

//si il est connecter mais que y'a pas de cookie
if(empty($_COOKIE["tokenAuth"]) && !empty($_SESSION["user"])){//1 session 0 cookie


}

if(!empty($_COOKIE["tokenAuth"]) && empty($_SESSION["user"])){//0 session 1 cookie

    //connexion et set session
    $token = $_COOKIE["tokenAuth"];

    $reqRecup = $bdd->prepare('SELECT * FROM admin WHERE tokenAuth = :token');

    $reqRecup->execute(array(

        'token' => $token

    ));

    while($donnees = $reqRecup->fetch()){

        $_SESSION["user"] = $donnees["user"];

    }

    header('Location: '.$url);

}

if(!empty($_COOKIE["tokenAuth"]) && !empty($_SESSION["user"])){//1 session 1 cookie

    //connexion et set session
    $token = $_COOKIE["tokenAuth"];

    $reqRecup = $bdd->prepare('SELECT * FROM admin WHERE tokenAuth = :token');

    $reqRecup->execute(array(

        'token' => $token

    ));

    while($donnees = $reqRecup->fetch()){

        $_SESSION["user"] = $donnees["user"];

    }


}
if(empty($_SESSION["user"]) && empty($_COOKIE["tokenAuth"])){//0 session 0 cookie

    //go page connexion
    header('Location: connexion.php');
    //si il n'est pas co et que y'a un cookie
}
// if(!empty($_SESSION["pseudo"]) && empty($_COOKIE["tokenAuth"])){//1 session 1 cookie
// 	echo "salut";
// }
// //si y'a les deux
// if(!empty($_SESSION["pseudo"]) && !empty($_COOKIE["tokenAuth"])){//1 session 1 cookie

// // 	//connexion
// // 	header('Location: '.$url);
// 	echo "C OK";
// }

?>