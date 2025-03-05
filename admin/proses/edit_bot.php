<?php 
include '../../koneksi/koneksi.php';

$kode = $_POST['kode'];
$keyword = $_POST['keyword'];
$respon = $_POST['respon'];



	$result = mysqli_query($conn, "UPDATE bot SET keyword = '$keyword',  response = '$respon' where id_chat = '1'");

	if($result){
		echo "
		<script>
		alert('BERHASIL DIEDIT');
		window.location = '../halaman_bot.php';
		</script>
		";
	}
	die;


?>