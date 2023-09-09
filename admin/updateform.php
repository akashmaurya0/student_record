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
<?php
include('titlehead.php');

?>
<?php

 include('../dbcon.php');
 $sid=$_GET['sid'];
 $q="select * from student where id='$sid'";
 $run=mysqli_query($con,$q);
 $data=mysqli_fetch_array($run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit form</title>
</head>
<body>
<form action="updatedata.php" method="post" enctype="multipart/form-data">
<table align="center" border="1"  style="width:60%; margin-top:60px; margin-left:20%">
<tr>
    <th>roll number </th>
    <td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" required></td>
</tr>    
<tr>
    <th>full name</th>
    <td><input type="text" name="name" value="<?php echo $data['name']; ?>" required></td>
</tr>    
<tr>
    <th>city</th>
    <td><input type="text" name="city" value="<?php echo $data['city']; ?>" required></td>
</tr>    
<tr>
    <th>parent's contact number</th>
    <td><input type="text" name="pcon" value="<?php echo $data['pcon']; ?>" required></td>
</tr>    
<tr>
    <th>standard</th>
    <td><input type="text" name="std" value="<?php echo $data['standard']; ?>" required></td>
</tr>    
<tr>
    <th>image</th>
    <td><input type="file" name="simg"  required></td>
</tr>  
<tr>
    <td colspan="2" align='center'>
        <input type="hidden" name="sid" value="<?php echo $data['id'];?>">
        <input type="submit" name="submit" value="submit"></td>

</tr>
</table> 
</form>
</body>
</html>
</body>
</html>