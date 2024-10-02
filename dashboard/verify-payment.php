<?php
	session_start();
  	include_once('authentication.php');
	include_once('../classes/User.php');
	$user = new User();
	$payments = $user->getAllStudentsPayment();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>K-Transport | Payment Verification</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
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
					<h1 class="h3 mb-3">Payment</h1>
					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Students Payment</h5>
								</div>
								<div class="card-body">
									<div class="container table-container">
										<table class="table table-hover my-0 display" id="myTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>Reg. No</th>
													<th>Status</th>
													<th>Reference</th>
													<th>Amount(NGN)</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($payments as $payment): ?>
												<tr>
													<td><?php echo $payment['fullname']; ?></td>
													<td><?php echo $payment['admission_number']; ?></td>
													<td><?php echo $payment['status']; ?></td>
													<td><?php echo $payment['reference']; ?></td>
													<td><span>&#8358;</span>
													<?php echo $payment['amount']; ?>.00</td>
													<td><?php echo $payment['created']; ?></td>
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