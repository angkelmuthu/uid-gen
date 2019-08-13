<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_pendapatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kdrs</th>
		<th>Cara Bayar</th>
		<th>Lunas</th>
		<th>Hutang</th>
		<th>Tgl</th>
		<th>Sycn</th>
		
            </tr><?php
            foreach ($t_pendapatan_data as $t_pendapatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_pendapatan->kdrs ?></td>
		      <td><?php echo $t_pendapatan->cara_bayar ?></td>
		      <td><?php echo $t_pendapatan->lunas ?></td>
		      <td><?php echo $t_pendapatan->hutang ?></td>
		      <td><?php echo $t_pendapatan->tgl ?></td>
		      <td><?php echo $t_pendapatan->sycn ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>