<?php
	session_start();
  	include_once('authentication.php');
	include_once('../classes/Admin.php');
	$admin = new Admin();
	$users = $admin->getAllAdmin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admins - SUG KSUSTA</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<?php include_once('includes/sidebar.php'); ?>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle"><i class="hamburger align-self-center"></i></a>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Admins Table</h1>
					<div class="row">
                        <div class="mb-3 mt 3">
                            <?php include_once('../message.php'); ?>
                        </div>
						<div class="col-12 col-lg-12 col-xxl-12">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Admins</h5>
								</div>
								<div class="card-body">
									<div class="container table-container">
										<table class="table table-hover my-0 display" id="myTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>Phone</th>
													<th>Update</th>
													<th>Delete</th>
													
												</tr>
											</thead>
											<tbody>
												<?php foreach($users as $user): ?>
												<tr>
													<td><?php echo $user['name']; ?></td>
													<td><?php echo $user['phone']; ?></td>
													<td><a href="update-admin.php?id=<?php echo $user['id']; ?>" class="text-decoration-none btn btn-success btn-sm">Update</a></td>
													<td><a href="processes/delete-admin-process.php?id=<?php echo $user['id']; ?>" class="text-decoration-none btn btn-danger btn-sm">Delete</a></td>
												</tr>	
												<?php endforeach; ?>									
											</tbody>
										</table>
										<!-- update password form -->
                                        <div class="mt-5 mb-5">
                                            <form action="processes/update-admin-password-process.php" method="post">
                                                <h3 class="text-center">Update Admin Password</h3>
                                                <div class="row justify-content-center mt-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input type="text" name="uname" class="form-control" placeholder="enter name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="password" name="pwd"  class="form-control"  placeholder="enter password" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="password" name="cpwd" class="form-control"  placeholder="enter confirm password" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button type="submit" name="submit" class="form-control btn btn-success btn-sm w-50" >Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<?php include_once('includes/footer.php'); ?>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="assets/js/app.js"></script>
	<script>	
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
</body>

</html>