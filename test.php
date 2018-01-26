<?php
session_start();
if(isset($_SESSION['id'])) {
	?>

	<p>Joueur : <?php echo $_SESSION['pseudo'] ?></p>

	<?php
	try
{
    $bdd = new PDO('mysql:host=185.98.131.90;dbname=prepr941845;charset=utf8', 'prepr941845', 'ekiqimbcdv');
}

catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM membre WHERE id="'.$_SESSION['id'].'"');

while ($donnees = $reponse->fetch())

{ ?>
  <center><p>Vous avez actuellement : <?php echo $donnees['argent']; ?> d'argent</p></center>
  <center><p>Vous avez actuellement : <?php echo $donnees['lumens']; ?> Lumens</p></center>
<?php
}
$reponse->closeCursor();

}else {header('location:login.php');}
?>