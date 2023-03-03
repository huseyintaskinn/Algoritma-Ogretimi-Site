<?php 
session_start();

if (isset($_POST['sifre']) and $_POST['sifre'] == "materyal") {
	$_SESSION['yetki']=true;
}

$liste=array();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tavşan Kontrol</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/anasayfa.css">
</head>
<body>
	<nav>
		<a class="logo" href="../index.php">
			<p>PROBLEM ÇÖZME VE ALGORİTMA</p>
		</a>
		<div>
			<a class="buton" href="../index.php">Ana Sayfa</a>
			<a class="buton" href="../sunu.php">Ders Sunusu</a>
			<a class="buton" href="../cark.php">Algoritma Çarkı</a>
			<a class="buton" href="../siralama.php">Sıralama Oluştur</a>
			<a class="buton" href="index.php">Tavşan Oyunu</a>
		</div>
	</nav>

	<main class="anasayfa">
		<div id="ekran3" style="justify-content: space-around; flex-wrap: wrap; align-items: flex-start; padding: 50px; box-sizing: border-box;">
				<?php
					if (!isset($_SESSION['yetki']) and $_SESSION['yetki'] != true) {
				
				?>
					<form action="tavsankontrol.php" method="POST" style="align-self: center;">
						<label for="sifre" style="align-self: center;">Şifre</label>
						<input type="password" name="sifre" id="sifre">
						<input type="submit" name="git">
					</form>
				<?php

					}
					else{

				?>

				<?php
				try {
					$vt = new PDO("mysql:dbname=epiz_29271679_materyal; host=sql208.epizy.com; charset=utf8","epiz_29271679", "VfoOlVVrunKJ");
					$vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  } catch (PDOException $e) {
					echo $e->getMessage();
				  }

				  				  $sql ="select * from tavsan";
				  $ifade = $vt->prepare($sql);
				  $ifade->execute();

					while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
						$liste[]=array($kayit["ad"], $kayit["bir"], $kayit["iki"], $kayit["uc"], $kayit["dort"], $kayit["bes"], $kayit["alti"], $kayit["yedi"], $kayit["sekiz"], $kayit["dokuz"], $kayit["onn"]);
					}



					//Bağlantıyı yok edelim...
					$vt = null;

					for ($i=0; $i < count($liste); $i++) { 

						echo "<div style=\"margin: 30px; min-width:350px; background-color: white; padding: 20px; border-radius: 15px; box-sizing: border-box;\">";
						
						echo "<p class='baslikp'>",$liste[$i][0],"</p><br>";

						for ($j=1; $j < 10; $j++) { 
							echo "<p>Seviye $j: ", $liste[$i][$j], "</p><br>";
						}

						echo "</div>";
					}
				}
			?>
		</div>


	</main>

	<footer>
		<p style="font-size: 1rem; font-weight: bold;">Hüseyin Taşkın 100219023</p>
		<p style="font-size: 1rem; font-weight: bold;">Yalçın Arslan 100219030</p>
		<p style="font-size: 1rem; font-weight: bold;">Yaren Can 100219028</p>
	</footer>
</body>
</html>