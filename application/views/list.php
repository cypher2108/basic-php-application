<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://kit.fontawesome.com/08bbafbe03.js" crossorigin="anonymous"></script>
	<title>php App-View User</title>
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
</head>
<body>
<div class="navbar navbar-dark bg-dark">
	<div class="container ">
		<a href="#" class="navbar-brand">php-project</a>
	</div>
</div>

<div class="container" style="padding-top: 12px;">
	<div class="row ">
		<div class="col-6" ><h3>View Users</h3></div>
		<div class="col-6 text-right"><a href="<?php echo base_url().'index.php/user/create'; ?>" class="btn btn-primary">Create</a></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th width="100">Edit</th>
					<th width="100">Delete</th>
				</tr>

				<?php if (!empty($users)) {
					foreach ($users as $user) { ?>
						<tr>
							<td><?php echo $user['user_id'] ?></td>
							<td><?php echo $user['name'] ?></td>
							<td><?php echo $user['email'] ?></td>
							<td>
								<a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id'];?>"
								   class="btn btn-primary"><i class="fas fa-edit ">Edit</i></a>
							</td>

							<td>
								<a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id']?>"
								   class="btn btn-danger"><i class="fas fa-trash-alt ">Delete</i></a>
							</td>
						</tr>
					<?php }
				} else { ?>
					<tr>
						<td colspan="5"></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

</div>
</body>
</html>

