


<?php
include "../config.php"; 
 
    // Initialize the session

    session_start();
    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

      header("location: ../index.php");

      exit;

    }


if(isset($_POST['save_user']))
{

$a=mysqli_real_escape_string($connection,$_POST['fullname']);
$b=mysqli_real_escape_string($connection,$_POST['email']);
$c=mysqli_real_escape_string($connection,$_POST['phonenumber']);
$d=mysqli_real_escape_string($connection,$_POST['idnumber']);
$e=mysqli_real_escape_string($connection,$_POST['usertype']);
$f=mysqli_real_escape_string($connection,$_POST['password']);



$slquery2 = "SELECT user_email  FROM  user WHERE user_email = '$b' ";
$selectresult2 = mysqli_query($connection,$slquery2);

if(mysqli_num_rows($selectresult2)>0)
{
	 echo " <script> alert('User Email Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}
$phonenumber = "SELECT user_phone_number  FROM  user WHERE user_phone_number = '$c' ";
$selectphonenumber = mysqli_query($connection,$phonenumber);

if(mysqli_num_rows($selectphonenumber)>0)
{
	 echo " <script> alert('User Phone Number Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}
$idnumber = "SELECT idnumber  FROM  user WHERE idnumber = '$d' ";
$selectidnumber = mysqli_query($connection,$idnumber);

if(mysqli_num_rows($selectidnumber)>0)
{
	 echo " <script> alert('User ID Number Is Exist In MED BOOK SYSTEM') </script> ";
	//  header("Refresh: 1; url= Consultant/dashboard.php");
}

else{
// Query for insertion data into database  
$query=mysqli_query($connection,"insert into user
(user_full_name,user_email,user_phone_number,idnumber,user_type,user_password,user_regitration_date)values('$a','$b','$c','$d','$e','$f',NOW())");
if($query)
{
	echo " <script> alert('Account Created Successfully') </script> ";
header("Refresh: 1; url= add_user.php");

}
else
{
	echo " <script> alert('Fail To Create Account') </script> ";
	header("Refresh: 1; url= add_user.php");

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
						
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
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
                        <i class=" micon fa fa-user" aria-hidden="true"></i> <span class="mtext">Med Book Users</span>
						</a>
						<ul class="submenu">
							<li><a href="add_user.php">Add User</a></li>
                            <li><a href="user_list.php">User List</a></li>
							
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
							<h4 class="text-green h4">ADD USER</h4></div>				
					</div>
                    <br>

         
<form action="" method="POST">
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Full Name:</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="text" name="fullname" required placeholder="Please Provide  Full Name">
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Email:</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="email" placeholder="Please Provide  Email Address" required type="email">
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="phonenumber" placeholder="Please Provide Phone Number" minlength="10" maxlength="10"  pattern="[0-9]+" required  type="text">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">ID Number</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="idnumber" placeholder="Please Provide National Identification Number" minlength="16" maxlength="16"  pattern="[0-9]+" required  type="text">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">User Type</label>
        <div class="col-sm-12 col-md-10">
		<select class="form-control form-control-lg" name="usertype" required>

                            <option value="">Select User</option>
                                <option value="Admin">Admin</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Consultant">Consultant</option>
                                <option value="Laboratory">Laboratory</option>
                            </select>
	</div></div>

	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Password</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="password" Placeholder="Provide User Password" required type="password">
		</div>
	</div>
	<button class="btn btn-success" type="submit" name="save_user">SAVE USER</button>
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