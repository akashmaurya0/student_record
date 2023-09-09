<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
    <div class="outer">
<h1 align="center">Admin login</h1>    
<form action="login.php" method="post">

<table align="center">
    <tr>
        <td>Username</td>
        <td><input  type="text" name="uname" required></td>
    </tr>
    <tr>
        <td>password</td>
        <td><input type="password" name="pass" required></td>
    </tr>
    <tr>
        <td colspan="2"  align="center"><input type="submit" value="login" name="login"></td>
    </tr>
</table>

</form>
<table align="center" width="50%">
    <tr><th><a style="font-size:18px; text-decoration:none;"href="index.php">Back to Student panal</a></th></tr>
</table>
</div>
</body>
</html>
<?php
include('dbcon.php');
if(isset($_POST['login']))
{
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $q="select * from admin where username='$username' and password='$password'";
    $result=mysqli_query($con,$q);
    $row =mysqli_num_rows($result);
    if($row <1)
    {
        ?>

        <script>
         alert('username or password is incorrect');
         window.open('login.php','_self');
        </script>
        <?php 
    }
    else
    {
        $data=mysqli_fetch_assoc($result);
        $id=$data['id'];
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }

}  
?>