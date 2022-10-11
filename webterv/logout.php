<?php
 session_start(); 
 
 session_unset(); 
 session_destroy(); 
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="stylemenu.css">
</head>
<body>
<h2>
<?php
 echo "Sikeres kijelentkezés <br/>";
 echo "<a href='angol.php'>Vissza a főoldalra</a>";
?>
</h2>
</body>
</html>