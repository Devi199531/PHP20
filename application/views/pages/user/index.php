<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Menu</h3>
			</div>

			<div class="box-body">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Username</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach ($data as $value) { ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $value->name ?></td>
								<td><?= $value->username ?></td>
								<td><?= $value->role_name ?></td>
								<td>
									<a href="<?= base_url('user/edit/') . $value->id ?>" class="btn btn-sm btn-warning">
										<i class="fa fa-pencil"></i>
									</a>&nbsp;
									<a href="<?= base_url('user/delete/') . $value->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?');">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php 
            $i++;
        } ?>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<a href="<?= base_url('user/create') ?>" class="btn btn-primary">
					<i class="fa fa-plus"></i>
				</a>
			</div>
		</div>
	</div>
</div>