<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA PNBP</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<form action="<?php echo $action; ?>" method="post">

							<table class='table table-striped'>

								<tr>
									<td width='200'>Nama <?php echo form_error('nama') ?></td>
									<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nik <?php echo form_error('nik') ?></td>
									<td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nama Polres <?php echo form_error('nama_polres') ?></td>
									<td><input type="text" class="form-control" name="nama_polres" id="nama_polres" placeholder="Nama Polres" value="<?php echo $nama_polres; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kota <?php echo form_error('kota') ?></td>
									<td><input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Polda <?php echo form_error('polda') ?></td>
									<td><input type="text" class="form-control" name="polda" id="polda" placeholder="Polda" value="<?php echo $polda; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Provinsi <?php echo form_error('provinsi') ?></td>
									<td><input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Samsat <?php echo form_error('samsat') ?></td>
									<td><input type="text" class="form-control" name="samsat" id="samsat" placeholder="Samsat" value="<?php echo $samsat; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Loket <?php echo form_error('loket') ?></td>
									<td><input type="text" class="form-control" name="loket" id="loket" placeholder="Loket" value="<?php echo $loket; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
									<td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Surat <?php echo form_error('surat') ?></td>
									<td><input type="text" class="form-control" name="surat" id="surat" placeholder="Surat" value="<?php echo $surat; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Transaksi <?php echo form_error('transaksi') ?></td>
									<td><input type="text" class="form-control" name="transaksi" id="transaksi" placeholder="Transaksi" value="<?php echo $transaksi; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Jenis <?php echo form_error('jenis') ?></td>
									<td><input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Harga <?php echo form_error('harga') ?></td>
									<td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('pnbp') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
								</tr>
							</table>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>