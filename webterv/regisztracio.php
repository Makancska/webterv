<?php
$filename = "users.txt";
$file = fopen($filename, "r");
$accounts = [];
while (($line = fgets($file)) !== false) {
  $accounts[] = unserialize($line);
}
fclose($file);


/*$accounts = [
		[ 
			"name" => "ChairX",
			"nem" => "ferfi",
			"date" => "2000-01-01",
			"email" => "chair@freemail.com",
			"pw" => "HoverOver",
			"hozzajarulas" => ["muszaj"],
			"hirlevel" => ["spam"],
		],

		[
			"name" => "Daisy",
			"nem" => "no",
			"date" => "1999-04-01",
			"email" => "daisycica@freemail.com",
			"pw" => "Cats4Life",
			"hozzajarulas" => ["muszaj"],
			"hirlevel" => ["spam"],
		]
	];
*/
?>
	
<!DOCTYPE html>
<html>

<head>
	<title>Regisztráció</title>
	<meta charset="UTF-8"/>
	<meta name="description" content="Too Cool For School"/>
	<meta name="author" content ="Márta Petra és Pálfi Zsófia"/>
	<meta name="keywords" content="webtervezes, school, projekt"/>
	<link rel="stylesheet" href="stylemenu.css">
</head>
<style>
	.regisztracio {
		background-color: #E5DFBD;
		color: black;
		font-weight: bold;
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
			<li><a href="forum.php">Fórum</a></li>
			<li><a href="szabalyok.php">Szabályok</a></li>
			<li><a href="rolunk.php">Rólunk és az oldalról</a></li>
			<li style="float:right"><a class="regisztracio" href="regisztracio.php">Regisztráció</a></li>
		</ul>
	</nav>
	<br>
	<div class="main">
	<h2>Regisztráció</h2>
	
	<form action="regisztracio.php" target="_blank" method="POST">
		<label for="name">Felhasználónév*:</label><br>
		<input type="text" id="name" name="name" value="" placeholder="Felhasználónév" required><br>
		
		<label for="nem">Nem:</label><br>
			<input type="radio" id="ferfi" name="nem" value="ferfi">
			<label for="ferfi">Férfi</label><br>
			<input type="radio" id="no" name="nem" value="no">
			<label for="no">Nő</label><br>
			<input type="radio" id="egyeb" name="nem" value="egyeb">
			<label for="egyeb">Egyéb</label></br></br>
			
		<label for="szuldat">Születési dátum*:</label>
		<input type="date" name="date" value="" min="1900-01-01"/><br/></br>
		
		<label>E-mail*: </label>
		<input type="email" name="email" value="" placeholder="E-mail" required /><br/><br/>
		
		<label for="pwid">Jelszó*: </label>
		<input type="password" name="pw" id="pwid" value="" required /> <br/>
		<input type="hidden" name="rejtett" value="igen" /> <br/>
		<label for="pwid">Jelszó megerősítése*: </label>
		<input type="password" name="pw2" id="pwid" value="" required /> <br/>
		<input type="hidden" name="rejtett" value="igen" /> <br/>
		
		<fieldset>
        <legend>Hozzájárulás</legend>
			<input type="checkbox" id="checkbox1" name="hozzajarulas" value="muszaj"/>
			<label for="checkbox1">*A megadott adataim kezeléséhez hozzájárulok, a <a href="szabalyok.html" target="_top">szabályzatban</a> foglaltakat elfogadom.</label><br/>
			
			<input type="checkbox" id="checkbox2" name="hirlevel" value="spam"/>
			<label for="checkbox2">Hírleveleket küldhetnek az e-mail címemre.</label><br/>
		</fieldset><br/>
		
		<button type="submit" name="signup">Regisztrálás</button>
		
	</form>
	
<?php 
	$name = "";
	$nem = "";
	$date = "";
	$email = "";
	$pw = "";
	$pw2 = "";
	$hozzajarulas = "";
	$hirlevel = "";
	
	$errors = [];
	
if (isset($_POST["signup"])) {
	
	$name = $_POST["name"];
	$nem = $_POST["nem"];
	$date = $_POST["date"];
	$email = $_POST["email"];
	$pw = $_POST["pw"];
	$pw2 = $_POST["pw2"];
	
	if (isset($_POST["hozzajarulas"])) {
		$hozzajarulas = $_POST["hozzajarulas"];
	}
	
	if (isset($_POST["hirlevel"])) {
		$hirlevel = $_POST["hirlevel"];
	}
	
	foreach ($accounts as $account) {
		if ($account["name"] === $name) {
			$errors[] = "A felhasználónév már foglalt!";
		}
	}
	
	foreach ($accounts as $account) {
		if ($account["email"] === $email) {
			$errors[] = "Ezen az e-mail címen működik már fiók!";
		}
	}
		
		if ($pw !== $pw2) {
			$errors[] = "A két jelszó nem egyezik!";
		}
		
		if (empty($name)) {
			$errors[] = "Felhasználónév megadása kötelező!";
		}
		
		if (empty($email)) {
			$errors[] = "Az e-mail cím megadása kötelező!";
		}
		
		if (empty($pw)) {
			$errors[] = "Jelszó megadása kötelező!";
		}
		
		if (empty($hozzajarulas)) {
			$errors[] = "A hozzájárulás kötelező a regisztrációhoz!";
		}
		
		if (count($errors)===0) {
			$accounts[]=["name" => $name, "nem" => $nem, "date" => $date, "email" => $email, "pw" => $pw, "hozzajarulas" => $hozzajarulas, "hirlevel" => $hirlevel];
			$filename = "users.txt";
			$file = fopen($filename, "w");
			foreach($accounts as $user) {
				fwrite($file, serialize($user)."\n");
			}
			fclose($file);
			die ("Sikeres regisztráció! <br>");
		} else {
			foreach ($errors as $error) {
				die ($error . "<br>");
			}
		}
}

	?>
</body>

</html>