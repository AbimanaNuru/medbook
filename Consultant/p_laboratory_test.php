


<?php
include "../config.php"; 
 
    // Initialize the session

    session_start();
    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

      header("location: ../index.php");

      exit;

    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Patient With Laboratory Test - MEDBOOK</title>

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
							<li><a href="p_laboratory_test.php">P_Laboratory Test</a></li>  
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
			
        <div class="card-box mb-30">
					<div class="pd-20">
					<h4 class="text-blue h4">Patients With Laboratory Test</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Full Name</th>
									<th>Age</th>
									<th>Insurance</th>
							
									<th>Phone Number</th>
									<th> ID Number</th>
                                    <th> Laboratory</th>
                                    <th> Action</th>
								</tr>
							</thead>
                            <?php
									$user_id=$_SESSION['user_id'];      
$query = "SELECT * from patients,consultation WHERE consultation.patient_id= patients.p_id  AND  consultation.treatment_process='Laboratory Process' 
AND consultation.consultation_user_id='$user_id'";     
$rs_result = mysqli_query ($connection, $query);    
if(mysqli_num_rows($rs_result) > 0 ){  
while ($p_laboratory_test = mysqli_fetch_array($rs_result)) {    
$patient_id=$p_laboratory_test['p_id'];
$consultation_id=$p_laboratory_test['cons_id'];
 
?>
							<tbody>
								
								<tr>
									<td class="table-plus"><?php echo $p_laboratory_test['p_fullname']; ?></td>
									<td><?php echo $p_laboratory_test['p_ages']; ?></td>
									<td><?php echo $p_laboratory_test['p_insurance']; ?></td>
						
									<td><?php echo $p_laboratory_test['p_phonenumber']; ?></td>
									<td><?php echo $p_laboratory_test['p_idnumber']; ?></td>
                                    <td><?php  $labo=$p_laboratory_test['laboratory_status'];
                                    if($labo=='Tested')
                                    {  echo "<span class='label label-success' style='background-color:#00A884; padding:10px; color:white;'>
                                        <i class='fa fa-check' ></i>
                                         Tested</span>"; 
                                     }  
                                    else{
                                        echo "<span class='label label-success' style='background-color:red; padding:10px; color:white;'>
                                        <i class='fa fa-times-circle' ></i>
                                         Not Tested</span>";
                                    }                                  
                                  ?></td>

<td>
<?php  $labo=$p_laboratory_test['laboratory_status'];
$decision=$p_laboratory_test['decision'];
                                    if($labo=='Tested'&&empty($decision))
                                    {  
                                         echo "<a href='make_decision.php?patient=$patient_id&&consultation=$consultation_id'>
                                         <button class='btn btn-primary'> Decision</button></a>";                          
                                             }  

                                             elseif($labo=='Tested'&&!empty($decision))
                                             {  
                                                  echo "
                                                  <button class='btn btn-success'> Done</button>";                          
                                                      } 
                                    else{
                                       
                                    }     
?></td>
								</tr>
								
							</tbody>

                            <?php     
                }  
                }
                     
                else{
                 echo "<h5 style='color:red;'>No Consultation Available</h5>";
                }
            ?>
						</table>
					</div>
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
    <script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>a