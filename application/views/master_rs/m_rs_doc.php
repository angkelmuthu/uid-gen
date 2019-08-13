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
        <h2>M_rs List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Rs</th>
		<th>Singkatan</th>
		<th>Alamat</th>
		<th>Tipers</th>
		
            </tr><?php
            foreach ($master_rs_data as $master_rs)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $master_rs->nm_rs ?></td>
		      <td><?php echo $master_rs->singkatan ?></td>
		      <td><?php echo $master_rs->alamat ?></td>
		      <td><?php echo $master_rs->tipers ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>