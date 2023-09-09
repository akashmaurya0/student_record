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
    <title>upadte detials</title>
    <style>
        th
        {
            text-align:center;
            
        }
        table
        {
            border:1px solid black;
        }
    </style>
   
</head>
<body>
   <table  height="50px"align="center" style="margin-left:24%;" >
       <form action="deletestudent.php" method="post">
       <tr>
               <th STYLE="font-size:15px;">ENTER STANDERD</th>
               <td><input type="text" name="standard" placeholder="enter standard" required></td>
</tr>
<tr>
               <th align="right"STYLE="font-size:15px;">ENTER SUTDENT'S NAME</th>
               <td><input type="text" name="stuname" placeholder="enter student's name " required></td>
</tr>
<tr>
               <td align="center" colspan="2"><input type="submit" name="submit"value="search"></td>
           </tr>
       </form>
   </table> 

<table  border=" 1" align="center" width="80%" style="margin-top:10px;margin-left:8%; ">
    <tr>
        <th>NO </th>
        <th> IMAGE</th>
        <th>NAME</th>
        <th> ROLL NUMBER</th>
        <th>DELETE</th>
    </tr>
   
       
    <?php
if(isset($_POST['submit']))
{
    include("../dbcon.php");
   
    $standard=$_POST['standard'];
    $name=$_POST['stuname'];
    $q="select * from student where standard='$standard' and name like '%$name%' ";
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
        <td align="center"><a style="text-decoration:none;" href="deleteform.php?sid=<?php echo $row['id'];?>">delete</a></td>
    </tr>
            <?php     
        }
    }
    }
?>
</table>
</body>
</html>