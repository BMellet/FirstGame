<?php
session_start();
if(isset($_SESSION['id'])) {

try
{
    $bdd = new PDO('mysql:host=185.98.131.90;dbname=prepr941845;charset=utf8', 'prepr941845', 'ekiqimbcdv');
}

catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

  $dacc = $bdd->query('SELECT * FROM membre WHERE id="'.$_SESSION['id'].'"');
while ($ok = $dacc->fetch())
{
  $true = $bdd->query('SELECT '.$_POST['recherche'].'.value,'.$_POST['recherche'].'.name FROM '.$_POST['recherche'].',membre WHERE '.$_POST['recherche'].'.id'.$_POST['recherche'].'=membre.'.$_POST['recherche'].' AND membre.id="'.$_SESSION['id'].'"');
  while ($salut = $true->fetch())
{
  $prout = ($ok['argent'])-$salut['value'];
  $up = $ok[$_POST['recherche']]+1;
}
}
  if ($prout >= 0){
    $hubert = $bdd->prepare('UPDATE `membre` SET `argent` = '.$prout.' WHERE `membre`.`id` = "'.$_SESSION['id'].'";');
  $hubert->execute(array(':argent' => $prout));
  $hubert->closeCursor();
  } else {

  header('Location: impossible.php');
  exit();
}
if ($up >= 0){
  $test = $bdd->prepare('UPDATE `membre` SET `'.$_POST['recherche'].'` = '.$up.' WHERE `membre`.`id` = "'.$_SESSION['id'].'";');
$test->execute(array(':'.$_POST['recherche'].'' => $up));
$test->closeCursor();
} else {

header('Location: impossible.php');
exit();
}
    header('Location: recherches.php');
  exit();

}else {header('location:login.php');}?>