<hr>
<!-- perhitungan sementara -->

<div class="row my-1">

  <div class="col-md-6">
  	<div class="card">
  		<div class="card-header bg-danger text-white text-center mb-2">
  			<strong>Data Pemilih dan Pengguna Hak Pilih</strong>
  				<span class="float-right"><a href="" data-toggle="modal" data-target="#pemilih" class="text-white"><i class="mdi mdi-settings"></i></a></span>
  		</div>
  		<div class="card-body p-0">
  			<div class="table-responsive">
	  			<table width="100%" class="text-center font-weight-bold text-white" border="1">
			      <tr>
			      	<td class="bg-secondary">Uraian</td>
			        <td class="bg-success" colspan="3"><h3>DPT</h3></td>
			        <td class="bg-primary" colspan="3"><h3>DPTb</h3></td>
			        <td class="bg-danger" colspan="3"><h3>DPK</h3></td>
			        <td class="bg-dark"><h3>Total</h3></td>
			      </tr>
			      <!-- data pemilih -->
			      <tr class="text-center font-weight-bold">
			      	<td class="bg-secondary text-left" rowspan="2">Data Pemilih</td>
			        <td class="bg-success">L</td>
			        <td class="bg-success">P</td>
			        <td class="bg-success">Jumlah</td>
			        <td class="bg-primary">L</td>
			        <td class="bg-primary">P</td>
			        <td class="bg-primary">Jumlah</td>
			        <td class="bg-danger">L</td>
			        <td class="bg-danger">P</td>
			        <td class="bg-danger">Jumlah</td>
			        <td class="bg-dark" rowspan="2"><?= $totalpemilih?></td>
			      </tr>
			      <tr class="text-center font-weight-bold">
			      	<?php 
			      	$index 		= 0;
			      	$bgcolor 	= ['bg-success','bg-primary','bg-danger'];
			      	foreach ($pemilih as $row): ?>
			        	<td class="<?= $bgcolor[$index] ?>"><?= $row['jumlah_l'] ?></td>
			        	<td class="<?= $bgcolor[$index] ?>"><?= $row['jumlah_p'] ?></td>
			        	<td class="<?= $bgcolor[$index] ?>"><?= $row['total'] ?></td>
			      		<?php 
			      		$jumpemilih[] = $row['total'];
			      		$index++ ?>
			      	<?php endforeach ?>
			      </tr>
			      <!-- data pengguna hak pilih -->
			       <tr class="text-center font-weight-bold">
			      	<td class="bg-secondary text-left" rowspan="2">Pengguna Hak Pilih</td>
			        <td class="bg-success">L</td>
			        <td class="bg-success">P</td>
			        <td class="bg-success">Jumlah</td>
			        <td class="bg-primary">L</td>
			        <td class="bg-primary">P</td>
			        <td class="bg-primary">Jumlah</td>
			        <td class="bg-danger">L</td>
			        <td class="bg-danger">P</td>
			        <td class="bg-danger">Jumlah</td>
			        <td class="bg-dark" rowspan="2"><?= $total['hakpilih']?></td>
			      </tr>
			      <tr class="text-center font-weight-bold">
			        <td class="bg-success"><?= $total['dpt-l']?></td>
			        <td class="bg-success"><?= $total['dpt-p']?></td>
			        <td class="bg-success"><?= $total['dpt']?></td>
			        <td class="bg-primary"><?= $total['dptb-l']?></td>
			        <td class="bg-primary"><?= $total['dptb-p']?></td>
			        <td class="bg-primary"><?= $total['dptb']?></td>
			        <td class="bg-danger"><?= $total['dpk-l']?></td>
			        <td class="bg-danger"><?= $total['dpk-p']?></td>
			        <td class="bg-danger"><?= $total['dpk']?></td>
			      </tr>
			      <tr>
			      	<td class="bg-secondary text-left">Sisa Hak Pilih</td>
			      	<td class="bg-success" colspan="3"><?= sisapemilih($jumpemilih[0],$total['dpt']) ?></td>
			      	<td class="bg-primary" colspan="3"><?= sisapemilih($jumpemilih[1],$total['dptb']) ?></td>
			      	<td class="bg-danger" colspan="3"><?= sisapemilih($jumpemilih[2],$total['dpk']) ?></td>
			      	<td class="bg-dark" colspan="3"><?= sisapemilih($totalpemilih,$total['hakpilih']) ?></td>
			      </tr>
			    </table>
		  	</div>
  		</div>
  	</div>
  </div>


  <div class="col-md-6">
  	<div class="card">
  		<div class="card-header bg-danger text-white mb-2 text-center">
    		<strong>PERHITUNGAN SURAT SUARA SEMENTARA</strong>
    		<span class="float-right"><a href="" data-toggle="modal" data-target="#suratsuara" class="text-white"><i class="mdi mdi-settings"></i></a></span>
  		</div>
  		<div class="card-body p-0">
		   <div class="table-responsive">
		    <table width="100%" class="text-center font-weight-bold text-white" border="1">
		      <tr>
		      	<td class="bg-dark">Surat Suara</td>
		        <td class="bg-secondary"><h3>1</h3></td>
		        <td class="bg-warning"><h3>2</h3></td>
		        <td class="bg-danger"><h3>3</h3></td>
		        <td class="bg-primary"><h3>4</h3></td>
		        <td class="bg-success"><h3>5</h3></td>
		      </tr>
		      <tr>
		      	<td class="bg-dark text-left">Tersedia</td>
		      	<?php 
		      	$index = 0;
		      	$totalsurat = 0;
		      	foreach ($surat as $row): ?>
		        	<td class="text-<?= $warna[$index] ?>"><?= $row['total'] ?></td>
		      		<?php 
		      		$jumsurat[] = $row['total'];
		      		$totalsurat = $totalsurat + $row['total'];
		      		$index++ ?>
		      	<?php endforeach ?>
		      </tr>
		      <tr>
		      	<td class="bg-dark text-left">Digunakan</td>
		        <td class="text-secondary"><?= $total['surat1'] ?></td>
		        <td class="text-warning"><?= $total['surat2'] ?></td>
		        <td class="text-danger"><?= $total['surat3'] ?></td>
		        <td class="text-primary"><?= $total['surat4'] ?></td>
		        <td class="text-success"><?= $total['surat5'] ?></td>
		      </tr>
		      <tr>
		      	<td class="bg-dark text-left">Rusak/Cacat</td>
		        <?php 
		      	$index = 0;
		      	foreach ($surat as $row): ?>
		        	<td class="text-<?= $warna[$index] ?>"><?= $row['rusak'] ?></td>
		      		<?php 
		      		$jumsuratrusak[]	= $row['rusak'];
		      		$index++ ?>
		      	<?php endforeach ?>
		      </tr>
		      <tr>
		      	<td class="bg-dark text-left">Tersisa</td>
		        <td class="text-secondary"><?= sisasurat($jumsurat[0],$total['surat1'],$jumsuratrusak[0]) ?></td>
		        <td class="text-warning"><?= sisasurat($jumsurat[1],$total['surat2'],$jumsuratrusak[1]) ?></td>
		        <td class="text-danger"><?= sisasurat($jumsurat[2],$total['surat3'],$jumsuratrusak[2]) ?></td>
		        <td class="text-primary"><?= sisasurat($jumsurat[3],$total['surat4'],$jumsuratrusak[3]) ?></td>
		        <td class="text-success"><?= sisasurat($jumsurat[4],$total['surat5'],$jumsuratrusak[4]) ?></td>
		      </tr>
		      <tr>
		      	<td class="bg-dark text-left">Total Surat Suara</td>
		      	<td class="text-center text-dark" colspan="5"><?= $totalsurat ?></td>
		      </tr>
		    </table>
		   </div>
  		</div>
  	</div>
  </div>

</div>

<!-- ##################################################################### -->

<!-- alert -->
	<div class="row my-1">
		<div class="col-md">
			<?= show_alert() ?>
		</div>
	</div>

<!-- akhir alert -->


<div class="row my-3">
	<div  class="col-md-6">
		<header class="text-right">
			<?php if (sisapemilih($jumpemilih[0],$total['dpt']) > 0): ?>
				<a href="#" class="btn btn-success btn-sm" data-target="#tambahdpt" data-toggle="modal">Tambah DPT</a>
			<?php endif ?>
		</header>
		<div class="card mt-2">
			<div class="card-header font-weight-bold bg-success text-white">
				<span>Daftar Pemilih Tetap</span>
				<span class="float-right">DPT</span>
			</div>
			<div class="card-body">
		   <div class="table-responsive">
			    <table class="table table-hover bg-white table-bordered" id="data-table-dpt">
			      <thead class="text-center">
			        <tr>
			          <th width="25">No</th>
			          <th>Nomor Dpt</th>
			          <th>JK</th>
			          <th>Jam</th>
			        </tr>
			      </thead>
			      <tbody class="text-capitalize">
			        <?php 
			        $no = 1;
			        if (isset($dpt) AND !empty($dpt)) {
			        	sort($dpt);
			          foreach ($dpt as $row) { ?>
			          <tr>
			            <td class="text-center"><?php echo $no++; ?></td>
			            <td>Dpt - <?php echo $row[1] ?></td>
			            <td><?= $row['jk'] ?></td>
			            <td><?php echo $row[3] ?> WIB</td>
			          </tr>
			           <?php
			          }
			        } else { ?>
			           <tr>
			             <td colspan="4" class="text-center">Belum Ada Data</td>
			           </tr>
			        <?php } ?>
			      </tbody>
			    </table>
		  	</div>
			</div>
		</div>
	</div>


	<div  class="col-md-6">
		<header class="text-right">
			<?php if (sisapemilih($jumpemilih[1],$total['dptb']) > 0): ?>
				<a href="#" class="btn btn-primary btn-sm" data-target="#tambahdptb" data-toggle="modal">Tambah DPTb</a>
			<?php endif ?>
		</header>
		<div class="card mt-2">
			<div class="card-header font-weight-bold bg-primary text-white">
				<span>Daftar Pemilih Tambahan</span>
				<span class="float-right">DPTb</span>
			</div>
			<div class="card-body">
		   <div class="table-responsive">
			    <table class="table table-hover bg-white table-bordered" id="data-table-dptb">
			      <thead class="text-center">
			        <tr>
			          <th width="25">No</th>
			          <th>Nomor Dptb</th>
			          <th>JK</th>
			          <th>Jam</th>
			          <th>Surat</th>
			        </tr>
			      </thead>
			      <tbody class="text-capitalize">
			        <?php 
			        $no = 1;
			        if (isset($dptb) AND !empty($dptb)) {
			          foreach ($dptb as $row) { ?>
			          <tr>
			            <td class="text-center"><?php echo $no++; ?></td>
			            <td>Dptb - <?php echo $row[1] ?></td>
			            <td><?= $row['jk'] ?></td>
			            <td><?php echo $row['waktu'] ?> WIB</td>
			            <td><?php echo $row['surat_suara'] ?></td>
			          </tr>
			           <?php
			          }
			        } else { ?>
			           <tr>
			             <td colspan="5" class="text-center">Belum Ada Data</td>
			           </tr>
			        <?php } ?>
			      </tbody>
			    </table>
		  	</div>
			</div>
		</div>
	</div>


	<div  class="col-md-6">
		<header class="text-right">
			<?php if (sisapemilih($jumpemilih[2],$total['dpk']) > 0): ?>
				<a href="#" class="btn btn-danger btn-sm" data-target="#tambahdpk" data-toggle="modal">Tambah DPK</a>
			<?php endif ?>
		</header>
		<div class="card mt-2">
			<div class="card-header font-weight-bold bg-danger text-white">
				<span>Daftar Pemilih Khusus</span>
				<span class="float-right">DPK</span>
			</div>
			<div class="card-body">
		   <div class="table-responsive">
			    <table class="table table-hover bg-white table-bordered" id="data-table-dpk">
			      <thead class="text-center">
			        <tr>
			          <th width="25">No</th>
			          <th>Nomor</th>
			          <th>JK</th>
			          <th>Jam</th>
			        </tr>
			      </thead>
			      <tbody class="text-capitalize">
			        <?php 
			        $no = 1;
			        if (isset($dpk) AND !empty($dpk)) {
			          foreach ($dpk as $row) { ?>
			          <tr>
			            <td class="text-center"><?php echo $no++; ?></td>
			            <td>Dpk - <?php echo $row[1] ?></td>
			            <td><?php echo $row[2] ?></td>
			            <td><?php echo $row[3] ?> WIB</td>
			          </tr>
			           <?php
			          }
			        } else { ?>
			           <tr>
			             <td colspan="4" class="text-center">Belum Ada Data</td>
			           </tr>
			        <?php } ?>
			      </tbody>
			    </table>
		  	</div>
			</div>
		</div>
	</div>
</div>


<div class="batas"></div>

<!-- modal dpt -->

<!-- Modal for add date important -->
<div class="modal fade" id="tambahdpt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form method="post" action="<?= site_url('home/tambahdata') ?>">
	      <div class="modal-header bg-success text-white">
	        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data DPT</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label for="">Nomor DPT</label>
	        	<input type="number" name="nomor" class="form-control" required autofocus>
	        	<input type="hidden" value="dpt" name="status">
	        </div>
	         <div class="form-group">
	        	<label for="">Jenis Kelamin</label> <br>
	        	<input type="radio" value="L" name="jk" checked> Laki - laki <br>
	        	<input type="radio" value="P" name="jk"> Perempuan <br>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>

<!-- akhir modal dpt -->


<!-- modal dptb -->

<!-- Modal for add date important -->
<div class="modal fade" id="tambahdptb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form method="post" action="<?= site_url('home/tambahdata') ?>">
	      <div class="modal-header bg-primary text-white">
	        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data DPTb</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label for="">Nomor DPTb</label>
	        	<input type="number" name="nomor" class="form-control" required>
	        	<input type="hidden" value="dptb" name="status">
	        </div>
	        <div class="form-group">
	        	<label for="">Jenis Kelamin</label> <br>
	        	<input type="radio" value="L" name="jk" checked> Laki - laki <br>
	        	<input type="radio" value="P" name="jk"> Perempuan <br>
	        </div>
	        <div class="form-group">
	        	<label for="">Hak Surat Suara</label> <br>
	        	<input type="checkbox" value="1" name="surat_suara[]" checked> <span class="text-secondary">1 Presiden dan wakil presiden</span><br>
	        	<input type="checkbox" value="2" name="surat_suara[]"> <span class="text-warning">2 DPR RI</span><br>
	        	<input type="checkbox" value="3" name="surat_suara[]" checked> <span class="text-danger">3 DPD RI</span><br>
	        	<input type="checkbox" value="4" name="surat_suara[]"> <span class="text-primary">4 DPRD Provinsi</span><br>
	        	<input type="checkbox" value="5" name="surat_suara[]"> <span class="text-success">5 DPRD Kota/Kabupaten</span><br>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>

<!-- akhir modal dpt -->

<!-- modal dpk -->

<!-- Modal for add date important -->
<div class="modal fade" id="tambahdpk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form method="post" action="<?= site_url('home/tambahdata') ?>">
	      <div class="modal-header bg-primary text-white">
	        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data DPK</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label for="">Nomor DPK</label>
	        	<input type="number" name="nomor" class="form-control" required>
	        	<input type="hidden" value="dpk" name="status">
	        </div>
	        <div class="form-group">
	        	<label for="">Jenis Kelamin</label> <br>
	        	<input type="radio" value="L" name="jk" checked> Laki - laki <br>
	        	<input type="radio" value="P" name="jk"> Perempuan <br>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>

<!-- akhir modal dpt -->

<!-- modal surat suara -->

<!-- Modal for add date important -->
<div class="modal fade bd-example-modal-lg" id="suratsuara" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<form method="post" action="<?= site_url('home/prosessurat') ?>">
	      <div class="modal-header bg-primary text-white">
	        <h5 class="modal-title" id="exampleModalLabel"><strong>Surat Suara</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
		   		<div class="table-responsive">
		      	<table width="100%">
		      		<tr class="text-center text-white">
		      			<th class="bg-dark"><h3>Surat Suara</h3></th>
		      			<th class="bg-secondary"><h3>1</h3></th>
		      			<th class="bg-warning"><h3>2</h3></th>
		      			<th class="bg-danger"><h3>3</h3></th>
		      			<th class="bg-primary"><h3>4</h3></th>
		      			<th class="bg-success"><h3>5</h3></th>
		      		</tr>
		      		<tr>
		      			<td>Total</td>
		      			<?php foreach ($surat as $row): ?>
			      			<td>
						        <div class="form-group">
						        	<input type="hidden" name="id_suratsuara[]" value="<?= $row['id_suratsuara'] ?>">
						        	<input type="number" name="total[]" class="form-control" value="<?= $row['total'] ?>" required>
						        </div>
			      			</td>
		      			<?php endforeach ?>
		      		</tr>
		      		<tr>
		      			<td>Rusak / Cacat</td>
		      			<?php foreach ($surat as $row): ?>
			      			<td>
						        <div class="form-group">
						        	<input type="number" name="rusak[]" class="form-control" value="<?= $row['rusak'] ?>" required>
						        </div>
			      			</td>
		      			<?php endforeach ?>
		      		</tr>
		      	</table>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>

<!-- akhir modal dpt -->


<!-- modal pemilih -->

<!-- Modal for add date important -->
<div class="modal fade bd-example-modal-lg" id="pemilih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<form method="post" action="<?= site_url('home/prosespemilih') ?>">
	      <div class="modal-header bg-primary text-white">
	        <h5 class="modal-title" id="exampleModalLabel"><strong>Data Pemilih</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<table width="100%" class="text-center font-weight-bold text-white" border="1">
			      <tr>
			        <td class="bg-success" colspan="3"><h3>DPT</h3></td>
			        <td class="bg-primary" colspan="3"><h3>DPTb</h3></td>
			        <td class="bg-danger" colspan="3"><h3>DPK</h3></td>
			        <td class="bg-dark"><h3>Total</h3></td>
			      </tr>
			      <!-- data pemilih -->
			      <tr class="text-center font-weight-bold">
			        <td class="bg-success">L</td>
			        <td class="bg-success">P</td>
			        <td class="bg-success">Jumlah</td>
			        <td class="bg-primary">L</td>
			        <td class="bg-primary">P</td>
			        <td class="bg-primary">Jumlah</td>
			        <td class="bg-danger">L</td>
			        <td class="bg-danger">P</td>
			        <td class="bg-danger">Jumlah</td>
			        <td class="bg-dark" rowspan="3"><?= $totalpemilih?></td>
			      </tr>
			      <tr class="text-center font-weight-bold">
			      	<?php 
			      	foreach ($pemilih as $row): ?>
			      		<input type="hidden" name="id_pemilih[]" value="<?= $row['id_pemilih'] ?>">
			        	<td>
									<div class="form-group">
				        		<input type="number" class="form-control" value="<?= $row['jumlah_l'] ?>" name="jumlah_l[]">
									</div>
								</td>
			        	<td>
									<div class="form-group">
			        			<input type="number" class="form-control" value="<?= $row['jumlah_p'] ?>" name="jumlah_p[]">
									</div>
								</td>
			        	<td>
									<div class="form-group">
			        			<input type="text" class="form-control" value="<?= $row['total'] ?>" disabled>
									</div>
								</td>
			      	<?php endforeach ?>
			      </tr>
			      <tr>
			      	<?php foreach ($pemilih as $row): ?>
				      	<td colspan="3">
				      		<div  class="form-group">
				      			<input type="text" name="keterangan[]" class="form-control" value="<?= $row['keterangan'] ?>">
				      		</div>
				      	</td>
			      	<?php endforeach ?>
			      </tr>
			    </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
  	</form>
  </div>
</div>

<!-- akhir modal dpt -->