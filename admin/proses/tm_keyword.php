<?php 
include '../../koneksi/koneksi.php';

	// generate kode bom
$keyword = $_POST['keyword'];
$respon = $_POST['respon'];


	$result = mysqli_query($conn, "INSERT INTO bot (keyword,response) VALUES('$keyword','$respon')");

	if($result){
		echo "
		<script>
		alert('KEYWORD BERHASIL DITAMBAHKAN');
		window.location = '../halaman_bot.php';
		</script>
		";
	}




?>