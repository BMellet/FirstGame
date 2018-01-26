<?php
session_start();
if(isset($_SESSION['id'])) {
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>Vos lumens ont bien été crédités.</p>
	<a href="batiments.php"><button>Retourner à mon compte</button></a>
</body>
</html>
<?php }else {header('location:login.php');} ?>