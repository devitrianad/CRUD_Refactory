<?php
	include 'koneksi.php';

	$query = "SELECT * FROM tb_pelanggan;";
	$sql = mysqli_query($conn, $query);
	$no = 0;


	//var_dump($result);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<title>crud_refactory</title>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">
     			CRUD - REFACTORY
    		</a>
  		</div>
	</nav>

	<!-- Judul -->
	<div class="container">
		<h1 class="mt-4">Data Pelanggan</h1>
		<figure>
			<blockquote class="blockquote">
				<p>Berisi data yang telah disimpan di database.</p>
			</blockquote>
			<figcaption class="blockquote-footer">
				CRUD <cite title="Source Title">Create Read Update Delete</cite>
			</figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary">
			<i class ="fa fa-plus"></i>
			Tambah Data
		</a>
		<div class="table-responsive">
			<table class="table align-middle table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Kucing</th>
						<th>Jenis Kelamin</th>
						<th>Nama Owner</th>
						<th>Kontak</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($result = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>
							<?php echo ++$no; ?>
						</td>
						<td>
							<?php echo $result['nama_kucing']; ?>
						</td>
						<td>
							<?php echo $result['jenis_kelamin']; ?>
						</td>
						<td>
							<?php echo $result['nama_owner']; ?>
						</td>
						<td>
							<?php echo $result['kontak']; ?>
						</td>
						<td>
							<?php echo $result['alamat']; ?>
						</td>
						<td>
							<a href="kelola.php?ubah=<?php echo $result['id_kucing']; ?>" type="button" class="btn btn-success btn-sm">
								<i class=" fa fa-pencil"></i>
							</a>
							<a href="proses.php?hapus=<?php echo $result['id_kucing']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				<?php
					}
				?>	
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>