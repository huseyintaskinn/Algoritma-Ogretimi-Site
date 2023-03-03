<?php 
    session_start();

    if ($_SESSION['level']<10) {
        header("Location: 9.php");
    }
 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="16x16" href="resimler/favicon.ico">
	<title>Tavşan Oyunu</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/anasayfa.css">
</head>
<body>
	<nav>
		<a class="logo" href="index.php">
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
		<a href="https://www.hareketligifler.net/cat-havai-fisekler-492.htm"><img src="https://www.hareketligifler.net/data/media/492/havai-fisek-hareketli-resim-0072.gif" border="0" alt="havai-fisek-hareketli-resim-0072" /></a>
		<div id="ekran">
			<img src="../resimler/tavşan.png" height="80%" style="margin-left: 200px;">
			<div>
				<p>Tebrikler tüm seviyeleri bitirdin!</p>
				<p>Artık Problem Çözme Uzmanısın!</p>
				<a href="index.php">Tekrar Oyna</a>
				<a href="../degerlendirme.php">Web Sitesini Değerlendir</a>
			</div>
			
		</div>
		<a href="https://www.hareketligifler.net/cat-havai-fisekler-492.htm"><img src="https://www.hareketligifler.net/data/media/492/havai-fisek-hareketli-resim-0072.gif" border="0" alt="havai-fisek-hareketli-resim-0072" /></a>
	</main>

	<footer>
		<p style="font-size: 1rem; font-weight: bold;">Hüseyin Taşkın 100219023</p>
		<p style="font-size: 1rem; font-weight: bold;">Yalçın Arslan 100219030</p>
		<p style="font-size: 1rem; font-weight: bold;">Yaren Can 100219028</p>
	</footer>
</body>
</html>