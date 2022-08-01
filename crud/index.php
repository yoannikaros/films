<?php
//inisialisasi session
session_start();

//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: ../index.php');
}

?>

<?php include_once('config.php'); ?>
<?php error_reporting(0); ?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Address Book">
	<meta name="keywords" content="Address Book">
	<meta name="robots" content="index,follow">
	<title>Films</title>


	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>




</head>



<body>

	<?php

	$condition	=	'';
	if (isset($_REQUEST['judul']) and $_REQUEST['judul'] != "") {
		$condition	.=	' AND judul LIKE "%' . $_REQUEST['judul'] . '%" ';
	}
	if (isset($_REQUEST['sutradara']) and $_REQUEST['sutradara'] != "") {
		$condition	.=	' AND sutradara LIKE "%' . $_REQUEST['sutradara'] . '%" ';
	}


	//Main queries
	$pages->default_ipp	=	10;
	$sql 	= $db->getRecFrmQry("SELECT * FROM content WHERE 1 " . $condition . "");
	$pages->items_total	=	count($sql);
	$pages->mid_range	=	2;
	$pages->paginate();

	$userData	=   $db->getRecFrmQry("SELECT * FROM content WHERE 1 " . $condition . " ORDER BY id asc " . $pages->limit . "");

	?>



	<style>
		.header {
			position: relative;
			left: 0;
			Top: 0;
			width: 100%;
			background-color: Black;
			color: white;
			text-align: center;
		}


		/* general styling */
		body {
			font-family: "Open Sans", sans-serif;
			line-height: 1.25;
		}
	</style>

<nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
        <div class="container">
            <a href="index.php" class="navbar-brand">Yoan Nikaros</a>
            <button class="navbar-toggler" type="button" data-togle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto pt-2 pb-2">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-light">Home</a>
                </li>
                <li class="nav-item">
                    <a href="add-users.php" class="nav-link text-light">Tambah Film</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="logout.php" class="nav-link text-light"> Log Out </a>
                </li>
            </ul>
        </div>
    </nav>

	<div class="container">


<br>
		<div class="card">

	

			<div class="card-body">

				<?php

				if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>  film berhasil di hapus !</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> film berhasil di ubah!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {

					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
				}

				?>

				<div class="col-sm-12">

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Pencarian film</h5>
					<hr>
					<form method="get">

						<div class="row">

							<div class="col-sm-5">

								<div class="form-group">

									<label>Judul films</label>

									<input type="text" name="judul" id="judul" class="form-control" value="<?php echo isset($_REQUEST['judul']) ? $_REQUEST['judul'] : '' ?>" placeholder="Judul film">

								</div>

							</div>

							<div class="col-sm-5">

								<div class="form-group">

									<label>Sutradara</label>

									<input type="text" name="sutradara" id="sutradara" class="form-control" value="<?php echo isset($_REQUEST['sutradara']) ? $_REQUEST['sutradara'] : '' ?>" placeholder="Sutradara">

								

								</div>

							</div>


							<div class="col-sm-10">

								<div class="form-group">

									<label>&nbsp;</label>

									<div>

										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari film</button>

										<!-- <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a> -->

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

		</div>

		<hr>


		<?php
		//fungsi buatRupiah
		function buatRupiah($angka)
		{
			$hasil = "Rp. " . number_format($angka, 0, ',', '.');
			return $hasil;
		}

		?>

		<div>
			<br>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<!-- <th>Sr#</th> -->
						<th>Judul</th>
						<th>Sutradara</th>
						<th>Rilis</th>

						<!-- <th>ISI PERDUS</th> -->
					
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($userData) > 0) {
						$s	=	'';
						foreach ($userData as $val) {
							$s++;
					?>
							<tr>
								<!-- <td data-label="No"><?php echo $s; ?></td> -->
								<td><?php echo $val['judul']; ?></td>
								<td><?php echo $val['sutradara']; ?></td>
								<td><?php echo $val['rilis']; ?></td>
								
				
								<td align="center">
									<a href="edit-users.php?editId=<?php echo $val['id']; ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Ubah film</a> |
									<a href="delete.php?delId=<?php echo $val['id']; ?>" class="text-danger" onClick="return confirm('beneran mau hapus film ini ?');"><i class="fa fa-fw fa-trash"></i> Hapus film</a>
								</td>

							</tr>
						<?php
						}
					} else {
						?>
						<tr>
							<td colspan="5" align="center">film ngga ada! coba ketik yang bener</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!--/.col-sm-12-->

		<div class="clearfix"></div>

		<div class="row marginTop">
			<div class="col-sm-12 paddingLeft pagerfwt">
				<?php if ($pages->items_total > 0) { ?>
					<?php echo $pages->display_pages(); ?>
					<?php echo $pages->display_items_per_page(); ?>
					<?php echo $pages->display_jump_menu(); ?>
				<?php } ?>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>

	</div>

	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>

	<style>
		.footer {
			position: relative;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: Black;
			color: white;
			text-align: center;
		}
	</style>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<!-- 	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>
     -->

</body>

</html>