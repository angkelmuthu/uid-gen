<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_kunjungan Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Kdrs</td><td><?php echo $kdrs; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Cara Bayar</td><td><?php echo $cara_bayar; ?></td></tr>
	    <tr><td>Rj</td><td><?php echo $rj; ?></td></tr>
	    <tr><td>Ri</td><td><?php echo $ri; ?></td></tr>
	    <tr><td>Igd</td><td><?php echo $igd; ?></td></tr>
	    <tr><td>Sync</td><td><?php echo $sync; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_kunjungan') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>