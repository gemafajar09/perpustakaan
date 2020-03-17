<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>

	 <link href="<?= base_url('asset/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  
  <link href="<?= base_url('asset/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row py-5">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<br>
				<h3>
				<p><center style="color:grey">
					Sistem Informasi Perpustakaan Sekolah SMP Negeri 3 Kinali
				</center></p>
				</h3>
				<div class="card">
					<form action="<?= base_url('Admin/index') ?>" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" placeholder="Username" class="form-control">
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" placeholder="Password" class="form-control">
						</div>
						<div>
							<button type="submit" name="login" class="btn btn-primary btn-block">login</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>	

</body>
</html>