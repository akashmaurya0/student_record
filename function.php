<?php

function showdetails($standard,$rollno)
{   include('dbcon.php');
    $q="select * from student where rollno=$rollno and standard='$standard'";
    $run=mysqli_query($con,$q);
    if(mysqli_num_rows($run)>0)
   { $row=mysqli_fetch_array($run);
       ?>
       <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Student,s information</title>
           <style>
            #button
            {

                position:relative;
                margin-left:80%;
                font-size:16px;
                background-color:skyblue;
                 height: 40px;
                 width: 180px;
                 font-weight:bold;
            }
            #adash{
                text-decoration:none;
            }
           </style>
       </head>
       <body >
            <form action="student/student_dashboard.php" method="post">
           <table style="border:2px solid black;width:600px; margin-left:28%; margin-bottom:10%;">
               <tr >
                   <th style="border-bottom: 2px solid black;" colspan="3" align="center" >
                       Student's Detail
                   </th>
               </tr>
               <tr>
                   <td style="border-bottom: 2px solid black;" align="center"rowspan="5">
                   <img style="max-height:200px; max-width:150px;" src="dataimages/<?php echo $row['image'];?>" alt="unable to load img"></td>
                    <th   style=" text-align:left;border-bottom: 2px solid black;">Roll Number</th> 
                    <td style="border-bottom: 2px solid black;"><?php echo $row['rollno'] ;?></td>              
                </tr>
                <tr>
                 
                    <th style="text-align:left; border-bottom: 2px solid black;">Name</th> 
                    <td style="border-bottom: 2px solid black;"><?php echo $row['name'] ;?></td>              
                </tr>
                <tr>
                 
                    <th style="text-align:left; border-bottom: 2px solid black;">Standard</th> 
                    <td style="border-bottom: 2px solid black;"><?php echo $row['standard'] ;?></td>              
                </tr>
                <tr>
                 
                    <th style="text-align:left; border-bottom: 2px solid black;">Contact Number</th> 
                    <td style="border-bottom: 2px solid black;"><?php echo $row['pcon'] ;?></td>              
                </tr>
                <tr>
                 
                    <th style="text-align:left; border-bottom: 2px solid black;">City</th> 
                    <td style="border-bottom: 2px solid black;"><?php echo $row['city'] ;?></td>              
                </tr>
                <input type="hidden" name="student_id" value="<?php echo $row['id'] ;?>">
                <tr><td ><input type="submit" value="GO TO DASHBOARD" id="button"></td></tr>
                   
           </table>
           </form>
       </body>
       </html>
       <?php 

    }
    else{
        ?>
        <script>
            alert("no record found");
            </script>
        <?php
    }

}
?>