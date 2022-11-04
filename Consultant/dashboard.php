<?php
include "../config.php"; 
 
    // Initialize the session

    session_start();
    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

      header("location: ../index.php");

      exit;

    }?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard - MEDBOOK</title>

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo">                       <center> <span style="color:black; font-size:35px;"> <b>MED</b> <b style="color:#00A884;">BOOK</b> </span></center></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

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
			<a href="dashboard.php">
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
			<div class="row">
			<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
                            <i class="fa fa-user fa-5x" style="color:#00A884;" aria-hidden="true"></i>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
									
								<?php          
									     
									
										 $query = "SELECT * FROM  consultation ";
										  $result = mysqli_query($connection , $query  ) ;
										 $consultation = mysqli_num_rows($result);
										 echo $consultation;
														   ?>
								</div>
								<div class="weight-600 font-14">All Consultation</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30 ">
					<div class="card-box height-100-p widget-style1 ">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
                            <i class="fa fa-user fa-5x" style="color:#00A884;" aria-hidden="true"></i>

							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
									<?php          
									$user_id=$_SESSION['user_id'];      
									
$query = "SELECT * FROM consultation where consultation_user_id='$user_id'  AND  DATE(date_and_time)=CURDATE() ";
 $result = mysqli_query($connection , $query  ) ;
$cons = mysqli_num_rows($result);
echo $cons;
                  ?>	</div>
								<div class="weight-600 font-14">To Day Consultantion</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
                            <i class="fa fa-user fa-5x"  style="color:#00A884;" aria-hidden="true"></i>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
									
								<?php          
									     
									
$query = "SELECT * FROM patients ";
 $result = mysqli_query($connection , $query  ) ;
$patients = mysqli_num_rows($result);
echo $patients;
                  ?>
								</div>
								<div class="weight-600 font-14">Total MED BOOK Patient</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
                            <i class="fa fa-user fa-5x" style="color:#00A884;" aria-hidden="true"></i>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">
								<?php          
									     
									
										 $query = "SELECT * FROM user WHERE user_type='Laboratory' ";
										  $result = mysqli_query($connection , $query  ) ;
										 $patients = mysqli_num_rows($result);
										 echo $patients;
														   ?>
								</div>
								<div class="weight-600 font-14">Total Laboratory</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Detect The Patient Using Card Number</h4>					
						</div><br><br><br>
						
					</div>
				
												<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Search By Card Number</label>
							<div class="col-sm-12 col-md-8">
								<input class="form-control" autofocus name="search" id="search" autocomplete="off" required placeholder="Search Here By Card Number" type="text">
							</div>
						</div>
						<div id="output"></div>



 
  <script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'search_patient.php',
              method: 'POST',
              data: {query:query},
              success: function(data){

                $('#output').html(data);
                $('#output').css('display', 'block');

                $("#search").focusout(function(){
                    $('#output').css('display', 'block');
                });
                $("#search").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'none');
        }
      });
    });
  </script>
</div>
			<!-- <div class="footer-wrap pd-20 mb-20 card-box">
            © Copyright 2022 By Abelia Rwanda. All Rights Reserved <b> Developed By Group 9</b>
			</div> -->
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
</html>