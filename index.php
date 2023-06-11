<?php 

	include 'koneksi.php';
	session_start();


	$query =  "SELECT * FROM tb_siswa;";
	$sql = mysqli_query($conn, $query);
	$no = 0;


	 // var_dump($result);
	 
	
 ?>
 <!DOCTYPE html>
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

	<!-- Datatables -->
	<link rel="stylesheet" href="datables/datatables.css">
	<script src="datatables/datatables.js"></script>
</head>
<script>
	$(document).ready(function () {
    $('#dt').DataTable();
});
</script>
<body>

	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	    	CRUD - BS5
	    </a>
	  </div>
</nav>

<!-- Judul -->
  <div class="container">
  	<h1 class="mt-4">Data Siswa</h1>

  	 <figure>
		  <blockquote class="blockquote">
		    <p>Berisi Data Yang Telah Disimpan Di database.</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    CRUD <cite title="Source Title">CREATE READ UPDATE DELETE</cite>
		  </figcaption>
	</figure>
	<a href="kelola.php" type="button" class="btn btn-primary btn-sm"> 
		<i class="fa fa-plus"></i>
		Tambah Data
	</a>
	<?php 

	if(isset($_SESSION['eksekusi'])): 

	?>
	<div class="alert alert-success  alert-dismissible fade show" role="alert">
  <strong>
  	<?= $_SESSION['eksekusi']; ?>
  </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

	<?php 

	session_destroy();
	endif;

	 ?>
	<div class="table-responsive">
	  <table id="dt" class="table align-middle cell-border hover">
	    <thead>
		      <tr>
		       <th><center>No.</center></th>
		       <th>NISN</th>
		       <th>Nama Siswa</th>
		       <th>Jenis Kelamin</th>
		       <th>Foto Siswa</th>
		       <th>Alamat Siswa</th>
		         <th>Aksi</th>
		      </tr>
		    </thead>
		 <tbody>
		 	<?php
		 	while($result = mysqli_fetch_assoc($sql)){
		 	 ?>
		      <tr>
		        <td><center>
		        	<?= ++$no; ?>.
		        </center></td>
		        <td>
		        	<?= $result['nisn']; ?>
		        </td>
		        <td><?= $result['nama_siswa']; ?></td>
		        <td><?= $result['jenis_kelamin']; ?></td>
		        <td>
		        	<img src="img/<?= $result['foto_siswa']; ?>" style="width:50px;">
		        </td>
		        <td>
		        	<?= $result['alamat']; ?>
		        </td>
		        <td>
		        	<a href="kelola.php?ubah=<?= $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
		        		<i class="fa fa-pencil"></i>
		        	</a>
		        	<a href="proses.php?hapus=<?= $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda ingin menghapus data tersebut???')">
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
  <div class="mb-5"></div>
    	
</body>
</html> 