<?php 
include 'header.php';
// generate kode material
$kode_produk = $_GET['kode'];
$kode = mysqli_query($conn, "SELECT * from bot where id_chat = '$kode_produk'");
$data = mysqli_fetch_assoc($kode);

?>


<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Edit Bot</b></h2>

	<form action="proses/edit_bot.php" method="POST" enctype="multipart/form-data">

	<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="hidden" name="kode" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk"  value="<?= $data['id_chat']; ?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Keyword</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keyword Baru" name="keyword" value="<?= $data['keyword']; ?>">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Respon (Jawaban)</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan respon baru" name="respon" value="<?= $data['response']; ?>">
				</div>
			</div>
		</div>

		<hr>
		

	
		<div class="row">
			
			<div class="col-md-6">
				<button type="submit"  class="btn btn-warning" ><i class="glyphicon glyphicon-edit"></i> Edit</button> <a href="halaman_bot.php" class="btn btn-danger">Cancel</a>
			</div>	
			<div class="col-md-6">
				
			</div>
		</div>

		<br>

	</div>
</form>

</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
include 'footer.php';
?>