<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Algoritma Sıralama</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/anasayfa.css">
</head>
<body>
	<nav>
		<a class="logo" href="index.php">
			<p>PROBLEM ÇÖZME VE ALGORİTMA</p>
		</a>
		<div>
			<a class="buton" href="index.php">Ana Sayfa</a>
			<a class="buton" href="sunu.php">Ders Sunusu</a>
			<a class="buton" href="cark.php">Algoritma Çarkı</a>
			<a class="buton" href="siralama.php">Sıralama Oluştur</a>
			<a class="buton" href="proje/index.php">Tavşan Oyunu</a>
		</div>
	</nav>

	<main class="anasayfa">
		<div id="ekran3">
			<form action="dt.php" method="POST">
				<label for="grupadi">Grup Adı:</label>
				<input type="text" name="grupadi" id="grupadi" required>
				<label for="konu">Konu:</label>
				<input type="text" name="konu" id="konu" required>
				<label for="alg">Algoritma:</label>
				<textarea cols="30" rows="10" name="alg" id="alg" required style="resize:none;"></textarea>
				<input type="submit" value="Gönder" name="gonder" id="gonder">
			</form>
		</div>
	</main>

	<footer>
		<p style="font-size: 1rem; font-weight: bold;">Hüseyin Taşkın 100219023</p>
		<p style="font-size: 1rem; font-weight: bold;">Yalçın Arslan 100219030</p>
		<p style="font-size: 1rem; font-weight: bold;">Yaren Can 100219028</p>
	</footer>
</body>
</html>