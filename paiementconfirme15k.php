<?php
session_start();
if(isset($_SESSION['id'])) {

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'root', 'Foudre46');
}

catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

  $dacc = $bdd->query('SELECT * FROM membre WHERE id="'.$_SESSION['id'].'"');
while ($ok = $dacc->fetch())
{
  $true = $bdd->query('SELECT * FROM base WHERE name="Batiment"');
  while ($salut = $true->fetch())
{
  $prout = ($ok['lumens'])+15000;
}
}
  if ($prout >= 0){
    $hubert = $bdd->prepare('UPDATE `membre` SET `lumens` = '.$prout.' WHERE `membre`.`id` = "'.$_SESSION['id'].'";');
  $hubert->execute(array(':lumens' => $prout));
  $hubert->closeCursor();
  } else {

  header('Location: impossible.php');
  exit();
}
    header('Location: lumensok.php');
  exit();

}else {header('location:login.php');}
?>