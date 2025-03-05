<?php 

include 'header.php';
// pesanan baru 

?>
<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Bot Keyword dan Response</b></h2>
	<br>
	<h5 class="bg-success" style="padding: 7px; width: 710px; font-weight: bold;"><marquee>Lakukan Reload Setiap Masuk Halaman ini, untuk menghindari terjadinya kesalahan data dan informasi</marquee></h5>
	<a href="halaman_bot.php" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reload</a>
	<br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Keyword</th>
				<th scope="col">Response</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$result = mysqli_query($conn, "SELECT * from bot");
			$no = 1;
			$array = 0;
			while($row = mysqli_fetch_assoc($result)){
				?>

				<tr>
					<td><?= $no; ?></td>
					<td><?= $row['keyword']; ?></td>
					<td><?= $row['response']; ?></td>
					<td> <a href="edit_bot.php?kode=<?= $row['id_chat']; ?>" class="btn btn-warning btn-xl"><i class="glyphicon glyphicon-edit"></i></a>  <a href='?id=<?= $row['id_chat']?>' class='btn btn-danger btn-xl' ><i  class='fa fa-trash'></i></a> </td>
				    </tr>
					<?php
					$no++; 
			}

                if(isset($_GET['id'])){
                    mysqli_query($conn,"delete from bot where id_chat='$_GET[id]'");
                    echo '<script type ="text/JavaScript"> window.location.href="halaman_bot.php";</script>';
                }
				?>

			</tbody>
		</table>
        <a href="tm_keyword.php" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Keyword</a>


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