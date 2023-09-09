
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="css/addstudent.css">
    
</head>
<body>
    <div class="headbar">
<a  href="admindash.php"style=" float:left; color:blue; ">back to dashboard</a>
<a href="logout.php" style=" float:right; margin-right:20px; margin:bottom:30px;color:red; ">logout</a></h3>
   
 <h2  style="margin-top:30px; COLOR:WHITE;" align="center">WELCOME TO DASHBOARD</h2>
 </div>
<form action="test1.php" method="post" enctype="multipart/form-data">
<table align="center" id="table1" >
<tr>
    <th>Adhar number</th>
    <td><input type="text" name="adhar_no" required></td>
</tr>    
<tr>
    <th>Full Name</th>
    <td><input type="text" name="name" required></td>
</tr>    
<tr>
    <th>City</th>
    <td><input type="text" name="city" required></td>
</tr>    
<tr>
    <th> Contact Number</th>
    <td><input type="text" name="pcon" required></td>
</tr>    
<tr>
    <th>course</th>
    <td><input type="text" name="course" required></td>
</tr>    
<tr>
    <th>email-id</th>
    <td><input type="email" name="email_id" required></td>
</tr>    
<tr>
    <th>photograph section</th>
    <td><input type="file" name="simg" required></td>
</tr>  
<tr>
    <td colspan="2" align='center'><input type="submit" name="submit" value="submit"></td>

</tr>
</table> 
</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{  
    include('dbcon.php');
    $adhar_number=$_POST['adhar_no'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $phone_number=$_POST['pcon'];
    $course=$_POST['course'];
    $email_id=$_POST['email_id'];
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    $destination='dataimages/'.$imagename;

    move_uploaded_file($tempname,"dataimages/$imagename");
    

    $q="INSERT INTO `student1`( `adhar_number`, `name`, `course`, `phone_number`, `email_id`,`city`,`image`)
     VALUES ('$adhar_number','$name','$course','$phone_number','$email_id','$city','$destination')";
    $run=mysqli_query($con,$q);
    if($run== true)
    {
        ?>
        <script>
            alert("record inserted successfully");
            </script>
            <?php

    }
}
?>
 