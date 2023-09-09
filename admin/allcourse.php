<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="../student/style.css">
    <link rel="stylesheet" href="../css/addcourse.css">
</head>
<body>
   
    <div class="header">
        <div class="dashboard"><span ><img id ="logo" src="../student/logo.jpeg" alt="" srcset=""></span>Welcome   To  Admin Dashboard</div>
        <span class="welcomebar"><span id="name"> </span><a href="admindash.php">back to control panel</a></span>
    </div>
    <div class="about"><h1 style=" font-family:color:white; text-align:center;">All Courses </h1></div>
   
    <table  border="1" align="center" width="80%" style="margin-top:10px;margin-left:8%; "> 
    
   

<tr>

    <th style="text-align:center;">COURSE ID</th>
    <th style="text-align:center;">IMAGE</th>
    <th style="text-align:center;">COURSE NAME</th>
    <th style="text-align:center;"> COURSE FEES (RUPEE)</th>
    <th style="text-align:center;">DURATION (IN HOUR)</th>
</tr>
<?php
include("../dbcon.php");


$q="select * from course";
$run1=mysqli_query($con,$q);
$num=mysqli_num_rows($run1);

if($num<1)
{
   ?>
    <tr><td colspan="5" align="center">no records found</td></tr> 
    <?php
}
else
{
    $count=0;
    while($row=mysqli_fetch_assoc($run1))
    { $count++;
        ?>
        
        <tr>
    <td align="center"><?php echo $row['courseId']; ?> </td>
    <td align="center"><img src="<?php echo $row['image'];?>" alt="unable to fetch" style="border-radius:10px;width:80px; height:80px;"></td>
    <td align="center"><?php echo $row['courseName']?></td>
    <td align="center"> <?php echo $row['courseFees']?></td>
    <td  align="center"><?php  echo $row['courseDuration']?></td>
</tr>
    <?php
    }
}

?>

    </body>
    </html>
