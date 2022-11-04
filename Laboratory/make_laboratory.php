


<?php
include "../config.php"; 
 
    // Initialize the session

    session_start();
    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

      header("location: ../index.php");

      exit;

    }


if(isset($_POST['save_patient_laboratory']))
{
$p_id=$_GET['patient'];
$laboratory_id=$_SESSION['user_id'];
$a=mysqli_real_escape_string($connection,$_POST['consultation_id']);
$b=mysqli_real_escape_string($connection,$_POST['user_consultant_id']);
$c=mysqli_real_escape_string($connection,$_POST['laboratory_details']);

// Query for insertion data into database  
$query=mysqli_query($connection,"insert into  laboratory_test
(laboratory_user_id,patient_id,consultation_id,consultaant_user_id,laboratory_test_details,test_date_time)
values('$laboratory_id','$p_id','$a','$b','$c',NOW())");


$query=mysqli_query($connection,"UPDATE consultation SET laboratory_status='Tested' WHERE cons_id='$a'");
if($query)
{
	echo " <script> alert('Patient Laboratory Test  Successfully') </script> ";
header("Refresh: 0; url= dashboard.php");

}
else
{
	echo " <script> alert('Fail') </script> ";
	header("Refresh: 10 url= dashboard.php");

}


}


 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>User List - MEDBOOK</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	
</head>
<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../vendors/images/photo1.png" alt="">
						</span>
						<span class="user-name"><?php echo $_SESSION['user_full_name']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						
						<a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="add_user.php">
            <center> <span style="color:white; font-size:35px;"> <b>MED</b> <b style="color:#00A884;">BOOK</b> </span></center>
				
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
					</li>
			

					
					
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li class="dropdown">
						<a href="logout.php" class="dropdown-toggle no-arrow">
						<i class=" micon fa fa-sign-out" aria-hidden="true"></i> <span class="mtext">LOG OUT</span>
						</a>
						
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			
        <div class="pd-20 card-box mb-30">
        <div class="clearfix">
						<div class="pull-left">
							<h4 class="text-green h4">MAKE PATIENT LABORATORY TEST</h4></div>				
					</div>
                    <br>
                    <?php
$p_id=$_GET['patient'];
$cons_id=$_GET['consultation_id'];
$query = "SELECT * from  patients,consultation WHERE consultation.patient_id =patients.p_id AND consultation.cons_id='$cons_id' AND  patients.p_id='$p_id'";     
$rs_result = mysqli_query ($connection, $query);    
if(mysqli_num_rows($rs_result) > 0 ){  
while ($patient = mysqli_fetch_array($rs_result)) {    

 
?>

<table class='table' style="background-color:#00A884; padding: 10px; font-size:10px;">
    <tr><td><b>Full Name:</b></td> <td><?php echo $patient['p_fullname']; ?></td> 
    <td><b>Email:</b></td> <td><?php echo $patient['p_email']; ?></td> </tr>

    <tr><td><b>Phone Number:</b></td> <td><?php echo $patient['p_phonenumber']; ?></td> 
    <td><b>ID Number:</b></td> <td><?php echo $patient['p_idnumber']; ?></td> </tr>

    <tr><td><b>Ages:</b></td> <td><?php echo $patient['p_ages']; ?></td> 
    <td><b>Insurance:</b></td> <td><?php echo $patient['p_insurance']; ?></td> </tr>
	
</table>
<h6> Consultation Details:</h6><br>
<?php echo $patient['patient_consultation_details']; ?></p> 


 
<form action="" method="POST">
  <input type="hidden" value="<?php echo $patient['cons_id']; ?>"  name="consultation_id">
  <input type="hidden" value="<?php echo $patient['consultation_user_id']; ?>"  name="user_consultant_id">

                        <div class="html-editor pd-20 card-box mb-30">
					<p>Full Laboratory Test  Details: *</p>
					<textarea class="textarea_editor form-control border-radius-0" name="laboratory_details" required placeholder="Provide Laboratoey Test Full Details  ..."></textarea>
				</div>
              
	
	<button class="btn btn-success" type="submit" name="save_patient_laboratory">SAVE LABORATORY TEST</button>
</form>
<?php     
                }  
                }
                     
                else{
                 echo "<h5 style='color:red;'>No Blogs Available</h5>";
                }
            ?>

							
					</div>
			
			 <div class="footer-wrap pd-20 mb-20 card-box">
            © Copyright 2022 By MED BOOK. All Rights Reserved <b> Developed By Group 9</b>
			</div> 
		</div>
	</div>
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="../vendors/scripts/dashboard.js"></script>
</body>
</html>a