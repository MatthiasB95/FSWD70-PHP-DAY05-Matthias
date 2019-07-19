<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if(!isset($_SESSION['admin']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details 
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ];?></title>
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
<body >
           Hi <?php echo $userRow['userName']; ?>
            
           <div class ="manageUser">
   
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>User ID</th>
               <th>User Name</th>
               <th>User Email</th>
               <th></th>
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
                       <td>
                           <a href='update.php?id=" .$row['id']."'><button type='button'>Edit</button></a>
                           <a href='delete.php?id=" .$row['id']."'><button type='button'>Delete</button></a>
                       </td>	
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
<?php ob_end_flush(); ?>