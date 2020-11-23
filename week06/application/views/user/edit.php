<?php include(ROOT . DS . 'application' . DS . 'views' . DS . 'header.php'); ?>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
				</div>
			</div>
			<div class="modal-dialog">
					<div class="modal-content">
						<form action="<?php echo HOST . DS . 'user' . DS .'update' . DS . $user['User']['id']; ?>" method="POST">
							<div class="modal-header">						
								<h4 class="modal-title">Add User</h4>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="<?php echo $user['User']['name']; ?>" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" value="<?php echo $user['User']['email']; ?>" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Role</label>
									<input type="text" name="role" value="<?php echo $user['User']['role']; ?>" class="form-control" required></input>
								</div>			
							</div>
							<div class="modal-footer">
								<a href="<?php echo HOST . DS . 'user'; ?>" class="btn btn-default">Cancel</a>
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>        
</div>
<?php include(ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php'); ?>
