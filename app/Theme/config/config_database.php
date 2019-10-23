<section class="p-3">
	<strong>Database</strong><br>
	<table width="100%">
		<form method="post" action=<?= base_url('/config/settingdatabase')?>>
		<tr>
			<td width="150">
				<div class="form-group">
					Server
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="text" name="db[1]" class="form-control form-control-sm" value="<?= $db[0] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-group">
					Host
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="text" name="db[2]" class="form-control form-control-sm" value="<?= $db[1] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-group">
					User
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="text" name="db[3]" class="form-control form-control-sm" value="<?= $db[2] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-group">
					Password
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="password" name="db[4]" class="form-control form-control-sm" value="<?= $db[3] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="form-group">
					Database
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="text" name="db[5]" class="form-control form-control-sm" value="<?= $db[4] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="simpan" class="btn btn-success btn-sm"></td>
		</tr>
	</form>
	</table>
</section>