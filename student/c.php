<?php 
$courseid=$_POST['courseid'];
$id=$_POST['student_id'];
 include('../dbcon.php');
 
  
 $q="select * from student where id=$id";
 $run=mysqli_query($con,$q);
 if(mysqli_num_rows($run)>0)
 $row=mysqli_fetch_array($run);
 
 $q1="select * from course where courseId=$courseid";
 $run1=mysqli_query($con,$q1);

 if(mysqli_num_rows($run1)>0)
 $row1=mysqli_fetch_array($run1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <style>
      .success  {
            font-size:20px;
            text-align:center;
        }
        .back
        {
            font-size:20px;
            text-align:center;
        }
        .card
        {   margin:auto;
            margin-top:10%;
            height:400px;
            width:400px;
           

        }
       
    </style>
</head>
<body>
   
    <div class="header">
        <div class="dashboard"><span ><img id ="logo" src="../dataimages/<?php echo $row['image'];?>" alt="" srcset=""></span>DASHBOARD</div>
           <span class="welcomebar">Hi <span id="name"> <?php echo $row['name'];?></span> Welcome To Dashboard</span>
    </div>

<div class="card">
    <img style="margin-left:30%;height:200px;width:200px; border-radius:50%;"src="image/success1.gif" alt="" srcset="">
    <span class="success"><h2><span style="color:green"> <?php echo $row['name'];?></span> You have <span id="status"> successfully </span> purchesed<span style="color:green"> <?php echo $row1['courseName'];?> </span>course</span>
    
    
</body>
</html>
<?php

include('../dbcon.php');
$course=$courseid;
$sid=$row['id'];

$q3="SELECT * FROM course_purchaged WHERE studentId = '$sid' AND courseId = '$course' ";
$run3=mysqli_query($con,$q3);
$num3=mysqli_num_rows($run3);

if($num3>0)
{
    ?>
    <script>
        alert("already enrolled");
        
        document.getElementById("status").innerHTML = "already";
        

        
    </script>
    <?php
}
else{
    $q2="INSERT INTO `course_purchaged`(`studentId`, `courseId`) VALUES ('$sid','$course')";
    $run2=mysqli_query($con,$q2);

    if($run2== true)
    {
      ?>
 <script>
          alert("purchaged succesfully");

          </script>
   <?php

}
}

    
?>