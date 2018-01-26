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
  $true = $bdd->query('SELECT '.$_POST['batiment'].'.value,'.$_POST['batiment'].'.name FROM '.$_POST['batiment'].',membre WHERE '.$_POST['batiment'].'.id'.$_POST['batiment'].'=membre.'.$_POST['batiment'].' AND membre.id="'.$_SESSION['id'].'"');
  while ($salut = $true->fetch())
{
  $prout = ($ok['argent'])-$salut['value'];
  $up = $ok[$_POST['batiment']]+1;
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
  $test = $bdd->prepare('UPDATE `membre` SET `'.$_POST['batiment'].'` = '.$up.' WHERE `membre`.`id` = "'.$_SESSION['id'].'";');
$test->execute(array(':'.$_POST['batiment'].'' => $up));
$test->closeCursor();
} else {

header('Location: impossible.php');
exit();
}
    header('Location: batiments.php');
  exit();

}else {header('location:login.php');}?>