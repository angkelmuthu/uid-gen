<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_RS</h2>
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
                                    <td width='200'>Kode Rs <?php echo form_error('kdrs') ?></td>
                                    <td><input type="text" class="form-control" name="kdrs" id="kdrs" placeholder="Kode Rumah sakit" value="<?php echo $kdrs; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nm Rs <?php echo form_error('nm_rs') ?></td>
                                    <td><input type="text" class="form-control" name="nm_rs" id="nm_rs" placeholder="Nm Rs" value="<?php echo $nm_rs; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Singkatan <?php echo form_error('singkatan') ?></td>
                                    <td><input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Singkatan" value="<?php echo $singkatan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                                    <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tipers <?php echo form_error('tipers') ?></td>
                                    <td><input type="text" class="form-control" name="tipers" id="tipers" placeholder="Tipers" value="<?php echo $tipers; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('master_rs') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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