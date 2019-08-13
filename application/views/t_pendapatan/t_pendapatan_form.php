<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA T_PENDAPATAN</h2>
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
                                    <td width='200'>Cara Bayar <?php echo form_error('cara_bayar') ?></td>
                                    <td><input type="text" class="form-control" name="cara_bayar" id="cara_bayar" placeholder="Cara Bayar" value="<?php echo $cara_bayar; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Lunas <?php echo form_error('lunas') ?></td>
                                    <td><input type="text" class="form-control" name="lunas" id="lunas" placeholder="Lunas" value="<?php echo $lunas; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Hutang <?php echo form_error('hutang') ?></td>
                                    <td><input type="text" class="form-control" name="hutang" id="hutang" placeholder="Hutang" value="<?php echo $hutang; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tgl <?php echo form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Sycn <?php echo form_error('sycn') ?></td>
                                    <td><input type="text" class="form-control" name="sycn" id="sycn" placeholder="Sycn" value="<?php echo date("Y-m-d h:m:s"); ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_pendapatan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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