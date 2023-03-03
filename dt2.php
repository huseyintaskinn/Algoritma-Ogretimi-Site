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
	$sql = "insert into yorum (yorum) values (:yorum)";
	$ifade = $vt->prepare($sql);
	$ifade->execute(Array(":yorum"=>$_POST['yorum']));

	git("Düşünce ve önerileriniz iletildi! Geri bildirim sağladığınız için teşekkürler!", "index.php");
	

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