<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Szabályok</title>
	<meta charset="UTF-8"/>
	<meta name="description" content="Too Cool For School"/>
	<meta name="author" content ="Márta Petra és Pálfi Zsófia"/>
	<meta name="keywords" content="webtervezes, school, projekt"/>
	<link rel="stylesheet" href="stylemenu.css">
</head>

<style>
	.szabalyok {
		background-color: #E5DFBD;
		color: black;
		font-weight: bold;
	}
	
	@media print {
        img {
          display: none;
        }
        h1 {
          page-break-before: always;
        }
        h1, h2, h3, h4, h5 {
          page-break-after: avoid;
        }
        table, figure {
          page-break-inside: avoid;
        }
        div {
          width: 600 pt;
        }
		#oldalsav {
			display: none;
		}
		.main {
			border: 0px;
		}
      }
    @page :left {
        margin: 0.5cm;
    @bottom-left {
          content: "Oldal " counter(page) " / " counter(pages);
        }
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
			<li><a class="szabalyok" href="szabalyok.php">Szabályok</a></li>
			<li><a href="rolunk.php">Rólunk és az oldalról</a></li>
			<li style="float:right"><a class="regisztracio" href="regisztracio.php">Regisztráció</a></li>
		</ul>
	</nav>
	<article>
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
		<form action="szabalyok.php" target="_blank" method="POST">
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
		<h2>Szabályok</h2>
		<h3>Első lépések az oldalon</h3>
		<p>Mint láthatod, ez az oldal egy elég egyszerű koncepciót követ, hogy ne vessz el a felesleges menüpontok erdejében. Logikusan
		végiggoldolva magad is beláthatod, hogy az adott menüpontok nevei önmagukért beszélnek. De azért ragaszkodjunk ahhoz, hogy lefektessünk
		pár alapszabályt.</p>
		<p>A Projektek menüpont tantárgyakat mutat neked, amiket kiválasztva találhatsz az adott tárgyhoz kapcsolódó projekteket.</p>
		<p>A Fórum menüpont alatt található az általunk működtetett társalgási lehetőségek, amikhez írási jogosultságot Regisztráció menüpont útmutatása szerint
		nyerhetsz. Más szóval regisztrálnod kell, hogy a fórumhoz érdemben hozzászólhass. 
		Viszont kívülállóként is olvashatóak az írott kérdések és információk.</p>
		<p>Ez és a Rólunk és az oldalról menüpont segít neked eligazodni a funkciók közt, illetve útmutatást adnak a megfelelő használatukhoz. Arra kérünk,
		tartsd be ezeket a szabályokat, hogy a webhely látogatóinak és nekünk minél könnyebb legyen eligazodni, rendben tartani és minél hatékonyabban kezelni az összes tárolt információt.</p>
		<h3>Általános szabályok:</h3>
		<ol>
		<li> A fórumozás célja az adott tárgyban történő vélemények megvitatása. Az eszmecsere, vagy a vita alapja lehet egyéni nézőpontok megosztása, 
		vagy a véleménykülönbségek civilizált módon történő kezelése. A fórumon lévő témák megvitatása szabadon folyhat, 
		azonban nem tűrünk semmilyen gorombaságot, személyeskedést vagy céltalan semmitmondó hangulatkeltést.</li>
		<li> Kérjük ne indíts céltalan témákat, és ne küldj egy-két szavas semmitmondó hozzászólásokat illetve ismétlődő üzeneteket.</li>
		<li> Egy téma megkezdése, illetve kérdés feltevése után kérjük várj egy ideig, mielőtt válasz hiányában újra hozzászólna a témához.</li>
		<li> Témától jelentősen eltérő vagy a közösségünket sértő üzenetek ugyancsak tiltottak.</li>
		<li> Illegális tevékenységek megvitatása tilos, beleértve bármilyen törvénybe ütköző tevékenységet.</li>
		<li> Minden felhasználónak egy fórum tagságija lehet, többszörös regisztráció nem megengedett.</li>
		<li> Fenntartjuk magunknak a jogot a sértő, nem megengedett hozzászólások figyelmeztetés nélküli eltávolítására.</li>
		<li> Fenntartjuk magunknak a jogot, hogy a fórumot szándékosan megzavarni kívánó tagokat kitiltsuk.</p></li>
		</ol>
		<h3>Spammek</h3>
		<p>Reklámozás, "spammelés" illetve rosszindulatú üzenetek tilosak, beleértve a fórum email és privát üzenetek rendszerét is.</p>
		<p>Tilos a fórumon reklámozás céljából témát nyitni vagy hozzászólni. 
		A fórum email és privát üzenet rendszerén való reklámozás, és az aláírásokban szereplő reklámok is tilosak.</p>
		<h3>Biztonság</h3>
		<p>Kérjük felhasználói neved és jelszavad ne osszd meg senkivel, a te adataidért nem vállalunk felelősséget, ha azokat rajtunk kívül másnak is odaadod. 
		Lehetőleg jelszavad 90 naponta változtasd meg. Jelszó ne legyen túl rövid, használjon kisbetűket, nagybetűket, számokat vegyesen. 
		A jelszavad soha ne legyen a te nevedből, felhasználói nevedből, vagy egyéb személyes adataidból könnyen kikövetkeztethető.</p>
	</div>
	</td>
	</tr>
	<tr>
	<td>
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
	</article>

<aside>
      
</aside>
<article>
	
</article>
<footer>
     
</footer>	
</body>
</html>