<?php

$bdd = new PDO('mysql:host=185.98.131.90;dbname=prepr941845;charset=utf8', 'prepr941845', 'ekiqimbcdv');
if(isset($_POST['submit'])) {
	if(isset($_POST['id'],$_POST['email'],$_POST['email2'],$_POST['password'],$_POST['password2'])) {
		if(!empty($_POST['id']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
			$pseudo = htmlspecialchars($_POST['id']);
			$email = htmlspecialchars($_POST['email']);
			$email2 = htmlspecialchars($_POST['email2']);
			$password = htmlspecialchars($_POST['password']);
			$password2 = htmlspecialchars($_POST['password2']);
			$categorie = htmlspecialchars($_POST['categorie']);
			if(strlen($pseudo) < 20) {
				if(strlen($pseudo) > 4) {
					if($email == $email2) {
						if($password == $password2) {
							if(strlen($password) >= 8) {
								if(strlen($password) < 20) {
									$passwordhash = hash ('sha256', $password);
									$verify_user = $bdd->prepare('SELECT count(*) FROM membre WHERE pseudo= ?');
$sql = $bdd->prepare('INSERT INTO membre(pseudo, email, password, categorie) VALUES(:pseudo, :email, :password, :categorie)');
$verify = $bdd->prepare('SELECT count(*) FROM membre WHERE pseudo= ? AND password= ?');
$verify_user->execute(array($pseudo));
$result = $verify_user->fetch();
if ($result[0] == 0){
	$verify_user->closeCursor();
	$sql->execute(array(':pseudo' => $pseudo, ':password' => $passwordhash, ':email' => $email, ':categorie' => $categorie));
	$sql->closeCursor();
	$verify->execute(array($pseudo, $passwordhash));
	
	$data = $verify->fetch();
	
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $pseudo;
		
	header('location:/membre/bienvenue.html'); }
	else{header('location:test.html?error=write');
	
}}else{
	header('location:/errors/idpris.html');
		}
									
								}else{
									header('location:/errors/moins255.html');
								}
							}else{
								header('location:/errors/8plus.html');
							}
						}else{
							header('location:/errors/mdpdiff.html');
						}
						
					
				}	else {
					header('location:/errors/maildiff.html');
				}
			} else {
			header('location:/errors/pseudo4.html');
			}
			
		} else {
			header('location:/errors/pseudo20.html');
		}
		} else {
			header('location:/errors/champs.html');
		}

}
}
?>