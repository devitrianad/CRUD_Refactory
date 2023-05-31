<!DOCTYPE html>

<?php
	include 'koneksi.php';

	$id_kucing = '';
	$nama_kucing = '';
	$jenis_kelamin = '';
	$nama_owner = '';
	$kontak = '';
	$alamat = '';

	if(isset($_GET['ubah'])){
		$id_kucing = $_GET['ubah'];
		
		$query = "SELECT * FROM tb_pelanggan WHERE id_kucing = '$id_kucing';";
		$sql = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($sql);

		$nama_kucing = $result['nama_kucing'];
		$jenis_kelamin = $result['jenis_kelamin'];
		$nama_owner = $result['nama_owner'];
		$kontak = $result['kontak'];
		$alamat = $result['alamat'];

		//var_dump($result);
		//die();
	}
?>

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
	<nav class="navbar navbar-light bg-light mb-4">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="#">
     			CRUD - REFACTORY
    		</a>
  		</div>
	</nav>
	<div class="container">
		<form method="POST" action="proses.php">
			<input type="hidden" value="<?php echo $id_kucing; ?>" name="id_kucing">
			<div class="mb-3 row">
				<label for="namaKucing" class="col-sm-2 col-form-label">Nama Kucing</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_kucing" class="form-control" id="namaKucing" placeholder="Tulis di sini!" value="<?php echo $nama_kucing; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select required id="jenisKelamin" name="jenis_kelamin" class="form-select">
						<option <?php if($jenis_kelamin == 'laki-laki'){echo "selected";} ?> value="laki-laki">laki-laki</option>
						<option <?php if($jenis_kelamin == 'perempuan'){echo "selected";} ?> value="perempuan">perempuan</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="namaOwner" class="col-sm-2 col-form-label">Nama Owner</label>
				<div class="col-sm-10">
					<input required type="text" name="nama_owner" class="form-control" id="namaOwner" placeholder="Tulis di sini!" value="<?php echo $nama_owner; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="kontak" class="col-sm-2 col-form-label">kontak</label>
				<div class="col-sm-10">
					<input required type="text" name="kontak" class="form-control" id="kontak" placeholder="Tulis di sini!"value="<?php echo $kontak; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
				</div>
			</div>
			<div class="mb-3 row mt-5">
				<div class="col">
					<?php
						if(isset($_GET['ubah'])){
					?>	
						<button type="submit"  name="aksi" value="edit" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
					<?php
						} else {
					?>
						<button type="submit" name="aksi" value="add" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
					<?php
						}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
	
</body>
</html>