<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Socio do ANPA O Galo</title>
</head>

<body>
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
	 

		$my_key_var = getenv('MY_KEY');
		$encrypted = $_GET['p'];
		$decrypted = decrypt($key, $encrypted);
	 
		echo "Key: $my_key_var <br>";
		echo "Encrypted Text: $encrypted <br>";
		echo "Decrypted Text: $decrypted <br>";
	?>

</body>

</html>