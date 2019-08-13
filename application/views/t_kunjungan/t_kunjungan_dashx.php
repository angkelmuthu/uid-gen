<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/c3/c3.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">

            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Donut <span class="fw-300"><i>Chart</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($k_dash as $dashboard) { ?>
                        <div class="col-xl-3">
                            <div class="panel-container show">
                                <div class="panel-content">
                                    <div id="donutChart<?php echo $dashboard->idkunjungan; ?>" style="width:100%; height:300px;"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<!-- dependency for c3 charts : this dependency is a BSD license with clause 3 -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/d3/d3.js"></script>
<!-- c3 charts : MIT license -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/c3/c3.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/demo-data/demo-c3.js"></script>
<script>
    var colors = [myapp_get_color.success_500, myapp_get_color.danger_500, myapp_get_color.info_500, myapp_get_color.primary_500, myapp_get_color.warning_500];
    <?php foreach ($k_dash as $dashboard) { ?>
        var donutChart = c3.generate({
            bindto: "#donutChart<?php echo $dashboard->idkunjungan; ?>",
            data: {
                // iris data from R
                columns: [
                    ['Rawat Jalan', <?php echo $dashboard->rj; ?>],
                    ['Rawat Inap', <?php echo $dashboard->ri; ?>],
                    ['IGD', <?php echo $dashboard->igd; ?>],
                ],
                type: 'donut' //,
                /*onclick: function (d, i) { console.log("onclick", d, i); },
                onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                onmouseout: function (d, i) { console.log("onmouseout", d, i); }*/
            },
            donut: {
                title: "<?php echo $dashboard->nm_rs; ?>"
            },
            color: {
                pattern: colors
            }
        });
    <?php } ?>
</script>