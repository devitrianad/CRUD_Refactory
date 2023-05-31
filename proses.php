<?php
	include 'koneksi.php';

	if(isset($_POST['aksi'])){
		if($_POST['aksi']=="add"){
			
			$nama_kucing = $_POST['nama_kucing'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$nama_owner = $_POST['nama_owner'];
			$kontak = $_POST['kontak'];
			$alamat = $_POST['alamat'];

			$query = "INSERT INTO tb_pelanggan VALUES(null, '$nama_kucing', '$jenis_kelamin', '$nama_owner', '$kontak', '$alamat')";
			$sql = mysqli_query($conn, $query);

			if($sql){
				//echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
				header("location: index.php");
			}else{
				echo $query;
			}

			//echo $nama_kucing." | ".$jenis_kelamin." | ".$nama_owner." | ".$kontak." | ".$alamat;

			//echo "Tambah Data <a href='index.php'>[Home]</a>";
		}else if($_POST['aksi']=="edit"){
			echo "Edit Data <a href='index.php'>[Home]</a>";
			$id_kucing = $_POST['id_kucing'];
			$nama_kucing = $_POST['nama_kucing'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$nama_owner = $_POST['nama_owner'];
			$kontak = $_POST['kontak'];
			$alamat = $_POST['alamat'];

			$query = "UPDATE tb_pelanggan SET nama_kucing='$nama_kucing', jenis_kelamin='$jenis_kelamin', nama_owner='$nama_owner', kontak='$kontak', alamat='$alamat' WHERE id_kucing='$id_kucing';";
			$sql =mysqli_query($conn, $query);
			header("location: index.php");
		}
	}

	if(isset($_GET['hapus'])){
		//echo "Hapus Data <a href='index.php'>[Home]</a>";
		$id_kucing = $_GET['hapus'];
		$query = "DELETE FROM tb_pelanggan WHERE id_kucing = '$id_kucing';";
		$sql = mysqli_query($conn, $query);

		if($sql){
			header("location: index.php");
		}else{
			echo $query;
		}
	}
?>