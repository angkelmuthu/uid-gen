<?php $date = new DateTime("now"); ?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/chartjs/chartjs.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Dashboard PNBP
            <small> Tahun <?php echo $date->format('Y'); ?></small>
        </h1>
        <!-- <div class="subheader-block d-lg-flex align-items-center">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Dokter</small>
                </span>
                <span class="fw-500 fs-xl d-block color-primary-500">
                    32 <small>Dokter</small>
                </span>
            </div>
        </div>
        <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
                <span class="fw-300 fs-xs d-block opacity-50">
                    <small>Perawat</small>
                </span>
                <span class="fw-500 fs-xl d-block color-danger-500">
                    51 <small>Perawat</small>
                </span>
            </div>
        </div> -->

    </div>
    <div class="row">

        <div class="col-sm-6 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-5 d-block l-h-n m-0 fw-500">
                        <?php
                        $sql = "SELECT surat,SUM(harga) AS ttl FROM m_pnbp
                        WHERE year(tanggal)=year(CURDATE()) and surat='BPKB'";
                        $query = $this->db->query($sql);
                        foreach ($query->result() as $row) {
                            echo 'Rp. ' . number_format($row->ttl);
                            echo '<small class="m-0 l-h-n">PNBP ' . $row->surat . '</small>';
                        }
                        ?>

                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="p-3 bg-info-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-5 d-block l-h-n m-0 fw-500">
                        <?php
                        $sql = "SELECT surat,SUM(harga) AS ttl FROM m_pnbp
                        WHERE year(tanggal)=year(CURDATE()) and surat='SIM'";
                        $query = $this->db->query($sql);
                        foreach ($query->result() as $row) {
                            echo 'Rp. ' . number_format($row->ttl);
                            echo '<small class="m-0 l-h-n">PNBP ' . $row->surat . '</small>';
                        }
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="p-3 bg-danger-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-5 d-block l-h-n m-0 fw-500">
                        <?php
                        $sql = "SELECT surat,SUM(harga) AS ttl FROM m_pnbp
                        WHERE year(tanggal)=year(CURDATE()) and surat='STNK'";
                        $query = $this->db->query($sql);
                        foreach ($query->result() as $row) {
                            echo 'Rp. ' . number_format($row->ttl);
                            echo '<small class="m-0 l-h-n">PNBP ' . $row->surat . '</small>';
                        }
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-5 d-block l-h-n m-0 fw-500">
                        <?php
                        $sql = "SELECT SUM(harga) AS ttl FROM m_pnbp
                        WHERE year(tanggal)=year(CURDATE())";
                        $query = $this->db->query($sql);
                        foreach ($query->result() as $row) {
                            echo 'Rp. ' . number_format($row->ttl);
                        }
                        ?>
                        <small class="m-0 l-h-n">Total PNBP</small>
                    </h3>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Tren PNBP<span class="fw-300"><i>Tahun <?php echo $date->format('Y'); ?></i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <canvas id="linechart" style="width:100%; height:400px;"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Persentase PNBP<span class="fw-300"><i> Per Propinsi</i> <i>Tahun <?php echo $date->format('Y'); ?></i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <canvas id="piechart" style="width:100%; height:400px;"></canvas>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    var ctx = document.getElementById("linechart").getContext("2d");

    const colors = {
        darkBlue: {
            fill: '#92bed2',
            stroke: '#3282bf',
        },

    };

    //const availableForExisting = [16, 46, 25, 33, 40, 33, 45];

    <?php
    $kdrs = $this->uri->segment('3');
    $sql = "SELECT MONTHname(tanggal) AS bln FROM m_pnbp
            WHERE YEAR(tanggal)=YEAR(CURDATE())
            GROUP BY MONTH(tanggal)";
    $query = $this->db->query($sql);
    echo "const xData = [";
    foreach ($query->result() as $row) {
        echo "'";
        echo $row->bln;
        echo "',";
    }
    echo "];";
    ?>

    const linechart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xData,
            datasets: [{
                label: "PNBP",
                backgroundColor: 'rgba(136,106,181, 0.2)',
                borderColor: myapp_get_color.primary_500,
                pointBackgroundColor: myapp_get_color.primary_700,
                pointBorderColor: 'rgba(0, 0, 0, 0)',
                pointBorderWidth: 1,
                borderWidth: 1,
                pointRadius: 3,
                pointHoverRadius: 4,
                // data: [
                //     45,
                //     75,
                // ],
                <?php
                $kdrs = $this->uri->segment('3');
                $sql = "SELECT SUM(harga) AS ttl FROM m_pnbp
                WHERE YEAR(tanggal)=YEAR(CURDATE())
                GROUP BY MONTH(tanggal)";
                $query = $this->db->query($sql);
                echo "data : [";
                foreach ($query->result() as $row) {
                    echo "'";
                    echo $row->ttl;
                    echo "',";
                }
                echo "],";
                ?>
                fill: true
            }]
        },
        options: {
            responsive: false,
            // Can't just just `stacked: true` like the docs say
            scales: {
                yAxes: [{
                    stacked: true,
                }]
            },
            animation: {
                duration: 750,
            },
        }
    });
    //
    var ctx = document.getElementById("piechart").getContext('2d');
    var piechart = new Chart(ctx, {
        type: 'pie',
        data: {
            <?php
            $kdrs = $this->uri->segment('3');
            $sql = "SELECT kota,SUM(harga) AS ttl FROM m_pnbp GROUP BY provinsi";
            $query = $this->db->query($sql);
            echo "labels : [";
            foreach ($query->result() as $row) {
                echo "'";
                echo $row->kota;
                echo "',";
            }
            echo "],";
            ?>
            // labels: ["Pribadi", "BPJS", "Jaminan"],
            datasets: [{
                backgroundColor: [
                    myapp_get_color.primary_200,
                    myapp_get_color.warning_400,
                    myapp_get_color.success_50,
                    myapp_get_color.info_300,
                    myapp_get_color.danger_500
                ],
                <?php
                $kdrs = $this->uri->segment('3');
                $sql = "SELECT kota,SUM(harga) AS ttl FROM m_pnbp GROUP BY provinsi";
                $query = $this->db->query($sql);
                echo "data : [";
                foreach ($query->result() as $row) {
                    echo $row->ttl;
                    echo ",";
                }
                echo "]";
                ?>
                // data: [12, 19, 3]
            }]
        }
    });
</script>