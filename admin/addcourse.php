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
    <div class="about"><h1 style=" font-family:color:white; text-align:center;">Add Courses Here</h1></div>
    <div id="form">
        <form action="addcourse.php" method="post" enctype="multipart/form-data">
            <table id="Table">
            <tr><td>Course Id</td><td><input type="text" name="courseid" required></td></tr>
            <tr><td>Course Name</td><td><input type="text" name="coursename" required></td></tr>
            <tr><td>Course Fees(in rupees)</td><td><input type="text" name="fees" required></td></tr>
            <tr><td>Duration(in hours)</td><td><input type="text" name="duration" required></td></tr>
            <tr><td>Image</td><td><input type="file" name="simg"  required></td></tr>
            <tr><td colspan="2" align="center"><input type="submit" name="submit"value="Add"></td></tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{  
    
   
    $courseid=$_POST['courseid'];
    $coursename=$_POST['coursename'];
    $fees=$_POST['fees'];
    $duration=$_POST['duration'];
    
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    $destination='../courseimage/'.$imagename;

    move_uploaded_file($tempname,"../courseimage/$imagename");
    include('../dbcon.php');

    $q="INSERT INTO `course`(`courseId`, `courseName`, `courseFees`, `courseDuration`, `image`)
     VALUES ('$courseid','$coursename','$fees','$duration','$destination')";
    $run=mysqli_query($con,$q);
    if($run== true)
    {
        ?>
        <script>
            alert("record inserted successfully");
            </script>
            <?php

    }
    else
    {
        ?>
        <script>
            alert("data already exist");
            </script>
            <?php

    }
}
?>