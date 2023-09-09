<?php
$id=$_GET['sid'];
include('../dbcon.php');
$q="delete from student where id=$id";
$run=mysqli_query($con,$q);
if($run==true)
{  
?> 
      <script>
          alert("data deleted successfully");
</script>
<div class="card" style=" justify-content:center;align-items:center;text-align:center; margin:auto;height:140px; width:400px; background-image: linear-gradient(to right,rgb(180, 140, 253),rgb(248, 235, 237));">
      <h4 style="margin-top:20%;"> Data Deleted successfully</h4>  
      <a align="center" style="margin-top:30%;  font-size:30px; text-decoration:none; " href="admindash.php"> Back To Dashboard</a>
        </div>
        
    <?php
}

?>
