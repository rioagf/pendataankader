<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Desk_keluarga List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('desk_keluarga/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('desk_keluarga/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('desk_keluarga'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Kk</th>
		<th>Tempat Tinggal</th>
		<th>Status Lahan</th>
		<th>Luas Lantai</th>
		<th>Luas Lahan</th>
		<th>Jenis Lantai</th>
		<th>Dinding</th>
		<th>Jendela</th>
		<th>Genteng</th>
		<th>Penerangan</th>
		<th>Energi Memasak</th>
		<th>Tps</th>
		<th>Mck</th>
		<th>Sumber Airmandi</th>
		<th>Fasilitas Bab</th>
		<th>Sumber Airminum</th>
		<th>Pembuangan Limbah</th>
		<th>Bawah Sutet</th>
		<th>Bantaran Sungai</th>
		<th>Lerang</th>
		<th>Kondisi Rumah</th>
		<th>Date Created</th>
		<th>Date Updated</th>
		<th>Id User</th>
		<th>Action</th>
            </tr><?php
            foreach ($desk_keluarga_data as $desk_keluarga)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $desk_keluarga->no_kk ?></td>
			<td><?php echo $desk_keluarga->tempat_tinggal ?></td>
			<td><?php echo $desk_keluarga->status_lahan ?></td>
			<td><?php echo $desk_keluarga->luas_lantai ?></td>
			<td><?php echo $desk_keluarga->luas_lahan ?></td>
			<td><?php echo $desk_keluarga->jenis_lantai ?></td>
			<td><?php echo $desk_keluarga->dinding ?></td>
			<td><?php echo $desk_keluarga->jendela ?></td>
			<td><?php echo $desk_keluarga->genteng ?></td>
			<td><?php echo $desk_keluarga->penerangan ?></td>
			<td><?php echo $desk_keluarga->energi_memasak ?></td>
			<td><?php echo $desk_keluarga->tps ?></td>
			<td><?php echo $desk_keluarga->mck ?></td>
			<td><?php echo $desk_keluarga->sumber_airmandi ?></td>
			<td><?php echo $desk_keluarga->fasilitas_bab ?></td>
			<td><?php echo $desk_keluarga->sumber_airminum ?></td>
			<td><?php echo $desk_keluarga->pembuangan_limbah ?></td>
			<td><?php echo $desk_keluarga->bawah_sutet ?></td>
			<td><?php echo $desk_keluarga->bantaran_sungai ?></td>
			<td><?php echo $desk_keluarga->lerang ?></td>
			<td><?php echo $desk_keluarga->kondisi_rumah ?></td>
			<td><?php echo $desk_keluarga->date_created ?></td>
			<td><?php echo $desk_keluarga->date_updated ?></td>
			<td><?php echo $desk_keluarga->id_user ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('desk_keluarga/read/'.$desk_keluarga->id_desk),'Read'); 
				echo ' | '; 
				echo anchor(site_url('desk_keluarga/update/'.$desk_keluarga->id_desk),'Update'); 
				echo ' | '; 
				echo anchor(site_url('desk_keluarga/delete/'.$desk_keluarga->id_desk),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>