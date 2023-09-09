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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All Records  </title>
</head>
<body>

<table  border="1" align="center" width="80%" style="margin-top:10px;margin-left:8%; "> 
    
        <tr height=100px><th  style="text-align:center; " colspan=5><span style=" text-decoration:underline;">ALL  RECORDS</span></th></tr>
    
    <tr>

        <th style="text-align:center;">NO </th>
        <th style="text-align:center;"> IMAGE</th>
        <th style="text-align:center;">NAME</th>
        <th style="text-align:center;"> ROLL NUMBER</th>
        <th style="text-align:center;">STANDARD</th>
    </tr>
  <?php
    include("../dbcon.php");
   
    
    $q="select * from student ";
    $run=mysqli_query($con,$q);
    $num=mysqli_num_rows($run);

    if($num<1)
    {
       ?>
        <tr><td colspan="5">no records found</td></tr> 
        <?php
    }
    else
    {
        $count=0;
        while($row=mysqli_fetch_assoc($run))
        { $count++;
            ?>
            
            <tr>
        <td align="center"><?php echo $count; ?> </td>
       <td align="center"><img src="<?php echo $row['image'];?>" alt="unable to fetch" style="max-width:100px;"></td>
        <td align="center"><?php echo $row['name']?></td>
        <td align="center"> <?php echo $row['rollno']?></td>
        <td  align="center"><?php  echo $row['standard']?></td>
    </tr>
        <?php
        }
    }

    ?>

   
</body>
</html>