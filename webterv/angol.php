<?php session_start(); ?>
<?php
$filen = "comments.txt";
$f = fopen($filen, "r");
$comments = [];
while (($line = fgets($f)) !== false) {
  $comments[] = unserialize($line);
} 
fclose($f); 

/*	$comments = [
		[
			"name" => "MHost",
			"text" => "Nagyon hasznosnak találtam a cikket, igyekszem átültetni gyakorlatba is az itt tanultakat."
		],

		[
			"name" => "cica",
			"text" => "A stalker-es téma nem is olyan rossz :3"
		],

		[
			"name" => "ChairX",
			"text" => "Szuper ötlet, bár álmomban sem lenne olyan mázlim, hogy ilyen könnyű témát húzzak! Csináljatok valami extrát. "
		]
	];
	*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Angol</title>
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
	
	#piros {
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
		<form action="angol.php" target="_blank" method="POST">
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
		<h2> Angol </h2>
		<p>Legelőször is kedves Idelátogató, szeretnélek ellátni pár tippel ebből a tantárgyból. Mivel az angolt választottad, úgy gondolom, számíthatok figyelmedre
		e pár sor erejéig maguk a témák előtt. Szeretném megragadni az alkalmat, hogy ebben a kis bevezetőben magukról a prezentációk mikéntjéről meséljek neked, 
		illetve ellássalak pár hasznos tanáccsal is az útra, ami előtted áll.</p>
		<p>Prezentálni valamit szóban, ráadásul nem az anyanyelveden nehezebb feladat, mint hinnéd. Ezekben a tippekben elsősorban a ppt-kel támogatott
		szóbeli prezentálásról lesz szó, mivel ezeket várják el leggyakrabban nyelvórákon projektkészítés alatt. Viszont párat ki fogok emelni, ami nemcsak
		az ilyen típusú prezentálásnál lesz hasznos, hanem úgy általában is.</p> <br/>
		<h3><span id="piros">Pár hasznos tipp egy prezentációhoz:</span></h3>
		<ul class="tippek">
			<li>A választásod olyan témára essen, ami érdekes mind neked, mind a közönségednek.</li>
			<p><br>Úgy hiszem, ez egyértelmű. Ha olyan témát prezentálsz, ami nem hoz lázba, a közönséged megérzi ezt és ez jelentősen levesz az előadás élvezeti értékéből. 
			Ha viszont a közönséged unja a témát és nem vagy tapasztalt előadó, aki meg tudná szerettetni a mondandóját másokkal, akkor azt tanácsolom, találj olyat, amit te is 
			és a közönséged is szívesen hallana.</p>
			<li>A téma legyen számodra ismerős.</li>
			<p><br>Ez szerintem természetes. A témát tudni kell elkezdeni és befejezni. Magyarul, ha nem tudsz semmit például a kvantumszámítógépekről, azt sem tudod, 
			eszik-e vagy isszák, akkor hagyd a csudába azt a témát. Ezért érdemes tájékozottnak lenni mindig az órán felmerülő témában. Ha mégsem tudsz semmit a 
			választott témában, konzultálj egy olyannal, akinek van róla valami fogalma.</p>
			<li>Gyakorold az előadásod az éles helyzet előtt, még akkor is, ha spontán beszédről van szó!</li>
			<p><br>Ez egy nagyon fontos pont. Velem is vlt már olyan, hogy azt gondoltam, "ugyanmár, tudok angolul, csak tudok beszélni errő a témáról
			folyékonyan, el fognak ájulni az angoltudásomtól", aztán meg jól besültem, mert nem volt meg a szükséges szókincsem a feladathoz. Te ne ess ebbe a hibába!
			Ha más nem, legalább egyszer beszélj a témáról angolul, akár olyannak is, aki nem tud angolul, mert legalább így hallod magad és te tudni fogod, ha nem jó.
			Ez a tanács nemcsak az idegen nyelveknél, hanem az összes többi tantárgynál is jó szolgálatot tehet!</p>
			<li>A PowerPoint csak segédeszköz, nem a jegyzetfüzeted!</li>
			<p><br>Ne használj a prezentációdban teljes mondatokat, csupán kulcsszavakat, amikről eszedbe jut a mondanivalód. A ppt egy demonstrációs eszköz,
			nem azt kell felolvasni. Ha sok szöveget raksz rá, eltereli a figyelmet a mondandódról, illetve a tanárnak is kevesebb kedve lesz jó jegyet
			adni a te mondandódra, mivel el volt foglalva azzal, hogy a szöveget olvassa a ppt-den.</p>
			<li>6x6 szabály: 6 szó egy sorban, 6 sor egy dián</li>
			<p><br>Ez egy furcsa szabálynak tűnik, de működik. Ez segít, hogy tudd, mennyi "elég" egy diára, ami így nem fog zsúfoltnak tűnni. Ez egy maximum kvóta,
			ha ennél kevesebb van eg dián, az nem baj, de ha ennél több, az már zsúfoltnak, nehézkesnek tűnhet.</p>
			<li>A ppt stílusa legyen egyszerű, olvasható, visszafogott.</li>
			<p><br>Ez a szabály a közönségnek kedvez. Ne égesd ki a szemüket citromsárga betűkkel, ne bombázd az érzékeiket csillámló hátterekkel és könyörögve kérlek, 
			ne legyenek hanggal ellátott animációk. A videó az más, de mindenkit meglepne egy hirtelen jövő hang a rég nem használt hangfalakból, amik a tanári
			asztalon csücsülnek háborítatlanul. Használj kontrasztszíneket, hogy műved olvasható legyen! Homokszínű háttérrel a fehér betű nem olvasható! A prezentáció legyen letisztult, igényes, ne dobáld tele árnyékokkal, ne tegyél be ízléstelen fotót és mindig törekedj
			olyan képeket betenni, amik nem homályosak. A ppt méretgazdálkodásával kapcsolatban - ha jpg-ket keresel, sokkal kisebb méretű ppt-t tudsz létrehozni. Vigyázz!
			A Google vegyesen kínálja a png-ket és a jpg-ket. Válogass okosan!</p>
			<li>Tarts szemkontaktust a közönségeddel!</li>
			<p><br>Nem, ne bámuld őket. Csak mikor beszélsz, ne háttal legyél a közönségnek, mert a ppt-det olvasod épp. Szépen arccal feléjük fordulva
			beszélj tisztán és érthetően. Ha ideges vagy, nyugodtan állj meg, vegyél egy mély levegőt, szedd össze a gondolataidat, úgy folytasd. Ismerős
			közönség előtt egy-egy szimpatikusabb emberrel tarthatod a szemkontaktust, ismeretlen tömeggel szemben pedig nézz egy leheletnyivel az emberek feje fölé
			és nyugodtan járjon a szemed. Beszéd közben ne járkálj a kivetített ppt előtt, testbeszéded legyen "csendes", ne zavard a közönségedet a 
			koncentrálásban!</p>
		</ul>
		<p>Most, hogy ezeken átrágtad magad, rátérhetünk egy konkrét témára. Kérlek, válassz egy témát:</p>
		<p>Kész témák: </p>
		<ol>
			<li>Where did you spend your holiday?</li>
		</ol>
		<br>
		<h2>Where did you spend your holiday?</h2>
		<p>Ez egy nagyon alap projekttéma, ami lefedi az utazás (~Travel), az időtöltés (~Free-time activities), és az alap szókincs hármasát. Ha ezt akarod projekttémának
		választani, jó szemed van. Ez az a tipikus téma, hogy ha nem voltál sehol sem, akkor is ki tudod húzni magadat a csávából. Kétfelé osztom a témát: voltál-e nyaralni vagy sem.</p>
		<h3>A) Voltam nyaralni a lakhelyemhez képest máshol</h3>
		<p>Ez a jobbik opció. A fent felsorolt tippek figyelembevételével kell megtervezned a prezentációdat. Legyen benne sok kép, tájkép vagy akár csoportos
		kép is. (Ha nem publikus helyen voltál - tipikusan 18+-os hely - mellőzzük a csoportképeket.) Az előadás hosszúságát a tanár határozza meg, ez általában 5-10 perc
		szokott lenni. Ehhez mérten legyen 12-15 dia a projektben. Egy dián maximum három kép legyen, emlékezz, nem a személyes albumodat nézik, hanem a te prezentálásodat
		hallgatják.</p>
		<p>Ehhez kapcsolódóan csakis a megemlített/elmesélt történetekhez illő képeket válogass össze. Például: mesélsz a Malibun <img id="kep" src="img/malibu.jpg" alt="tengerpart" title="Malibu-i tengerpart"> töltött strandolásodról (mázlista),
		akkor ne figyeljen be az otthoni sötét szobában készült szelfi talpig felöltözve. Fő tanulság: maradj szigorúan a témánál!</p>
		<p>Prezentáció felépítése:</p>
		<p>Bevezető: Ezt a kérdéssort kövesd: Ki? Mikor? Hol? Miért? - a miért az értelemszerűen opcionális. A bevezetőben mond el ezekre a választ.
		<span id="piros">Például:</span> <i>Hi, my name is Whatever and I would like to talk about my holiday. I was in Malibu with my parents and my brother. The last two weeks of summer were
		the absolute paradise for me! Let me tell you, why.</i></p>
		<p>Tárgyalás: Itt jöhet a mit csináltunk, kivel és miket láttál (amit várhatóan fotóval tudsz bizonyítani). Vigyázz! Ne próbálj egy egész regényt elmondani
		párbeszédekkel és melodramatikus jelenetekkel, mert fel fogsz sülni. Shakespeare tudott ilyet csinálni, te nem tudsz, törődj bele. Kerüld a <i>reported speech</i> nevezetű
		helyzeteket - ezek konkrétan az <i>azt mondta, hogy...</i> jelenetek. Senki nem mondott semmit. Párbeszédeket ne nagyon szőj bele, mert csak belekavarodsz.
		<span id="piros">Például:</span> <i>In this picture (showing it with a gesture) you can see the beautiful seashore where we were. We played beachball and we swam all morning. At noon,
		we ate seafood. I didn't like it very much, but my brother just swallowed it whole, he couldn't wait! My parents just laughed at him because he was so sick afterwards!
		I didn't risk any of the possible consequences and later the afternoon I just had a cheeseburger. Better safe than sorry!</i></p>
		<p>Lezárás: Minden jónak vége szakad, a sztorizgatást befejezed és szépen elmondod, mennyire hiányozni fog a nyári meleg és reméled, hogy mihamarabb
		visszamehettek Malibura. Megköszönöd a figyelmet, megválaszolod a felmerülő kérdéseket, majd fürdőzöl a tapsban, ami körülvesz, hiszen csodás prezentációt tudtál magad mögött.
		<span id="piros">Például: </span><i>... and this was my holiday in the beautiful Malibu. These two weeks were incredible and I can't wait to go back there next summer! Thank you for your
		attention, everyone! If there's any question, feel free to ask!</i></p>
		<br>
		Lényegében   a dolgok töve ennyi lenne ebben az esetben. Most nézzük a másik esetet.
		<h3>B) Nem voltam nyaralni</h3> 
		<p>Ez határozottan kínosabb eset, mint az előző. Itt az előző <img id="kep" src="img/dark man.jfif" alt="ferfi" title="Stalker"> pontokhoz hasonlóan fogunk haladni, csak ahelyett, hogy a delfinekkel úszásról
		mesélnél, elmeséled, miket csináltál kikapcsolódás gyanánt.</p>
		<p>Prezentáció felépítése:</p>
		<p>Kicsit sajnálkozó bevezető: Elmondod, hogy sajnos most nem voltál nyaralni, a személyes okokat nem kell említeni, viszont azt megemlítheted,
		hogy ennek ellenére milyen érdekes dolgokat csináltál. <span id="piros">Például:</span> <i>Unfortunately, I wasn't anywhere special, but I found a hobby during the
		break. This hobby is stalking girls at their homes! It's a very sporty hobby, because there's a lot of running in it, but I'm a real adrenaline junkie, so I enjoy it.</i></p>
		<p>Erről a hobbiról mesélsz tovább, illetve hogy mit tanultál belőle, mit javasolsz annak, aki el szeretné kezdeni ezt űzni. <span id="piros">Például:</span><i>...I learned from these
		experiences. I learned that you should cover your face, especially when you watch your target. I learned that girls can run very fast. And that you should buy a high quality camera,
		so you don't have to get closer to the window.</i></p>
		<p>Majd a befejezés jön. Hogy majd reméled, legközelebb elmész nyaralni vagy felszedsz egy új hobbit! De vigyázz, ha kérdeznek, ne felelj túl részletesen, nem
		akarod ezt tovább húzni, mint amennyire szükséges.<span id="piros"> Például: </span><i>...I hope that in the next year I can go to a different location for my holiday,
		but I think this was my most exciting summer. Maybe next year I will get a new hobby - running, or something like that. I really get used to it this summer.</i></p>
		<br>
		<p>Remélem, hasznos volt ez a kis útmutató! Sikeres prezentációt kívánok!</p>
	
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
		<form action="angol.php" target="_blank" method="POST">
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
			<form action="angol.php" target="_blank" method="POST">
			<input type="text" name="text" value="" placeholder="Írj ide..."> <br/> <br/>  
			<button type="submit" name="comment">Küldés</button> 
			</form>
			<?php }?>
<?php 
	$name = "";
	$text = "";
	
if (isset($_POST["comment"])) {
	$name = $_SESSION["name"];
	$text=$_POST["text"];
	
	$comments[]=["name" => $name, "text" => $text];
	$filen = "comments.txt";
	$f = fopen($filen, "w");
	foreach($comments as $comment) {
		fwrite($f, serialize($comment)."\n");
	}
	fclose($f);
}

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