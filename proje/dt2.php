<?php 
session_start();

$_SESSION['level']=0;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if (isset($_POST['git1'])) {
		$sutunadi="bir";
		$_SESSION['level']=2;
	}

	if (isset($_POST['git2'])) {
		$sutunadi="iki";
		$_SESSION['level']=3;
	}

	if (isset($_POST['git3'])) {
		$sutunadi="uc";
		$_SESSION['level']=4;
	}

	if (isset($_POST['git4'])) {
		$sutunadi="dort";
		$_SESSION['level']=5;
	}

	if (isset($_POST['git5'])) {
		$sutunadi="bes";
		$_SESSION['level']=6;
	}

	if (isset($_POST['git6'])) {
		$sutunadi="alti";
		$_SESSION['level']=7;
	}

	if (isset($_POST['git7'])) {
		$sutunadi="yedi";
		$_SESSION['level']=8;
	}

	if (isset($_POST['git8'])) {
		$sutunadi="sekiz";
		$_SESSION['level']=9;
	}

	if (isset($_POST['git9'])) {
		$sutunadi="dokuz";
		$_SESSION['level']=10;
	}



	try {
	  $vt = new PDO("mysql:dbname=epiz_29271679_materyal; host=sql208.epizy.com; charset=utf8","epiz_29271679", "VfoOlVVrunKJ");
	  $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	  echo $e->getMessage();
	}

	// Sorgular ve diğer işlemler burada...
	$sql = "update tavsan set $sutunadi='Tamamlandı' where ad = :ad";
	$ifade = $vt->prepare($sql);
	$ifade->execute(Array(":ad"=>$_SESSION['ad']));

	

	//Bağlantıyı yok edelim...
	$vt = null;

	switch ($sutunadi) {
		case 'bir':
			header("Location: 2.php");
			break;
		case 'iki':
			header("Location: 3.php");
			break;
		case 'uc':
			header("Location: 4.php");
			break;
		case 'dort':
			header("Location: 5.php");
			break;
		case 'bes':
			header("Location: 6.php");
			break;
		case 'alti':
			header("Location: 7.php");
			break;
		case 'yedi':
			header("Location: 8.php");
			break;
		case 'sekiz':
			header("Location: 9.php");
			break;
		case 'dokuz':
			header("Location: 10.php");
			break;
		
		default:
			// code...
			break;
	}
	

?>