<?php include_once('config.php');

if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {

	$row	=	$db->getAllRecords('content', '*', ' AND id="' . $_REQUEST['editId'] . '"');
}


if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($judul == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($deskripsi == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($image == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($rilis == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($sutradara == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	}

	$data	=	array(

		'judul' => $judul,
		'deskripsi' => $deskripsi,
		'image' => $image,
		'rilis' => $rilis,
		'sutradara' => $sutradara,
	);

	$update	=	$db->update('content', $data, array('id' => $editId));

	if ($update) {

		header('location: index.php?msg=rus');

		exit;
	} else {

		header('location: index.php?msg=rnu');

		exit;
	}
}

?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>Silakan Ubah film</title>
	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>
	<script rel="stylesheet" src="source/fontawesome/js/all.min.js"></script>

</head>

<body>
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


		<br>
		<?php

		if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nama film ngga boleh kosong!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}

		?>

		<div class="card">

			<div class="card-header"><a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat semua film</a></div>

			<div class="card-body">



				<div class="col-sm-60">


					<form method="post">

						<div class="form-group">

							<label>Judul film <span class="text-danger">*</span></label>

							<input type="text" name="judul" id="judul" class="form-control" value="<?php echo isset($row[0]['judul']) ? $row[0]['judul'] : ''; ?>" placeholder="Enter judul name" required>
							<!-- 
							<textarea  name="judul" id="judul" rows="4" cols="50"><?php echo isset($row[0]['judul']) ? $row[0]['judul'] : ''; ?></textarea> -->

						</div>



						<div class="form-group">

							<label>Deskripsi <span class="text-danger">*</span></label>

							<!-- <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?php echo isset($row[0]['deskripsi']) ? $row[0]['deskripsi'] : ''; ?>" placeholder="Enter deskripsi name" required> -->

							<textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" cols="50"><?php echo isset($row[0]['deskripsi']) ? $row[0]['deskripsi'] : ''; ?></textarea>

						</div>



						<div class="form-group">

							<label>image <span class="text-danger">*</span></label>

							<input type="text" name="image" id="image" class="form-control" value="<?php echo isset($row[0]['image']) ? $row[0]['image'] : ''; ?>" placeholder="Enter image name" required>

						</div>

						<div class="form-group">

							<label>rilis <span class="text-danger">*</span></label>

							<input type="text" name="rilis" id="rilis" class="form-control" value="<?php echo isset($row[0]['rilis']) ? $row[0]['rilis'] : ''; ?>" placeholder="Enter rilis name" required>

						</div>

						<div class="form-group">

							<label>sutradara</label>

							<input type="text" name="sutradara" id="sutradara" class="form-control" value="<?php echo isset($row[0]['sutradara']) ? $row[0]['sutradara'] : ''; ?>" placeholder="Enter sutradara name" required>

						</div>

						<br>
						<div class="form-group">

							<input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId']) ? $_REQUEST['editId'] : '' ?>">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update film</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
			jQuery(function($) {
				var input = $('[type=tel]')
				input.mobilePhoneNumber({
					allowPhoneWithoutPrefix: '+1'
				});
				input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				})
			});
		});
	</script>


</body>

</html>