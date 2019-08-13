<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_KUNJUNGAN</h2>
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
                                    <td width='200'>Kdrs <?php echo form_error('kdrs') ?></td>
                                    <td><input type="text" class="form-control" name="kdrs" id="kdrs" placeholder="Kdrs" value="<?php echo $kdrs; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tgl <?php echo form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Cara Bayar <?php echo form_error('cara_bayar') ?></td>
                                    <td><input type="text" class="form-control" name="cara_bayar" id="cara_bayar" placeholder="Cara Bayar" value="<?php echo $cara_bayar; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Rj <?php echo form_error('rj') ?></td>
                                    <td><input type="text" class="form-control" name="rj" id="rj" placeholder="Rj" value="<?php echo $rj; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Ri <?php echo form_error('ri') ?></td>
                                    <td><input type="text" class="form-control" name="ri" id="ri" placeholder="Ri" value="<?php echo $ri; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Igd <?php echo form_error('igd') ?></td>
                                    <td><input type="text" class="form-control" name="igd" id="igd" placeholder="Igd" value="<?php echo $igd; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Sync <?php echo form_error('sync') ?></td>
                                    <td><input type="text" class="form-control" name="sync" id="sync" placeholder="Sync" value="<?php echo date("Y-m-d h:m:s"); ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="idkunjungan" value="<?php echo $idkunjungan; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_kunjungan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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