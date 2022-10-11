<?php session_start(); ?>
<?php if (isset($_SESSION["email"])){ 
	
	}else{
		header("Location: regisztracio.php");
	}		?>
<?php
$filename = "szavazatok.txt";
$file = fopen($filename, "r");
$szavazatok = [];
while (($line = fgets($file)) !== false) {
  $szavazatok[] = unserialize($line);
}
fclose($file);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fórum</title>
	<meta charset="UTF-8"/>
	<meta name="description" content="Too Cool For School"/>
	<meta name="author" content ="Márta Petra és Pálfi Zsófia"/>
	<meta name="keywords" content="webtervezes, school, projekt"/>
	<link rel="stylesheet" href="stylemenu.css">
</head>
<style>
	.forum {
		background-color: #E5DFBD;
		color: black;
		font-weight: bold;
	}
	
	.felvitel {
		width:100%;
		font-size:large;
	}
	
	.ok {
		width:80%;
	}
	
	#szoveg {
		width:90%;
	}
	
	#tema {
		width:100%;
		background-color: #E5DFBD;
		font-weight:bold;
	}
	
	#letrehozotttema {
		background-color: black;
		color: white;
		text-align: center;
	}
	
	.lap {
		width:100%;
		border: 1px solid black;
		border-collapse: collapse;
		text-align: left;
	}
	
	.lap td, .lap th{
		width:25%;
		padding: 10px;
		border: 1px solid black;
		border-collapse: collapse;
	}
	
	.lap th {
		 background-color: black;
		 color: white;
	}
	
	table.lap tr:nth-child(even) {
		background-color: #E5DFBD;
	}
	table.lap tr:nth-child(odd) {
		background-color: white;
	}
	
	
</style>
<body>
	<h1> Too Cool For School</h1>
	<nav>
		<ul class="fo">
			<li class="projekt">
				<a href="#" class="projektek">Projekt</a>
				<div class="projekt-content">
					<a href="angol.php">Angol</a>
					<a href="informatika.php">Informatika</a>
				</div>
			</li>
			<li><a class="forum" href="forum.php">Fórum</a></li>
			<li><a href="szabalyok.php">Szabályok</a></li>
			<li><a href="rolunk.php">Rólunk és az oldalról</a></li>
			<li style="float:right"><a class="regisztracio" href="regisztracio.php">Regisztráció</a></li>
		</ul>
	</nav>
	<br>
	<table>
	<tr>
	<td id="oldalsav">
	<div class="main">
	<h2> Bejelentkezés </h2>
	<?php if (isset($_SESSION["email"])){ ?>
		<?php echo "<p>Bejelentkezve mint " . $_SESSION["email"] . "</p>"; ?>
		<form action="logout.php" method="POST">
			<input type="submit" value="Kijelentkezés"/>
		</form>
	<?php } else {  ?>
		<form action="forum.php" target="_blank" method="POST">
			<label>E-mail*: </label>
			<input type="email" name="email" value="" placeholder="E-mail"/><br/><br/>
		
			<label for="pwid">Jelszó*: </label>
			<input type="password" name="pw" id="pwid" value="" required /> <br/>
			<input type="hidden" name="rejtett" value="igen" /> <br/>
		
			<button type="submit" name="login">Bejelentkezés</button>
	</form>
	</div>
	</td>
			<?php } ?>
			<?php
			$email="";
			$password="";
			
			$accounts = [];
			$file=fopen("users.txt", "r");
			
			while (($line = fgets($file)) !== false) {
				$accounts[] = unserialize($line);
			}
			fclose($file);
			
			if (isset($_POST["login"])) {
				$email=$_POST["email"];
				$password=$_POST["pw"];
				
			$msg="Sikertelen belépés!";
			
			foreach($accounts as $account) {
				if ($email === $account["email"] && $password === $account ["pw"]) {
					$_SESSION["email"] = $email;
					$msg="Sikeres belépés!";
				} 
			}
			echo $msg . "<br>";
		}
	?>
	<td rowspan="2" id="tartalom">
	
	<div class="main">
		<h2> Fórum </h2>
	
	<form action="forum.php" target="_blank" method="POST">
	<table class="lap">
		<thead>
		<tr>
			<th></th>
			<th id="header11" >Téma neve: </th>
			<th id="header12">Szerző: </th> 
			<th id="header13">Választás:</th>
		</tr>
		</thead>
		
		<tbody>
		<tr>
			<th rowspan="3" id="letrehozotttema" id="header">Létrehozandó témák</th>
			<td headers="header,header11">3D nyomtatás (informatika)</td>
			<td headers="header,header11">Daisy</td>
			<td headers="header,header11"><input type="radio" id="3d" name="temak" value="3d"></td>
		</tr>
		<tr>
			<td headers="header,header12">Family (angol)</td>
			<td headers="header,header12">CouchPotato</td>
			<td headers="header,header12"><input type="radio" id="family" name="temak" value="family"></td>
		</tr>
		<tr>
			<td headers="header,header13">Responsive Web Design (vegyes)</td>
			<td headers="header,header13">Cica</td>
			<td headers="header,header13"><input type="radio" id="RWD" name="temak" value="RWD"></td>
		</tr>
		
		</tbody>
	</table>
		</br>
		<button type="submit" name="szavazas">A bejelölt témára szavazok</button>
		</form>

	<?php
		$temak="";
		$email="";
			
		if (isset($_POST["szavazas"])) {
			$temak = $_POST["temak"];
			$email = $_SESSION["email"];
		foreach ($szavazatok as $szavazat) {
			if ($szavazat["email"] === $email) {
				die ("Ön már szavazott!");
			}
		}
			$szavazatok[]=["email" => $email, "temak" => $temak];
			$filename = "szavazatok.txt";
			$file = fopen($filename, "w");
			foreach ($szavazatok as $szavazat) {
				fwrite($file, serialize($szavazat)."\n");
			}
			fclose($file);
			echo "Sikeres szavazás! <br>";
		}
	?>
	</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="kereses" class="main">
		<h3><label>Visszaszámlálás nyári szünetig:</label></h3>
		<?php
		$d1=strtotime("June 15");
		$d2=ceil(($d1-time())/60/60/24);
		echo "Még " . $d2 ." nap van vissza a nyári szünet kezdetéig.";
		?>
		</div>
	</td>
	</tr>
	</table>
	
<aside>
      
</aside>
<article>
	
</article>
<footer>
     
</footer>	
</body>
</html>