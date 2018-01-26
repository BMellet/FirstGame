<?php
session_start();
if(isset($_SESSION['id'])) {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Impossible</title>
</head>
<body>
	<h1>Désolé mais vous n'avez pas assez d'argent pour acheter cela.</h1>
</body>
</html>
<?php
}else {header('location:login.php');}
?>