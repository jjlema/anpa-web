<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="mystyle.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Socio do ANPA O Galo</title>
</head>

<?php
	function decrypt($key, $data) {
		$OPENSSL_CIPHER_NAME = "aes-128-cbc";
		$CIPHER_KEY_LEN = 16;
		if (strlen($key) < $CIPHER_KEY_LEN) {
			$key = str_pad("$key", $CIPHER_KEY_LEN, "0"); // 0 pad to len 16
		} else if (strlen($key) > $CIPHER_KEY_LEN) {
			$key = substr($str, 0, $CIPHER_KEY_LEN); // truncate to 16 bytes
		}
		$dataStr = hex2bin($data);
		$parts = explode(':', $dataStr); //Separate Encrypted data from iv.
		$decryptedData = openssl_decrypt(base64_decode($parts[0]), $OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, base64_decode($parts[1]));
		return $decryptedData;
	}
 

	$key = getenv('MY_KEY');
	$encrypted = $_GET['p'];
	$decrypted = decrypt($key, $encrypted);
	
	$info = explode(':', $decrypted);
	
	$socio = utf8_encode($info[0]);
	$proxenitor1 = utf8_encode($info[1]);
	$proxenitor2 = utf8_encode($info[2]);
	$fillo1 = utf8_encode($info[3]);
	$fillo2 = utf8_encode($info[4]);
	$fillo3 = utf8_encode($info[5]);
	
?>

<body style="background-color:#FFDE59;">

    <div class="main">
      <div class="wrapper">
			<h3 align=center><font face="verdana">ANPA O Galo</font></h3>
			<h3 align=center><font face="verdana">CEIP Praza de Barcelos</font></h3>
			<img class="center" src="anpaogalo.png" alt="Logo Barcelos"> 
			<h3 align=center><font face="verdana">Curso 2022 / 2023</font></h3>
			<h3 align=center><font face="calibri">Nº SOCIO / A</font></h3>
			<h4 align=center><font face="calibri"><?php echo $socio ?></font></h4>
			<h3 align=center><font face="calibri">PAI / NAI / TITOR</font></h3>
			<h4 align=center><font face="calibri"><?php echo $proxenitor1 ?></font></h4>
			<h4 align=center><font face="calibri"><?php echo $proxenitor2 ?></font></h4>
			<h3 align=center><font face="calibri">FILLOS / FILLAS</font></h3>
			<h4 align=center><font face="calibri"><?php echo $fillo1 ?></font></h4>
			<h4 align=center><font face="calibri"><?php echo $fillo2 ?></font></h4>
			<h4 align=center><font face="calibri"><?php echo $fillo3 ?></font></h4>
			<hr width="75%" color="#FF914D" size="5px">
			<p align=center><font face="courier">https://sites.google.com/view/anpaogalo</font></p>
			<p align=center><font face="courier">660 776 917</font></p>
	      </div>
    </div>
	
</body>

</html>