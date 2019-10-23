<section class="">
	<div class="table-responsive">
		<form method="post" action=<?= base_url('config/settingview/tampil')?>>
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							Tampilan Data
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="text" name="link" placeholder="masukkan file" required class="form-control form-control-sm">
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="radio" name="tampil" value="datatables"> Datatables
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="submit" value="create" class="btn btn-success btn-sm">
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</section>