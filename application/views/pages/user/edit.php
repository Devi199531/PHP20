<div class="row" >
	<div class="col-md--12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-tittle">Create Role</h3>
			</div>

			<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>') ?>
			
			<form role="form" method="post" action="<?= base_url('user/update/' . $data->id); ?>">
				<div class="box-body">
					<div class="form-group">
						<label>Nama</label>
						<input name="name" placeholder="nama" class="form-control" type="text" required="" value="<?= $data->name ?>">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input name="username" placeholder="nama" class="form-control" type="text" required="" value="<?= $data->username ?>">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label>Role</label>
						<select id="select" name="role_id" class="form-control selectpicker" required="">
							<option value="0">-- Pilih Role --</option>
							<?php foreach ($role as $value) { ?>
								<option value="<?= $value->id; ?>"<?= $value->id == $data->role_id? 'selected' : ''?>><?= $value->name; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>