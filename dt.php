<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if (!isset($_POST['gonder'])) {
		git("Önce formu doldurunuz!", "siralama.php");
		//hata mesajı ver giriş sayfasına git
	}

	try {
	  $vt = new PDO("mysql:dbname=epiz_29271679_materyal; host=sql208.epizy.com; charset=utf8","epiz_29271679", "VfoOlVVrunKJ");
	  $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	  echo $e->getMessage();
	}

	// Sorgular ve diğer işlemler burada...
	$sql = "insert into sirala (grupadi, konu, algoritma) values (:grupadi, :konu, :algoritma)";
	$ifade = $vt->prepare($sql);
	$ifade->execute(Array(":grupadi"=>$_POST['grupadi'], ":konu"=>$_POST['konu'], ":algoritma"=>$_POST['alg']));

	git("Oluşturduğunuz Algoritma Gönderildi!", "siralama.php");
	

	//Bağlantıyı yok edelim...
	$vt = null;

	function git($mesaj, $adres){
		echo ("<script LANGUAGE='JavaScript'>
			    window.alert('$mesaj');
			    window.location.href='$adres';
			    </script>");
		exit;
	}  
?>