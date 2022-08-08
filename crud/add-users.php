<?php include_once('config.php');

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($judul == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un');

		exit;
	} elseif ($deskripsi == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($image == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up');

		exit;
	}  elseif ($sutradara == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	}  else {



		$userCount	=	$db->getQueryCount('content', 'id');

		if ($userCount[0]['total'] < 100000) {

			$data	=	array(

				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'image' => $image,
				
				'sutradara' => $sutradara,

			);

			$insert	=	$db->insert('content', $data);

			if ($insert) {

				header('location:index.php?msg=ras');

				exit;
			} else {

				header('location:index.php?msg=rna');

				exit;
			}
		} else {

			header('location:' . $_SERVER['PHP_SELF'] . '?msg=dsd');

			exit;
		}
	}
}

?>

<!doctype html>
<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Address Book">
	<meta name="keywords" content="toko lina">
	<meta name="robots" content="index,follow">
	<title>Tambah film</title>
	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>



<body>

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
	</style>

	<div class="header">
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
                    <a class="nav-link text-light">Tambah Film</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="logout.php" class="nav-link text-light"> Log Out </a>
                </li>
            </ul>
        </div>
    </nav>
	</div>


	<div class="container">

		<?php

		if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "dsd") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';
		}

		?>
<br>
		<div class="card">


			<div class="card-header"><a href="index.php" class="float-left btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Kembali</a></div>

			<div class="card-body">



				<div class="col-sm-60">
					<form method="post">
						<div class="form-group">

							<label>Judul film <span class="text-danger">*</span></label>

							<input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan judul film" required>

						</div>

						<div class="form-group">

							<label>deskripsi <span class="text-danger">*</span></label>
<!-- 
							<input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan deskripsi" required> -->

							<textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" cols="50"></textarea>



						</div>

						<div class="form-group">

							<label>link youtube <span class="text-danger">*</span></label>

							<input type="text" name="image" id="image" class="form-control" placeholder="Masukan link youtube" required>

						</div>


						<div class="form-group">

							<label>Sutradara <span class="text-danger">*</span></label>

							<input type="text" name="sutradara" id="sutradara" class="form-control" placeholder="Masukan sutradara" value="1" required>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Tambah Film</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">



	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: Black;
			color: white;
			text-align: center;
		}
	</style>


</body>

</html>