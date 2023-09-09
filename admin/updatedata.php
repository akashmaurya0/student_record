<?php

include('../dbcon.php');
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $id=$_POST['sid'];
    $pcon=$_POST['pcon'];
    $std=$_POST['std'];
   
    
    
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    $destination='../dataimages/'.$imagename;
    move_uploaded_file($tempname,"../dataimages/$imagename");
    $q="UPDATE `student` SET  `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcon` = '$pcon', `standard` = '$std', `image` = '$destination' WHERE `id` = $id";


$run=mysqli_query($con,$q);
if($run==true)
{  
?> 
      <script>
          alert("data updated successfully");
</script>
      <div class="card" style=" justify-content:center;align-items:center;text-align:center; margin:auto;height:140px; width:400px; background-image: linear-gradient(to right,rgb(180, 140, 253),rgb(248, 235, 237));">
      <h4 style="margin-top:20%;"> Data Updated successfully</h4>  
      <a align="center" style="margin-top:30%;  font-size:30px; text-decoration:none; " href="admindash.php"> Back To Dashboard</a>
        </div>
    <?php
}

?>