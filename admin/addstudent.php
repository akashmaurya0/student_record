
<?php
include('titlehead.php');

?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
<table align="center" id="table1" >
<tr>
    <th>ROLL NUMBER</th>
    <td><input type="text" name="rollno" required></td>
</tr>    
<tr>
    <th>FULL NAME</th>
    <td><input type="text" name="name" required></td>
</tr>    
<tr>
    <th>CITY</th>
    <td><input type="text" name="city" required></td>
</tr>    
<tr>
    <th>PARENT'S CONTACT NUMBER</th>
    <td><input type="text" name="pcon" required></td>
</tr>    
<tr>
    <th>STANDERD</th>
    <td><input type="text" name="std" required></td>
</tr>    
<tr>
    <th>IMAGE</th>
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
    include('../dbcon.php');
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $pcon=$_POST['pcon'];
    $std=$_POST['std'];
    $imagename=$_FILES['simg']['name'];
    $tempname=$_FILES['simg']['tmp_name'];
    $destination='../dataimages/'.$imagename;

    move_uploaded_file($tempname,"../dataimages/$imagename");



    $query = "SELECT * FROM student WHERE rollno = '$rollno' AND  standard= '$std' ";
    $result = mysqli_query($con, $query);
    $number = mysqli_num_rows($result);

    if($number>0)
    {
        ?>
        <script>
            alert("already enrolled");
            
        </script>
        <?php
    }
    else{
        
        $q="INSERT INTO `student`( `rollno`, `name`, `city`, `pcon`, `standard`,`image`)
        VALUES ('$rollno','$name','$city','$pcon','$std','$destination')";
       $run=mysqli_query($con,$q);
       if($run== true)
       {
           ?>
           <script>
               alert("record inserted successfully");
               header('location:../login.php');
               </script>

               <?php

       header('location:./addstudent.php');
       exit;
    }
}
}

?>
 