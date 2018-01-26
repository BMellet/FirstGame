<?php
session_start();
$bdd = new PDO('mysql:host=185.98.131.90;dbname=prepr941845;charset=utf8', 'prepr941845', 'ekiqimbcdv');
if(isset($_POST['submit'])) {
if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = htmlspecialchars($_POST['password']);
	$passwordhash = hash ('sha256', $password);
	$recovery_user = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND password = ?");
	$recovery_user->execute(array($pseudo,$passwordhash));
	if($recovery_user->rowcount() == 1) {
		$info_user = $recovery_user->fetch();
		$_SESSION['id'] = $info_user['id'];
		$_SESSION['pseudo'] = $info_user['pseudo'];
		$_SESSION['email'] = $info_user['email'];
		$_SESSION['password'] = $info_user['password'];
		$_SESSION['argent'] = $info_user['argent'];
		$_SESSION['lumens'] = $info_user['lumens'];
		$_SESSION['categorie'] = $info_user['categorie'];
		header('location:batiments.php');
			}
			else {header('location:/errors/nocompte.html'); }
} else {
	header('location:/errors/champs.html');
}
} else {
	header('location:/errors/formulairenonenvoye.html');
}

?>