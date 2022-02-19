<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['subfull'])) {
    
    
    
    
 	$roll_no=$_POST['roll_no'];
 	$amount=$_POST['amount'];
 	$status=$_POST['status1'];
		$que="insert into student_fee(roll_no,amount,status)values('$roll_no','$amount','$status')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}


if (isset($_POST['subnot'])) {
 	$roll_no=$_POST['roll_no'];
 	$amount=$_POST['amount'];
 	$status=$_POST['status2'];
		$que="insert into student_fee(roll_no,amount,status)values('$roll_no','$amount','$status')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfully";
		}	
		else{
			echo " Insert Not Successfully";
		}
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Fee</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Student Fee Management System </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="student-fee.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Roll No:</label>
										<div class="d-flex">
											<input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No">
											<input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Press">
										</div>
									</div>
								</div>
								<div class="col-md-6 align-items-baseline pt-4">
								</div>
							</div>	
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
					    <div class="row">
						<section class="border mt-3 col-md-12">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr No.</th>
									<th>Roll No.</th>
									<th>Student Name</th>
									<th>Program</th>
									<th>Amount (Rs.)</th>
								</tr>
								<?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];


										$que="select roll_no,first_name,middle_name,last_name,course_code,email from student_info where roll_no='$roll_no' ";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
									?>
										<form action="student-fee.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<input type="hidden" name="roll_no" value=<?php echo $row['email'] ?> >
											<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<td><?php echo $row['course_code'] ?></td>
											<td><input type="text" name="amount" class="form-control" placeholder="Enter Amount for fee"></td>
											<input type="hidden" name="status1" value="Paid">
												<input type="hidden" name="status2" value="NotFullyPaid">

										</tr>
										
								<?php		
									}
									}
								?>
								<input type="submit" name="subfull" value="Fully Paid" >&nbsp;&nbsp;
								
									<input type="submit" name="subnot" value="Not Fully Paid" >

								</form>
							</table>				
						</section>
						
						
						<section class="border mt-3 col-md-12">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr No.</th>
									<th>Roll No.</th>
									<th>Student Name</th>
									<th>Status</th>
								
								</tr>
								<?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];


	$que1="select roll_no,first_name,middle_name,last_name,course_code from student_info where roll_no='$roll_no' ";
									$run1=mysqli_query($con,$que1);
									$row1=mysqli_fetch_array($run1);




										$que="select * from student_fee where roll_no='$roll_no' ";
									$run=mysqli_query($con,$que);
								$row=mysqli_fetch_array($run);
									?>
										
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
											<input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?> >
											<td><?php echo $row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'] ?></td>
											<td><?php echo $row['status'] ?></td>
									

										</tr>
										
								<?php		
									
									}
								?>
							
							</table>				
						</section>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

