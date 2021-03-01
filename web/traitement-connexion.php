<?php
    session_start();
    require "db.php";

    // $user = "AugustinD";
    // $password = "SfNn7Xfr5@Gv";

    if(!empty($_POST["inputPassword"])){

        if(!empty($_POST["inputUser"])){

            $password = htmlspecialchars($_POST["inputPassword"]);
            $user = htmlspecialchars($_POST["inputUser"]);
            $checkBox = $_POST["checkConnect"];

            if(isset($checkBox) && $checkBox == "ok"){
                echo "ok";
            }
        
            $req = $bdd->prepare("SELECT * FROM admin WHERE user = ?");
            $req->execute(array($user));
        
            $donnees = $req->fetch(); 
        
            if(password_verify($password, $donnees["password"])){
                
                $_SESSION["user"] = $user;

                if(isset($checkBox) && $checkBox == "ok"){
                    $token = md5($_SESSION["user"]);
                    setcookie('tokenAuth', $token, time()+60*60*24*365, null, null, false, true);

                        $req1 = $bdd->prepare('UPDATE admin SET tokenAuth = :token WHERE user = :user');
                        $req1->execute(array(

                            'token' => $token,
                            'user' => $user
                        ));
                }

                header('Location: dashboard.php');

            }else{
                header('Location: connexion.php?error=wrongPassword');
            }

        }else{
            header('Location: connexion.php?error=emptyPassword');

        }

    }else{
        header('Location: connexion.php?error=emptyUser');

    }





?>  