

<?php  
include_once('config.php');
session_start();
if (isset($_POST['login_user'])){
   
// Assigning POST values to variables.
$username = mysqli_real_escape_string($connection,$_POST['email']);
$user_type = mysqli_real_escape_string($connection,$_POST['user_type']);
$password = mysqli_real_escape_string($connection,$_POST['password']);


// CHECK FOR THE RECORD FROM TABLE
$query = "  SELECT * FROM `user` WHERE user_email='$username' and user_password='$password' and user_type='$user_type'";
 
$result = mysqli_query($connection , $query  ) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
    $row=mysqli_fetch_assoc( $result );
    $userid=$row['user_id'];  
    $fullname=$row['user_full_name'];  
    @$_SESSION['user_email'] = $username;
    $_SESSION['user_id'] = $userid; 
    $_SESSION['user_full_name'] = $fullname; 
    $_SESSION['password'] = $password; 
    // Start Validate User

if ($user_type=='Admin'){
echo " <script> alert('Welcome To MED BOOK') </script> ";
  header("Refresh: 1; url= Admin/dashboard.php");    
} 
if ($user_type=='Pharmacy'){
    echo " <script> alert('Welcome To MED BOOK') </script> ";
      header("Refresh: 1; url= Pharmacy/dashboard.php");
        
    } 
    if ($user_type=='Consultant'){
        echo " <script> alert('Welcome To MED BOOK') </script> ";
          header("Refresh: 1; url= Consultant/dashboard.php");
            
        } 
    if ($user_type=='Laboratory'){
            echo " <script> alert('Welcome To MED BOOK') </script> ";
              header("Refresh: 1; url= Laboratory/dashboard.php");
    }
         

// End Validate User

}



else{
    echo " <script> alert('Fail') </script> ";
    header("Refresh: 1; url= index.php");
//echo "Invalid Login Credentials";
}
}
    


?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Welcome To  - MEDBOOK</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	
</head>
<body class="login-page" style="background-color:#00A884;">
	
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4">
			
				</div>
				<div class="col-md-4 ">
					<div class="login-box bg-white box-shadow border-radius-10">
                        
						<div class="login-title">
                       <center> <span style="color:black; font-size:35px;"> <b>MED</b> <b style="color:#00A884;">BOOK</b> </span></center>
						</div>
						<form action="" method="POST">
							
							<div class="input-group custom">                             
								<input type="text" class="form-control form-control-lg" name="email" required placeholder="Provide Your Email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                            <div class="input-group custom">  
                               
                            <select class="form-control form-control-lg" name="user_type" required>
                            <option value="">Select User</option>
                                <option value="Admin">Admin</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Consultant">Consultant</option>
                                <option value="Laboratory">Laboratory</option>
                            </select>
				
								
							</div>

							<div class="input-group custom">
								<input type="password" required name="password" class="form-control form-control-lg" placeholder="Provide Your Password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										
										<button class="btn btn-lg btn-block" name="login_user" style="background-color:#00A884; color:white;" >Sign In</button>
									</div>
								
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>