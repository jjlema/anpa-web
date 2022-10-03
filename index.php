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
	
	$info = explode(':', $decrypted)
?>

<body style="background-color:#FFDE59;">

    <div class="main">
      <div class="wrapper">
			<h2 align=center><font face="verdana">ANPA O Galo</font></h2>
			<h2 align=center><font face="verdana">CEIP Praza de Barcelos</font></h2>
			<img class="center" src="anpaogalo.png" alt="Logo Barcelos"> 
			<h2 align=center><font face="verdana">Curso 2022 / 2023</font></h2>
			<h2 align=center><font face="calibri">Nº SOCIO / A</font></h2>
			<h3 align=center><font face="calibri"><?php echo $info[0] ?></font></h3>
			<h2 align=center><font face="calibri">FAMILIA</font></h2>
			<h3 align=center><font face="calibri"><?php echo $info[1] ?></font></h3>
			<hr width="75%" color="#FF914D" size="5px">
			<h3 align=center><font face="courier">https://sites.google.com/view/anpaogalo</font></h3>
			<h3 align=center><font face="courier">660 776 917</font></h3>
	      </div>
    </div>
	
</body>

</html>