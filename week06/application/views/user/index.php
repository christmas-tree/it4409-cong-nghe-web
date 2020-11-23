<?php include(ROOT . DS . 'application' . DS . 'views' . DS . 'header.php'); ?>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo HOST . DS . 'user' . DS . 'create'; ?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>				
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $index => $user) : ?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $user['User']['name'] ?></td>
							<td><?php echo $user['User']['email'] ?></td>
							<td><?php echo $user['User']['role'] ?></td>
							<td>
								<a href="<?php echo HOST . DS . 'user' . DS . 'edit' . DS . $user['User']['id']; ?>" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
								<a href="#deleteUserModal<?php echo $user['User']['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<!-- Delete Modal HTML -->
						<div id="deleteUserModal<?php echo $user['User']['id']; ?>" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?php echo HOST . DS . 'user' . DS .'delete' . DS. $user['User']['id']; ?>" method="POST">
										<div class="modal-header">						
											<h4 class="modal-title">Delete user</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">					
											<p>Are you sure you want to delete user <?php echo strtoupper($user['User']['name']); ?>?</p>
											<p class="text-warning"><small>This action cannot be undone.</small></p>
										</div>
										<div class="modal-footer">
											<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
											<input type="submit" class="btn btn-danger" value="Delete">
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
<?php include(ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php'); ?>
