<?php
session_start();
if(isset($_SESSION['id'])) {
	?>

	<!DOCTYPE html>
	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Guide ARKmon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?= $_SESSION['pseudo'] ?></title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/batiments.css">
  </head>
  <nav>
  <span>Joueur : <?= $_SESSION['pseudo'] ?></span>
  <?php try
{
    $bdd = new PDO('mysql:host=185.98.131.90;dbname=prepr941845;charset=utf8', 'prepr941845', 'ekiqimbcdv');
}

catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

$afficher = $bdd->query('SELECT * FROM membre WHERE id="'.$_SESSION['id'].'"');

while ($affiche = $afficher->fetch())

{ 

?>
<span>Catégorie : <?= $_SESSION['categorie'] ?></span>
<span>Argent : <?= $affiche['argent'] ?></span>
<span>Lumens : <?= $affiche['lumens'] ?></span>

<form method="post" action="logout.php">
  <button class="btn btn-sm btn-danger" type="submit" name="logout" id="logout">Logout</button>
  </form>

 <?php
  } ?>
</nav>
  <body>
    <div class="row nav">
  <div class="nav flex-column nav-pills" id="v-pills-tab" aria-orientation="vertical">
  <a class="nav-link active" href="batiments.php" aria-selected="true">Batiments</a>
  <a class="nav-link" href="recherches.php" aria-selected="true">Recherches</a>
  <a class="nav-link" href="jardin.php" aria-selected="true">Jardin</a>
  <a class="nav-link" href="locomotions.php" aria-selected="true">Locomotions</a>
</div>
</div>
  <center><h1>Vos Batiments</h1></center>
  <?php
  $afficher->closeCursor();

$base = $bdd->query('SELECT * FROM batiment');
$temple = $bdd->query('SELECT Temple.name,Temple.idTemple FROM Temple,membre WHERE membre.Temple=Temple.idTemple AND membre.id="'.$_SESSION['id'].'"');
$hotel = $bdd->query('SELECT Hotel.name,Hotel.idHotel FROM Hotel,membre WHERE membre.Hotel=Hotel.idHotel AND membre.id="'.$_SESSION['id'].'"');
$entrepot = $bdd->query('SELECT Entrepot.name,Entrepot.idEntrepot FROM Entrepot,membre WHERE membre.Entrepot=Entrepot.idEntrepot AND membre.id="'.$_SESSION['id'].'"');
?>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <?php 
    while ($test = $temple->fetch())

{
  ?>

<center><p>Niveau du <?php echo $test['name']; ?> actuel : <?php echo $test['idTemple']; ?></p>

<form method="post" action="/batiment.php">
 <input class="btn btn-md btn-primary" type="submit" id="achat" value="<?php echo $test['name']; ?>" name="batiment">
 <a tabindex="0" class="btn btn-md btn-secondary" role="button" data-toggle="popover" data-trigger="focus" title="<?php echo $test['name']; ?>" data-content="Augmente ...">Infos</a>
</form>
</center>
<?php
} ?>
    </div>
    <div class="col-sm">
    <?php
    while ($test = $hotel->fetch())

{
  ?>

<center><p>Niveau de l'<?php echo $test['name']; ?> actuel : <?php echo $test['idHotel']; ?></p>

<form method="post" action="/batiment.php">
 <input class="btn btn-md btn-primary" type="submit" id="achat" value="<?php echo $test['name']; ?>" name="batiment">
 <a tabindex="0" class="btn btn-md btn-secondary" role="button" data-toggle="popover" data-trigger="focus" title="<?php echo $test['name']; ?>" data-content="Augmente ...">Infos</a>
 </form>
 </center>
<?php
} ?>
    </div>
    <div class="col-sm">
    <?php
    while ($test = $entrepot->fetch())

{
  ?>

<center><p>Niveau de l'<?php echo $test['name']; ?> actuel : <?php echo $test['idEntrepot']; ?></p>

<form method="post" action="/batiment.php">
 <input class="btn btn-md btn-primary" type="submit" id="achat" value="<?php echo $test['name']; ?>" name="batiment">
 <a tabindex="0" class="btn btn-md btn-secondary" role="button" data-toggle="popover" data-trigger="focus" title="<?php echo $test['name']; ?>" data-content="Augmente ...">Infos</a>
 </form>
 </center>
<?php
} ?>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.9/dist/umd/popper.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="dist/js/profile.js"></script>
</body>
<?php } else {header('location:login.php');} ?>
</html>