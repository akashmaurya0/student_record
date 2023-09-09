
<?php 
 include('../dbcon.php');
 $id=$_POST['student_id'];
 $q="select * from student where id=$id";
 $run=mysqli_query($con,$q);
 if(mysqli_num_rows($run)>0)
 $row1=mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<style>
  .mycourses
{
    position:absolute;
    top:200px;
    left:0;
    height:300px;
    width:100px;
    border: 1px solid rebeccapurple;
    background-color: rgb(14, 192, 177);
}
</style>
<body>
   
    <div class="header">
        <div class="dashboard"><span ><img id ="logo" src="../dataimages/<?php echo $row1['image'];?>" alt="" srcset=""></span>DASHBOARD</div>
<span class="welcomebar">Hi <span id="name"> <?php echo $row1['name'];?></span> Welcome To Dashboard</span>
    </div>
   <!-- courses -->
    <div class="mycourses">

<table>
  <th>my courses</th>

<!-- /////////////////////////// -->


<?php
$query = "select * from course_purchaged where studentId = $id";
$run4 = mysqli_query($con, $query);

if (!$run4) {
    die("Query failed: " . mysqli_error($con));
}

$num4= mysqli_num_rows($run4);

if ($num4>0) {
    // Records found, display them
    while ($row = mysqli_fetch_assoc($run4)) {

      
        // Display the rows here
  ?>
  <tr>
    <td></td>
  </tr>
  <?php


    }
} else {
    // No records found
    ?>
    <tr><td colspan="5">No records found</td></tr>
    <?php
}
?>


<!-- //////////////////////////////// -->
</table>







    </div>
    <div class="about"><h1 style="color:white; text-align:center;">List Of Avilable Courses</h1></div>
   <div class="courseList">
    <table>
    <?php
    include("../dbcon.php");
   
    
    $q="select * from course";
    $run2=mysqli_query($con,$q);
    $num=mysqli_num_rows($run2);

    if($num<1)
    {
       ?>
        <tr><td colspan="5">no records found</td></tr> 
        <?php
    }
    else
    {
        $count=0;
        while($row=mysqli_fetch_assoc($run2))
        { $count++;
            ?>
              <tr class="box"><td class="image">
                <img height="100px" width="100px" src="<?php echo $row['image'];?>" alt="unable to load"></td>
              <td class="content">Course : <?php echo $row['courseName'];?>
             </br> Duration: <?php echo $row['courseDuration'];?>
            </br>Course Fees : <?php echo $row['courseFees'];?> </br>Cirtificate : yes</td>
              <td ><form action="c.php" method="post" >
              <!-- <input type="hidden" name="student_id" value="<?php echo $row['id'];?>" > -->
                <input type="hidden" name="courseid" value="<?php echo $row['courseId'];?>">
                <input type="hidden" name="student_id" value="<?php echo $row1['id'];?>">
               
              <input  class="btn" type="submit" value="Enroll">
            </form>
        </td>
    </tr>
       
        <?php
        }
    }

     ?>
   
    </table>
   </div>
</body>
</html>