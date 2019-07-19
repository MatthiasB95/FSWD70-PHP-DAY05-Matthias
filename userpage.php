<?php require_once 'dbconnect.php'; ?> 

<!DOCTYPE html>
<html>
<head>
   <title>User Page</title>

   <style type="text/css">
       .manageUser {
           width : 50%;
           margin: auto;
       }

        table {
           width: 100%;
            margin-top: 20px;
       }

   </style>

</head>
<body>

<div class ="manageUser">
   
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>User ID</th>
               <th>User Name</th>
               <th>User Email</th>
           </tr>
       </thead>
       <tbody>

            <?php
           $sql = "SELECT * FROM users";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<tr>
                       <td>" .$row['userId']."</td>
                       <td>" .$row['userName']."</td>
                       <td>" .$row['userEmail']."</td>
                     
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

            
       </tbody>
   </table>
   <a  href="logout.php?logout">Sign Out</a>
</div>

</body>
</html>