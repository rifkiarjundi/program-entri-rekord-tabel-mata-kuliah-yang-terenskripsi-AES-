<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekord Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Rekord Mahasiswa</h2>
  <form method="post" >
  <div>NPM  : </div><div><input type="text"name="npm"></div>
  <div>Nama  : </div><div><input type="text"name="namamahasiswa"></div>
  <div>Password  : </div><div><input type="password"name="pswd"></div>
  <div>Alamat  : </div><div><textarea title="ketik alamat anda"name="alamat"></textarea>
  	<div><input type="submit" value="Simpan Rekord" class="btn btn-primary" name="bsimpan"><a href="daftarmahasiswa.php" class="btn btn-succes">Lihat Yang Sudah Daftar</a>
	 </form>
</div>
<?php
if (isset ($_POST['bSimpan'] )) {
	$NPM=filter_var($_POST['NPM'],FILTER_SANITIZE_STRING);
	$NamaMahasiswa=filter_var($_POST['NamaMahasiswa'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['pswd'],FILTER_SANITIZE_STRING);
	$Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
	$kon=mysqli_connect("localhost","root","","siakadumb");
	$kunci="@12345UMBOke";
	$sql="insert into Mahasiswa (NPM,NamaMahasiswa,Password,Alamat) values
	('".$NPM."',aes_encrypt('".$NamaMahasiswa."','".$kunci."'),aes_encrypt('".$Password."','".$kunci."'),'".$Alamat."')";
	$q=mysqli_query($kon,$sql);
	if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>">
  <strong>Berhasil Simpan!</strong> Rekord Mahasiswa Berhasil Disimpan.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>">
  <strong>Gagal Di Simpan!</strong> Rekord Mahasiswa Gagal Disimpan.
</div>';
	}
}
?>
</div>
</body>
