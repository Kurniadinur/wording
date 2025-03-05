<?php 
include 'header.php';
// generate kode material
?>


<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Edit Bot</b></h2>

	<form action="proses/tm_keyword.php" method="POST" enctype="multipart/form-data">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Keyword</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keyword Baru" name="keyword" >
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Respon (Jawaban)</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan respon baru" name="respon" >
				</div>
			</div>
		</div>

		<hr>
		

	
		<div class="row">
			
			<div class="col-md-6">
				<button type="submit"  class="btn btn-success" ><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button> <a href="halaman_bot.php" class="btn btn-danger">Cancel</a>
				
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