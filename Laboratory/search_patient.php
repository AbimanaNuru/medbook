<?php
include "../config.php"; 

  if (isset($_POST['query'])) {
    
    $query = "SELECT * FROM  patients,consultation WHERE consultation.patient_id =patients.p_id  AND consultation.laboratory_status!='Tested' AND consultation.treatment_process='Laboratory Process' AND  patients.p_cardnumber LIKE '{$_POST['query']}%'";
    $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) > 0) {
     while ($consultation_ = mysqli_fetch_array($result)) {
        $p_id=$consultation_['p_id'];
      $card=$consultation_['p_cardnumber'];
      $name=$consultation_['p_fullname'];
      $age=$consultation_['p_ages'];
      $insurance=$consultation_['p_insurance'];
      $samplecard = substr($card, 0, 6);
      $date_time=$consultation_['date_and_time'];

      $consultation_details=$consultation_['patient_consultation_details'];
      $sampleconsultation_details = substr($consultation_details, 0, 40);
      $cons_id=$consultation_['cons_id'];

  echo "             
  <table class='table table-hover'>
  <thead>
    <tr style='background-color:#00A884; color:white;'>
    <th>Card Number</th>
      <th>Full Name</th>
      <th>Ages</th>
      <th>Insurance</th>
      <th>Date & Time</th>
      <th>C_Details</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><b>$samplecard .... </b></td>
      <td> $name</td>
      <td>$age</td>
      <td>$insurance</td>
      <td>$date_time</td>
      <td>$sampleconsultation_details</td>
      <td><a href='make_laboratory.php?patient=$p_id&consultation_id=$cons_id'><button class='btn' style='background-color:#00A884; color:white;'>Laboratory</button></a></td>
      </tr>
  
  </tbody>
</table>";

    }

  } else {
    echo "<p style='color:red'>Patient Card not found...</p>";
  }

}
?>