<?php
include "../config.php"; 

  if (isset($_POST['query'])) {
    
    $query = "SELECT * FROM  patients WHERE p_cardnumber LIKE '{$_POST['query']}%'";
    $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
        $p_id=$user['p_id'];
      $card=$user['p_cardnumber'];
      $name=$user['p_fullname'];
      $age=$user['p_ages'];
      $insurance=$user['p_insurance'];
      $samplecard = substr($card, 0, 6);
    

  echo "             
  <table class='table table-hover'>
  <thead>
    <tr style='background-color:#00A884; color:white;'>
    <th>Card Number</th>
      <th>Full Name</th>
      <th>Ages</th>
      <th>Insurance</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><b>$samplecard .... </b></td>
      <td> $name</td>
      <td>$age</td>
      <td>$insurance</td>
      <td><a href='make_consultant.php?patient=$p_id'><button class='btn' style='background-color:#00A884; color:white;'>Make Consultation</button></a></td>
      </tr>
  
  </tbody>
</table>";

    }

  } else {
    echo "<p style='color:red'>Patient Card not found...</p>";
  }

}
?>