<html>
<title>Program Kriptografi</title>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- <?php include 'chiper.php';?> -->
<div class="banner">
    <div class="bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="max-width: 900px; float: none; margin: 0 auto; margin-top: 40px; margin-bottom: 0px; color: black;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Cipher Substitusi - Caesar Cipher</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-5" style= "padding: 10px; color: black;">
                                <?php 

function Cipher($ch, $key)
{
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= Cipher($ch, $key);

	return $output;
}

function Decipher($input, $key)
{
	return Encipher($input, 26 - $key);
}

$plainText ="";
$cipherText ="";

if (isset($_POST["submit"])) {
$pilih=$_POST["pilih"] ;
if ($pilih==1) {
	$cipherText = Encipher($_POST["text"], $_POST["angka"]);
$plainText = Decipher($cipherText, $_POST["angka"]);
}else{
	$plainText = Decipher($_POST["text"], $_POST["angka"]);
	$cipherText = Encipher($plainText, $_POST["angka"]);
}

}

 ?>
<body><br><br>

<form action="" method="post">
	<center>
	<table>
	<tr>
		<td>Pilih</td>
		<td>
			
		<select name="pilih">
 		<option value="1">Enkripsi</option>
 		<option value="2">Dekripsi</option>
 	</select>
		</td>
	</tr>
	
		<tr>
			<td>Masukkan text</td>
			<td><textarea name="text" ></textarea></td>
			
		</tr>
		<tr>
			<td>Kunci</td>
			<td><input type="number" name="angka"></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit">Submit</button>
		</tr>
		<tr>
			<td>Text awal</td>
			<td><textarea name="hasil"><?php if(isset($_POST["submit"])){
				$pilih=$_POST["pilih"] ;
				if ($pilih==1) {
				echo $plainText ;
				}else{
				echo $cipherText;
				}

				} ?></textarea></td>
		</tr>
		<tr>
			<td>Hasil</td>
			<td><textarea name="hasil" ><?php if(isset($_POST["submit"])){
					$pilih=$_POST["pilih"] ;
				if ($pilih==1) {
				echo $cipherText;
				}else{
				
				echo $plainText ;
				}
			} ?></textarea></td>
		</tr>
	</table>
	</center>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	
</form>
</body>
</html>

