<?php
	session_start();
  	// include_once('authentication.php');
	include_once('../classes/User.php');
	include_once('../classes/Admin.php');
	$user = new User();
	$admin = new Admin();
	$students = $user->getStudents();
	$payments = $user->getStudentsPayment();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dashboard - SUG KSUSTA</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
	<link href="assets/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
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
					<h1 class="h3 mb-3">Dashboard</h1>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Students</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo array_sum($admin->totalStudents()) ;?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Male</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo array_sum($admin->totalMale()) ;?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<span>&#8358;</span>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">&#8358;<?php echo array_sum($admin->totalPayment());?>.00</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Female</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo array_sum($admin->totalFemale()) ;?></h>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Payment</h5>
								</div>
								<div class="card-body py-3 ">
										<table class="table table-responsive table-hover ">
											<thead>
												<tr>
													<th>Name</th>
													<th>Admission Number</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach($payments as $payment): ?>
											<tr>
												<td><?php echo $payment['fullname']; ?></td>
												<td><?php echo $payment['admission_number']; ?></td>
												<td><span>&#8358;</span><?php echo $payment['amount']; ?>.00</td>
											</tr>	
											<?php endforeach; ?>									
										</tbody>
										</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Registered Students</h5>
								</div>
								<div class="card-body">
									<div class="container table-container">
									<table class="table table-hover my-0 display table-sm" id="myTable">
										<thead>
											<tr>
												<th>Name</th>
												<th class="d-none d-xl-table-cell">Reg. No</th>
												<th>Department</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($students as $student): ?>
											<tr>
												<td><?php echo $student['name']; ?></td>
												<td><?php echo $student['admission_number']; ?></td>
												<td><?php echo $student['department']; ?></td>
											</tr>	
											<?php endforeach; ?>									
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<!-- footer -->
			 <?php include_once('includes/footer.php'); ?>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="assets/js/app.js"></script>
	<script>	
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
</body>

</html>