<?php
session_start();
if(isset($_SESSION['id'])) {
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/batiment.css">
  <?php
  try
{
    $bdd = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'root', 'Foudre46');
}

catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

$name = $bdd->query('SELECT name FROM batiments WHERE name="'.$_POST['batiment'].'"');

$name3 = $bdd->query('SELECT '.$_POST['batiment'].'.value,'.$_POST['batiment'].'.name,'.$_POST['batiment'].'.time FROM '.$_POST['batiment'].',membre WHERE '.$_POST['batiment'].'.id'.$_POST['batiment'].'=membre.'.$_POST['batiment'].' AND membre.id="'.$_SESSION['id'].'"');

while ($namef = $name->fetch())
{ ?>
<title><?php echo $namef['name']; ?></title>
<?php
}
?>
</head>
<body>
<nav>
  <span>Joueur : <?= $_SESSION['pseudo'] ?></span>
  <?php try
{
    $bdd = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'root', 'Foudre46');
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
<div class="row nav">
  <div class="nav flex-column nav-pills" id="v-pills-tab" aria-orientation="vertical">
  <a class="nav-link active" href="batiments.php" aria-selected="true">Batiments</a>
  <a class="nav-link" href="recherches.php" aria-selected="true">Recherches</a>
  <a class="nav-link" href="jardin.php" aria-selected="true">Jardin</a>
  <a class="nav-link" href="locomotions.php" aria-selected="true">Locomotions</a>
</div>
</div>
<?php

while ($ok = $name3->fetch())
{ 
  ?></br></br></br></br></br>
<center><h2><?php echo $ok['name']; ?></h2>
<p><?php echo $ok['name']; ?> coûte actuellement <?php echo $ok['value']; ?> d'argent.</p>
<p><?php echo $ok['name']; ?> prend <?php echo $ok['time']; ?> secondes pour se construire.</p>

<form align="center" method="post" action="ajaxbatiment.php">
  <button class="btn btn-md btn-success" value="<?php echo $ok['name']; ?>" type="submit" name="batiment" id="achat">Acheter</button>
  </form></center>
  <?php
}
?>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php }else {header('location:login.php');} ?>