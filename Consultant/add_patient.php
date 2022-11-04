


<?php
include "../config.php"; 
 
    // Initialize the session

    session_start();
    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

      header("location: ../index.php");

      exit;

    }


if(isset($_POST['save_patient']))
{
$card=mysqli_real_escape_string($connection,$_POST['cardnumber']);
$consultant_id=$_SESSION['user_id'];
$a=mysqli_real_escape_string($connection,$_POST['fullname']);
$b=mysqli_real_escape_string($connection,$_POST['email']);
$c=mysqli_real_escape_string($connection,$_POST['phonenumber']);
$d=mysqli_real_escape_string($connection,$_POST['idnumber']);
$e=mysqli_real_escape_string($connection,$_POST['age']);
$f=mysqli_real_escape_string($connection,$_POST['insurancetype']);



$slquery2 = "SELECT p_email  FROM   patients WHERE p_email = '$b' ";
$selectresult2 = mysqli_query($connection,$slquery2);

if(mysqli_num_rows($selectresult2)>0)
{
	 echo " <script> alert('Patient Email Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}
$phonenumber = "SELECT p_phonenumber  FROM   patients WHERE p_phonenumber = '$c' ";
$selectphonenumber = mysqli_query($connection,$phonenumber);

if(mysqli_num_rows($selectphonenumber)>0)
{
	 echo " <script> alert('Patient Phone Number Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}
$idnumber = "SELECT p_idnumber  FROM   patients WHERE p_idnumber = '$d' ";
$selectidnumber = mysqli_query($connection,$idnumber);

if(mysqli_num_rows($selectidnumber)>0)
{
	 echo " <script> alert('Patient ID Number Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}


$cardnumber = "SELECT p_cardnumber  FROM   patients WHERE p_cardnumber = '$card' ";
$selectcardnumber = mysqli_query($connection,$cardnumber);

if(mysqli_num_rows($selectcardnumber)>0)
{
	 echo " <script> alert('Patient CARD Number Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}


else{
// Query for insertion data into database  
$query=mysqli_query($connection,"insert into  patients
(consultant_id,p_cardnumber,p_fullname,p_email,p_phonenumber,p_idnumber,p_ages,p_insurance,registration_date)
values('$consultant_id','$card','$a','$b','$c','$d','$e','$f',NOW())");
if($query)
{
	echo " <script> alert('Patient Added Successfully') </script> ";
header("Refresh: 1; url= add_patient.php");

}
else
{
	echo " <script> alert('Fail') </script> ";
	header("Refresh: 1; url= add_patient.php");

}


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
			

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
                        <i class=" micon fa fa-user" aria-hidden="true"></i> <span class="mtext">Patients</span>
						</a>
						<ul class="submenu">
							<li><a href="add_patient.php">Add Patient</a></li>                        
							
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
                        <i class=" micon fa fa-user" aria-hidden="true"></i> <span class="mtext">My Consultation </span>
						</a>
						<ul class="submenu">
							<li><a href="p_laboratory_test.php">P_Laboratory Test </a> </li>  
							<!-- <li><a href="add_patient.php">P_Finish Treatment</a></li>                         -->
							
						</ul>
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
							<h4 class="text-green h4">ADD NEW PATIENT</h4></div>				
					</div>
                    <br>

 
<form action="" method="POST">
    <p style="color:red;">  Fields With <b>*</b> Is Required </p>

    <div class="form-group row" style="background-color:#00A884; padding: 20px;">
		<label class="col-sm-12 col-md-4 col-form-label" style="color:white;">MED BOOK ID NUMBER:</label>
		<div class="col-sm-8 col-md-8">
			<input class="form-control"  minlength="10" readonly maxlength="10" type="text" name="cardnumber" value="<?php
$length = 10;    
echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),3,$length);
?>" required placeholder="Please Provide MEB BOOK ID NUMBER">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Full Name: <b style="color:red;">*</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="fullname" required placeholder="Please Provide  Full Name">
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Email:</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="email" placeholder="Please Provide  Email Address"  type="email">
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="phonenumber" placeholder="Please Provide Phone Number" minlength="10" maxlength="10"  pattern="[0-9]+"   type="text">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">ID Number</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="idnumber" placeholder="Please Provide National Identification Number" minlength="16" maxlength="16"  pattern="[0-9]+"  type="text">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Ages:<b style="color:red;">*</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="age" placeholder="Please Provide Patient Age" minlength="1" maxlength="3"  pattern="[0-9]+" required  type="text">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Insurance Type:<b style="color:red;">*</b></label>
        <div class="col-sm-12 col-md-10">
		<select class="form-control form-control-lg" name="insurancetype" required>
                          <option value="">Select Your Insurance</option>
                            <option value="RSSB">RSSB</option>
                                <option value="PRIRME INSURANCE">PRIRME INSURANCE</option>
                                <option value="MITUELE">MITUELE</option>
                                <option value="MMI">MMI</option>
                                <option value="RAMA">RAMA</option>
                            </select>
	</div></div>

	
	<button class="btn btn-success" type="submit" name="save_patient">SAVE USER</button>
</form>
							
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