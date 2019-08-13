<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DATA PNBP</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Polres</td>
                                <td><?php echo $nama_polres; ?></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td><?php echo $kota; ?></td>
                            </tr>
                            <tr>
                                <td>Polda</td>
                                <td><?php echo $polda; ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td><?php echo $provinsi; ?></td>
                            </tr>
                            <tr>
                                <td>Samsat</td>
                                <td><?php echo $samsat; ?></td>
                            </tr>
                            <tr>
                                <td>Loket</td>
                                <td><?php echo $loket; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><?php echo $tanggal; ?></td>
                            </tr>
                            <tr>
                                <td>Surat</td>
                                <td><?php echo $surat; ?></td>
                            </tr>
                            <tr>
                                <td>Transaksi</td>
                                <td><?php echo $transaksi; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td><?php echo $jenis; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $harga; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('pnbp') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>