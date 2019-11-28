<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Create Role</h3>
			</div>
			
			<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>') ?>
			
			<form role="form" method="post" action="<?= base_url('user/store'); ?>">
			<div class="box-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="name" placeholder="nama" class="form-control" required="">
					<span class="help-block"></span>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" placeholder="username" class="form-control" required="">
					<span class="help-block"></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" placeholder="password" class="form-control" required="">
					<span class="help-block"></span>
				</div>
				<div class="form-group">
					<label>Role</label>
					<select id="select" name="role_id" class="form-control selectpicker" required="">
						<option value="0">--Pilih Role--</option>
						<?php foreach ($role as $value) { ?>
							<option value="<?= $value->id; ?>"><?= $value -> name;?></option>
						<?php } ?>
					</select>
			</div>
		</div>
						<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>