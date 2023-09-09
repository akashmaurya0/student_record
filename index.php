<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Record Management System</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="title" >
       <h1>STUDENT RECORD MANAGEMENT SYSTEM</h1>
    </div>
    <div class="menu">
            <ul >
                <li><a href="index.php" style="color:white;"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="admin/addstudent.php" style="color:white;"><i class="fa-regular fa-registered"></i>Registration</a></li>
                
                <li><a href="login.php"style="color:white;"><i class="fa-solid fa-right-to-bracket"></i>Admin login</a></li>
            </ul>
        </div>
    <div class="container">
        
    <script src="https://kit.fontawesome.com/9a9a5122fb.js" crossorigin="anonymous"></script>
        <div class="table-container">
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td colspan="2" style="font-size: 25px; border-bottom: 1px solid black;" align="center">
                            Student's Information
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Choose Standard</td>
                        <td>
                            <select name="std">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                                <option value="9">9th</option>
                                <option value="10">10th</option>
                                <option value="11">11th</option>
                                <option value="12">12th</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Enter Roll Number</td>
                        <td>
                            <input type="text" name="rollno" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Find Record" name="submit" id="btn">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="record">
        <?php
        if(isset($_POST['submit']))
        {
            $standard=$_POST['std'];
            $rollno=$_POST['rollno'];
            include('dbcon.php');
            include('function.php');
            showdetails($standard,$rollno);
        }
        ?>
    </div>
</body>

</html>