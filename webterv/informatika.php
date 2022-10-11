<?php session_start(); ?>
<?php
$filen = "comments_inf.txt";
$f = fopen($filen, "r");
$comments = [];
while (($line = fgets($f)) !== false) {
  $comments[] = unserialize($line);
} 
fclose($f); 

/*	$comments = [
		[
			"name" => "MHost",
			"text" => "Remek összefoglaló!"
		],

		[
			"name" => "ChairX",
			"text" => "Nagyon jó vázlat, köszönjük!"
		]
	];
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Informatika</title>
	<meta charset="UTF-8"/>
	<meta name="description" content="Too Cool For School"/>
	<meta name="author" content ="Márta Petra és Pálfi Zsófia"/>
	<meta name="keywords" content="webtervezes, school, projekt"/>
	<link rel="stylesheet" href="stylemenu.css">
</head>
<style>
	.projektek {
		background-color: #E5DFBD;
		color: black;
		font-weight: bold;
	}
	ul li dt {
		text-decoration: underline;
	}
	span{
		color: red;
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
			<li style="float:right"><a class="bejelentkezes" href="regisztracio.php">Regisztráció</a></li>
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
					$_SESSION["name"] = $account["name"];
					$msg="Sikeres belépés!";
				} 
			}
			echo $msg . "<br>";
		}
	?>
	<td rowspan="3" id="tartalom">
	<div class="main">
		<h2>Vírus</h2>
		<p>Számítógépes vírusnak tekinthető minden olyan program, melyet készítője ártó szándékkal hozott létre.
			A vírusok az alábbi három tulajdonsággal bírnak:
			<ul>
			<li> végrehajthatóak, vagyis működőképesek </li><br/>
			<li> önmagukat másolva képesek terjedni </li><br/>
			<li> képesek hozzáépülni más végrehajtható állományokhoz </li><br/>
			</ul> </p>
		<h3>Közös jellemzőik</h3>
			<ul>
			<li> A vírust tartalmazó, fertőzött program futásakor a vírusprogram is lefut. Ekkor reprodukálja, megsokszorozza önmagát, 
				és minden új példánya egy további fájlt fertőzhet meg.</li>
			<li>Valamilyen közvetlenül vagy közvetve futtatható bináris programfájlhoz vagy makróhoz, -forráskódú szkripthez csatolja magát, 
			miközben módosítja annak kódját úgy, hogy futtatásakor az ő saját kódja is lefusson.</li>
			<li>A vírusprogram futásakor valamilyen feltétel igaz vagy hamis voltát is figyeli. Ennek logikai értékétől függően 
			aktivizálhatja az objektív rutinját. Azt a programrészt, amely törölheti a lemezes állományokat, formázhatja a merevlemezeket, 
			vagy csak játékos üzeneteket, reklámszövegeket jelenít meg a képernyőn.</p></li>
			</ul>
			
		<p>Vírust kaphatunk megbízhatatlan forrásból származó pendrive-okról, email-ekhez csatolva, crack-elt programok letöltésével, 
		vagy akár észrevétlenül az interneten szörfölve is.</p>
		
		<h3>Vírus „tünetei”:</h3>
			<ul>
			<li> Fájlok mérete indokolatlanul növekszik </li><br/>
			<li> Megnövekedik indokolatlanul a háttértárakról felhasznált terület </li><br/>
			<li> Idegen állományok jönnek létre a háttértárakon </li><br/>
			<li> A programok működésében zavarok jelentkezhetnek </li><br/>
			<li> A hálózatkezelés lelassul, hibát jelez (pl. lefagyások jelentkeznek) </li><br/>
			<li> A perifériák rendellenesen működnek </li><br/>
			<li> A gép feldolgozási sebessége csökken, a memóriák túlterheltek </li><br/>
			</ul></p>
			
		<h3>Fajtái:</h3>
			<ul><dl>
			<li><dt> Fájl-vírus:</dt> <dd>Ez a legrégebbi vírusforma, mely futtatható állományokhoz épül hozzá. A vírussal fertőzött program jelenléte a 
			háttértáron önmagában még nem vezet károkozáshoz. A vírus kódja csak akkor tud lefutni (aktivizálódni), ha futtatjuk a vírus által 
			fertőzött programot. Ekkor a gazdaprogrammal együtt a vírus is a memóriába töltődik, s ott is marad a számítógép kikapcsolásáig. Ez 
			idő alatt a háttérben végzi nem éppen áldásos tevékenységét: hozzáépül az elindított programokhoz (fertőz), és eközben vagy egy bizonyos 
			idő elteltével, illetve dátum elérkezésekor végrehajtja a belé kódolt destruktív feladatot. </dd></li>
			<li><dt> BOOT-vírus: </dt> <dd>A mágneslemez BOOT szektorába írja be magát, így ahányszor a lemez használatban van, annyiszor fertőz. Különösen veszélyes 
			típus az ún. MBR vírus, amely a rendszerlemez BOOT szektorát támadja meg, így induláskor beíródik a memóriába. Innentől kezdve egyetlen állomány 
			sincs biztonságban, amely a memóriába kerül. </dd></li>
			<li><dt> Makróvírus: </dt> <dd>A makrók megjelenésével dokumentumaink is potenciális vírushordozóvá váltak. A makróvírus a dokumentumainkhoz épülve, annak 
			megnyitásakor fut le kártékony kódja. A vírusok ezen válfaja az internetes adatforgalom fellendülésével indult rohamos terjedésnek. </dd></li>
			<li><dt> Trójai program: </dt> <dd>A mondabeli trójai falóhoz hasonlóan valójában mást kap a felhasználó, mint amit a program „ígér”. Ez a vírus a jól működő 
			program álcája mögé bújik: hasznos programnak látszik, esetleg valamely ismert program preparált változata. Nem sokszorosítja magát, inkább 
			időzített bombaként viselkedik: egy darabig jól ellát valamilyen feladatot, aztán egyszer csak nekilát, és végzetes károkat okoz. Némely trójai 
			programok email-ek mellékleteként érkeznek: a levél szerint biztonsági frissítések, valójában viszont olyan vírusok, amelyek megpróbálják leállítani a 
			víruskereső és tűzfalprogramokat. </dd></li>
			<li><dt> Féreg: </dt> <dd>Általában a felhasználók közreműködése nélkül terjed, és teljes másolatokat terjeszt magáról a hálózaton át. A férgek felemészthetik a memóriát 
			és a sávszélességet, ami miatt a számítógép a továbbiakban nem tud válaszolni. A férgek legnagyobb veszélye az a képességük, hogy nagy számban képesek magukat 
			sokszorozni: képesek például elküldeni magukat az e-mail címjegyzékben szereplő összes címre, és a címzettek számítógépein szintén megteszik ugyanezt, 
			dominóhatást hozva így létre. </dd></li>
			<li><dt> Kémprogramok (Spyware): </dt> <dd>Céljuk adatokat gyűjteni személyekről vagy szervezetekről azok tudta nélkül a számítógép-hálózatokon. Az információszerzés célja 
			lehet békésebb – például reklámanyagok eljuttatása a kikémlelt címekre – de ellophatják számlaszámainkat, jelszavainkat vagy más személyes adatainkat rosszindulatú 
			akciók céljából is. A többi vírusfajtához hasonlóan más programokhoz kapcsolódva tehet rájuk szert a nem eléggé óvatos felhasználó. </p></dd></li>
			</dl></ul></p>
			
		<h3>Néhány „hírhedt” vírus:</h3>
		
		<p>Az <span> ILoveYou </span>minden idők "legsikeresebb" vírusa. Négy óra alatt körbejárja a világot. A Visual Basic Scriptben írt csatolmány megnyitásával a script a 
		Microsoft Outlook címlistája szereplő összes címzettnek továbbította a férget. </p>
		<p>A <span>Happy99 </span>az első emailben terjedő vírus volt, amely új évi üdvözlet és látványos tűzijáték mellett fertőzte végig a fél világot. <p>
		<p>Az első gyermekeket célzó vírus a <span>Pikachu</span> volt. A futtatható állományt tartalmazó féreg, a pikachupokemon.exe csatolmány módosította az autoexec.bat 
		állományt, melyben elhelyezett parancsok a windows és a windows\system könyvtárak törlését indította el a következő rendszerinduláskor. </p>
		
		
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
	<tr>
	<td>
		<form action="informatika.php" target="_blank" method="POST">
		<div id="hozzaszolas" class="main">
		<h3>Hozzászólások:</h3>
		 <table>
		 <?php if (!isset($_SESSION["email"])) { ?>
				<?php echo "Jelentkezzen be a hozzászóláshoz!";
			} else {?>
			<?php foreach ($comments as $comment) { ?>
				<div class="komment">
					<h3><?php echo $comment["name"]; ?></h3>
					<div class="szoveg"><?php echo $comment["text"]; ?></div>
				</div>
			<?php } ?>
		</table>
			<br/>
			<form action="informatika.php" target="_blank" method="POST">
			<input type="text" name="text" value="" placeholder="Írj ide..."> <br/> <br/>  
			<button type="submit" name="comment">Küldés</button> 
			</form>
			</div>
			<?php } ?>
<?php 
	$name = "";
	$text = "";
	
if (isset($_POST["comment"])) {
	
	$name = $_SESSION["name"];
	$text=$_POST["text"];
	
	$comments[]=["name" => $name, "text" => $text];
	$filen = "comments_inf.txt";
	$f = fopen($filen, "w");
	foreach($comments as $comment) {
		fwrite($f, serialize($comment)."\n");
	}
	fclose($f);
}

	?>
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