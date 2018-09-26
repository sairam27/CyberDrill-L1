<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$sql="SELECT * FROM `staff`";
$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
$sql_min="SELECT MIN(id) from staff";
$result_min=  mysqli_query($con,$sql_min);
$rws_min=  mysqli_fetch_array($result_min);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Welcome Admin</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>
        <style>
            .admin_nav{
                padding-top: 5em;
                float:left;
                height:95%;
                width:200px;
                background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%);
                margin:5px;
            }
            .admin_nav li{
                font-size: 15px;
                text-align:left;
                padding-top:5px;
                padding-bottom:20px;
                list-style-type:none;
            }
            .admin_nav a{
                text-decoration:none;
            }
            .admin_nav a:hover {
                font-weight:bold;
            }

            .admin_nav li#caption{
            list-style-type:none;

            }
        </style>
    </head>
    <body>
     <?php include 'header.php' ?>
        <div class='container mainsec'>
        <div class='admin_nav'>
                       <ul>
                           <li id='caption' style='color:black;'><b><u>Welcome Admin</u></b></li>
                           <li><a href="admin_hompage.php">Admin Home</a></li>
                           <li><a href="change_password.php">Change password</a></li>
                           <li><a href="admin_logout.php">Logout</a></li>
                        </ul>
        </div>
            <div class="divider">
             <div class="delstaff" style="color:black;margin-left:2em;">
            <h3 style='color:#2E4372;text-align:center;'><u >Staff Details</u></h3>
                 <form action="editstaff.php" method="POST">
                 <div class="row" id="com_container"> 
                    <div class="col-lg-12 col-md-12 col-sm-12"><br> 
                     <table class="table table-hover" align="center">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>gender</th>
                        <th>DOB</th>
                        <th>relationship</th>
                        <th>department</th>
                        <th>DOJ</th>
                        <th>address</th>
                        <th>mobile</th>
                        <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='staff_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[10]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "</tr>";
                        }
                        ?>
                    <tbody>
                    </table>
                        <div style="margin-left:300px;width:30%;">
                                <input type="submit" name="submit2_id" value="DELETE STAFF DETAILS" class="addstaff_button btn btn-green btn-block btn-flat ">  
                        </div>
                     
                     </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
    </body>
</html>
