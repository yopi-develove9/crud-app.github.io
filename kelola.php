 <!DOCTYPE html>

<?php 
	include 'koneksi.php';
	session_start();

	
		$id_siswa = '';
		$nisn = '';
		$nama_siswa = '';
		$jenis_kelamin = '';
		$alamat = '';

	if(isset($_GET['ubah']) ) {
		$id_siswa = $_GET['ubah'];
		$query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$nisn = $result['nisn'];
		$nama_siswa = $result['nama_siswa'];
		$jenis_kelamin = $result['jenis_kelamin'];
		$alamat = $result['alamat'];

		
	}
 ?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>Tambah siswa</title>
</head>
<body>

	<nav class="navbar navbar-light bg-light mb-4">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	    	CRUD - BS5
	    </a>
	  </div>
</nav>
	<div class="container">
		<form action="proses.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
			<div class="mb-3 row">
		    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
				<div class="col-sm-10">
				    <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="ex: 1122334455" value="<?php echo $nisn; ?>">
		    </div>
		  </div>
		  <div class="mb-3 row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
				<div class="col-sm-10">
				    <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder=" ex: Alex" value="<?php echo $nama_siswa; ?>">
		    </div>
		  </div>
		  <div class="mb-3 row">
				    <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
				   <select  required id="jkel" name="jenis_kelamin" class="form-select">
					  <option <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki-laki">Laki-laki</option>
					  <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?>  value="Perempuan">Perempuan</option>
					</select>
		    </div>
		  </div>
		  	<div class="mb-3 row">
				    <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
				<div class="col-sm-10">
				    <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?>  class="form-control" type="file" name="foto" id="foto" accept="image/*">
		    </div>
		  </div>

		  		<div class="mb-3 row">
				    <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
				<div class="col-sm-10">
				   <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>

		    </div>
		  </div>
		  	<div class="mb-3 row mt-4">
		  		<div class="col">
		  			<?php 
		  				if(isset($_GET['ubah']) ) {
		  			 ?>
			  			<button type="submit" name="aksi" value="edit" class="btn btn-primary">
			  				<i class="fa fa-floppy-o" aria-hidden="true"></i>
			  			Simpan Perubahan</button>
		  			<?php 
		  				} else {
		  			 ?>
		  			 <button type="submit" name="aksi" value="add" class="btn btn-primary">
			  				<i class="fa fa-floppy-o" aria-hidden="true"></i>
			  			Tambahkan</button>
			  			<?php 
			  				
			  				}
			  			 ?>
		  		    <a href="index.php" type="button" class="btn btn-danger">
		  		    	<i class="fa fa-reply" aria-hidden="true"></i>
		  		    Batal</a>
		  		</div>
		</form>
  		
  	</div>
	</div>	
</body>
</html> 