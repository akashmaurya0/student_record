<?php
session_start();
if(isset($_SESSION['uid']))
{
    echo "";
}
else{
   header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../css/adminstyle1.css">
    
</head>
<body>
    <div class="outer">
        <div class="headbar">
    

        <a href="logout.php" style="text-decoration:none; float:right; margin-right:40px;color:black; ">logout</a>
   <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;padding:30px; color:black;" align="center">WELCOME TO DASHBOARD<h3 style="font-size:23px;"></h3></h1>
    
   </div>
   <ul>
       <li><a  style="font-size:23px; font-weight:bold;" href="addstudent.php">INSERT STUDENT'S DATA</a></li>
       <li><a  style="font-size:23px;font-weight:bold;" href="updatestudent.php">UPDATE STUDNT'S DATA</a></li>
       <li><a style= "font-size:23px;font-weight:bold;" href="deletestudent.php">REMOVE STUDENT'S DATA</a></li>
       <li><a style= "font-size:23px;font-weight:bold;" href="allrecord.php">SHOW ALL RECORDS</a></li>
       <li><a style= "font-size:23px;font-weight:bold;" href="addcourse.php">ADD COURSE</a></li>
       <li><a style= "font-size:23px;font-weight:bold;" href="allcourse.php">ALL COURSES</a></li>

   </ul>
    
   
     
        </div>
</body>
</html>