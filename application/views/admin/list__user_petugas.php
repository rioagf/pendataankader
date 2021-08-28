<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">List User Petugas</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- Content Column -->
		<div class="col-lg-12 mb-12">

			<!-- Project Card Example -->
			<div class="card shadow mb-12">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Data User Petugas</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama Petugas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    	$no = 1;
                                    	foreach ($userpetugas as $data) {
                                    ?>
                                    <tbody>
                                    	<tr>
                                    		<td><?= $no++; ?></td>
                                    		<td><?= $data->username; ?></td>
                                    		<td><?= $data->email ?></td>
                                    		<td><?= $data->nama_petugas ?></td>
                                    		<td>
                                    			<a href="<?= base_url().'detail__petugas/'.$data->id_user ?>" class="btn btn-sm btn-primary"><i class="fa fa-book"></i></a>
                                    			<a href="<?= base_url().'edit__user/'.$data->id_user ?>" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                                    			<a href="<?= base_url().'hapus__userpetugas/'.$data->id_user ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    		</td>
                                    	</tr>
                                    </tbody>
                                    <?php } ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama Petugas</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
				</div>
			</div>
		</div>
	</div>
</div>