<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Konfigurasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href=<?= base_url('bootstrap4.1/css/bootstrap.min.css')?>>
    <link rel="stylesheet" href=<?= base_url('css/chatomz.css')?>>
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=<?= base_url('font-awesome5/css/all.min.css')?>>
		<link rel="shortcut icon" href=<?= base_url('assets/img/fc.ico')?>>

		<script type="text/javascript" src=<?= base_url('/j-query/jquery.min.js')?>></script>
    <script type="text/javascript" src=<?= base_url('/bootstrap4.1/js/bootstrap.min.js')?>></script>
  </head>
<body>
	<div class="container-fluid mt-3">
		<div class="row">

			<div class="col-md-8">
				<div class="card">
					<div class="card-header bg-info text-white">
						<strong>Konfigurasi Sistem Framework</strong>
					</div>
					<div class="card-body p-2">
						<div class="container">
							<ul class="nav nav-tabs nav-justified" role="tablist">
				      	<li class="nav-item">
				      		<a class="nav-link active" data-toggle="tab" href="#home"><strong>HOME</strong></a>
				        </li>
				        <li class="nav-item">
				        	<a class="nav-link" data-toggle="tab" href="#database"><strong>DATABASE</strong></a>
				        </li>
				        <li class="nav-item">
				        	<a class="nav-link" data-toggle="tab" href="#viewcontent"><strong>CONTENT</strong></a>
				        </li>
					    </ul>

     					<div class="tab-content">

      					<div id="home" class="container tab-pane active bg-white border border-top-0">
							<?php require_once '../app/Theme/config/config_home.php'; ?>
						</div>

      					<div id="database" class="tab-pane small fade bg-white border border-top-0">
							<?php require_once '../app/Theme/config/config_database.php'; ?>
						</div>

						<div id="viewcontent" class="tab-pane small fade bg-white border border-top-0">
							<?php require_once '../app/Theme/config/config_viewcontent.php'; ?>
						</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
					<div class="card mb-3">
					<div class="card-header bg-info text-white">
						<strong>Guide Framework</strong>
					</div>
					<div class="card-body text-justify">
					Referensi : <br>
					<a target="_blank" href="http://localhost/referensi/bootstrap4/" class="nav-link">Bootstrap4.3</a>
					</div>
				</div>
				<div class="card">
					<div class="card-header bg-info text-white">
						<strong>Auto Coding</strong>
					</div>
					<div class="card-body">
						<strong>Tambah Controller<sup class="text-danger"><strong>*</strong></sup></strong>
						<form method="post" action=<?= base_url('config/addcontroller')?>>
							<table width="100%">
								<tr>
									<td>
										<input type="text" name="controller" class="form-control form-control-sm" placeholder="Nama Controller" maxlength="10" required>
									</td>
									<td>
										<input type="submit" value="create" class="btn btn-success btn-sm">
									</td>
								</tr>
							</table>	
						</form>
						<strong>Tambah Model<sup class="text-danger"><strong>*</strong></sup></strong>
						<form method="post" action=<?= base_url('config/addmodel')?>>
							<table width="100%">
								<tr>
									<td>
										<input type="text" name="model" class="form-control form-control-sm" placeholder="Nama Model" maxlength="20" required>
									</td>
									<td>
										<input type="submit" value="create" class="btn btn-success btn-sm">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<span class="text-danger">* </span> <small><i>max. 20 karakter dan tanpa spasi</i></small>
									</td>
								</tr>
							</table>	
						</form>
						<hr>
						<form method="POST" action=<?= base_url('config/autocoding')?>>
							<table>
								<tr>
									<td width="100">
										<div class="form-group">
											Auto Model
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="radio" name="model" value="tidak" checked> Tidak
											<input type="radio" name="model" value="ya"> Ya
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											Hapus Model
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="radio" name="hapus" value="tidak" checked> Tidak
											<input type="radio" name="hapus" value="ya"> Ya
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="form-group">
											<input type="submit" value="simpan" class="btn btn-success btn-sm">
										</div>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>