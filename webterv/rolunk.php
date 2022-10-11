<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rólunk és az oldalról</title>
	<meta charset="UTF-8"/>
	<meta name="description" content="Too Cool For School"/>
	<meta name="author" content ="Márta Petra és Pálfi Zsófia"/>
	<meta name="keywords" content="webtervezes, school, projekt"/>
	<link rel="stylesheet" href="stylemenu.css">
</head>

<style>
	.rolunk {
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
			<li><a class="rolunk" href="rolunk.php">Rólunk és az oldalról</a></li>
			<li style="float:right"><a class="regisztracio" href="regisztracio.php">Regisztráció</a></li>
		</ul>
	</nav>
	<br>
	<table>
	<tr>
	<td id="oldalsav">
	<div class="main">
	<aside>
	<h2> Bejelentkezés </h2>
	<?php if (isset($_SESSION["email"])){ ?>
		<?php echo "<p>Bejelentkezve mint " . $_SESSION["email"] . "</p>"; ?>
		<form action="logout.php" method="POST">
			<input type="submit" value="Kijelentkezés"/>
		</form>
	<?php } else {  ?>
		<form action="rolunk.php" target="_blank" method="POST">
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
	<article>
		<h2>Rólunk</h2>
		<h3>Motivációnk</h3>
			<p>Ami a mi és az oldal létrejöttének motivációját illeti, a sztori a szokásos. Egy iskolai projekthez készült el ez az oldal, azzal a kéréssel,
			hogy a "jóízlés határain belül bármiben" gondolkodhatunk. Így arra gondoltunk, hogy miért ne lehetne a projektünk témája a... projekttémák!
			Igen, jól olvastad és nem, nem ez volt a legelső ötletünk.</p>
			<p>Tehát elhoztuk ide, formába öntöttük ezt az ötletet, hogy te, kedves Olvasó, véletlenül se kerülj olyan helyzetbe, mint mi, amikor egy csésze 
				forró kávé felett ültünk egy kávézóban, mélyen egymás szemébe néztünk és tanakodtunk - más szóval abba, hogy fogalmad sincs, mihez kezdj magaddal, mikor kiadnak neked egy
				ilyen iskolai feladatot.</p>
				
			<p>Mi szépen kivágtuk magunkat ebből - most pedig Rajtad a sor!</p>
		<h3>Szerzők - azaz Mi</h3>
			<p>Két egyetemista lány vagyunk, akik Szegeden a programtervező informatikus képzés igáját nyögik és egy szebb jövőről álmodoznak
			közben.  <img id="kep" src="img/szte.jpg" alt="egyetem" title="Szegedi Tudományegyetem"> Webtervezés órára készül ez a feladat és közben jobban megismertük általa magunkat és a gyakorlatvezetőnk betegeskedési
			szokásait. Bízz bennünk, tudjuk, hogy milyen az, mikor a tanuló szinte teljesen magára van utalva olyan szempontból,
			hogy ideális projekttémát és még inkább a feljebbvalójának tetszőt válasszon. Viszont a motivációd, amiért idetévedtél, teljesen mindegy az oldal szempontjából.
			Ami nem mindegy az az, hogy Mi itt vagyunk és segítünk.</p>
			<p>A lényeg teljes mértékben az, hogy tudjuk, mit csinálunk. Mindent, amit itt összegyűjtünk - ötleteket, forrásokat és praktikákat
			egy ppt elkészítéséhez - már valaki használta és kipróbálta. (Valószínűleg magas pontszámmal is értékelték ezeket a próbálkozásokat.)
			Semmit nem teszünk ki, ami esetleg ellenőrizetlen forrásból származik, ha pedig mégis, Rád számítunk, hogy önmagad is utánanézz
			az adott téma validitásának.</p>
			<p>Ha felmerül kérdés az adott projekttémával kapcsolatban, más oldalunkat meglátogatótól is lehetséges a segítségkérés a közös <a href="forum.html">fórum</a>
			használatával. Ha közvetlenül velünk szeretnél kontaktust keresni valami technikai ügy/oldallal való probléma miatt, a <a href="szabalyok.html">szabályok</a> közt megtalálod
			az elérhetőségeinket. Vigyázat! A témához nem kapcsolódó üzeneteket szankcionálni fogjuk.</p>
		<h3>Az oldalról</h3>
			<p>A jelszavaink a hitelesség, a precizitás és a kemény munka. Ezek viszont a Te részedről is kellenek egy jó
			előadáshoz/esszéhez/úgy általánosságban projekthez. Ne hidd, hogy mi mindent megcsinálunk, mi csupán segítünk abban, hogy 
			ne vessz el teljesen az internetnek nevezett kaotikus információhalmazban.</p>
			<p>Az oldallal kapcsolatos hibajelentéseket az előző pontban említett módon lehet megtenni, ahogy az épító jellegő kritikákat és javaslatokat is így
			kérjük tudomásunkra hozni. Ezeket szívesen vesszük és buzdítjuk is rá a hallgatóságot, hogy tegye meg.</p>
	</article>
	</div>
	</td>
	</tr>
	<aside>
	<tr>
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
	</aside>
	</table>
</body>
</html>