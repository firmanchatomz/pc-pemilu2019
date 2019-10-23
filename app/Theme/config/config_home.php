<strong>System Template</strong><br>
<small>memudahkan dalam pembuatan template admin, homepage dan login. setelah template aktif maka halaman template tersimpan pada view dan dapat di sesuaikan dengan kebutuhan</small><br><br>
<strong>Database</strong><br>
<small>Konfigurasi database tak perlu masuk kehalaman coding, cukup memasukkan nya kedalam konfigurasi halaman ini, maka database akan tersetting secara otomatis</small>
<div class="card">
	<div class="card-body">
		<strong>Template</strong></br>
		<table width="100%">
			<form method="post" action=<?= base_url('config/settingtemplate/admin')?>>
				<tr>
					<td width="200">
						<div class="form-group">
							Tema Admin
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="radio" name="admin" value="FALSE" <?=($tp[0] == 'FALSE') ? 'checked' : '' ; ?>> Null
							<?php foreach ($listadmin as $row): ?>
								<input type="radio" name="admin" value="<?php echo $row ?>" <?=($tp[0] == $row) ? 'checked' : '' ; ?>> <?php echo $row ?>	
							<?php endforeach ?>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="submit" value="create" class="btn btn-success btn-sm">
						</div>
					</td>
				</tr>
			</form>
			<form method="post" action=<?= base_url('config/settingtemplate/homepage')?>>
				<tr>
					<td>
						<div class="form-group">
							Tema Homepage
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="radio" name="home" value="FALSE" <?=($tp[1] == 'FALSE') ? 'checked' : '' ; ?>> Null
							<input type="radio" name="home" value="default" <?=($tp[1] == 'default') ? 'checked' : '' ; ?>> Default	
						</div>
					</td>
						<td>
						<div class="form-group">
							<input type="submit" value="create" class="btn btn-success btn-sm">
						</div>
					</td>
				</tr>
			</form>
			<form method="post" action=<?= base_url('config/settingtemplate/login')?>>
				<tr>
					<td width="200">
						<div class="form-group">
							Tema Login
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="radio" name="login" value="FALSE" <?=($tp[2] == 'FALSE') ? 'checked' : '' ; ?>> Null
							<?php foreach ($listlogin as $row): ?>
								<input type="radio" name="login" value="<?php echo $row ?>" <?=($tp[2] == $row) ? 'checked' : '' ; ?>> <?php echo $row ?>	
							<?php endforeach ?>
						</div>
					</td>
						<td>
						<div class="form-group">
							<input type="submit" value="create" class="btn btn-success btn-sm">
						</div>
					</td>
				</tr>
			</form>
		</table>	
	</div>
</div>