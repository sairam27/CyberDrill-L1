<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
     <link rel="icon" type="image/png" href="./img/head-logo.png" />
    <title>Customer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css"/>
    <script src="js/jquery-3.3.1.min.js"></script>  
    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
        </head>
    <body>
    <?php include 'header.php' ?>
        <div class="container mainsec section-padding ">
        <?php include 'side_tabs.php'?>
            <div class="divider">
            <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
            </div>
            <div class="benfview">
            <?php
                include '_inc/dbconn.php';
                $sender_id=$_SESSION["login_id"];
                $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";
                $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
            ?>
            <h3 style="text-align:center;color:#2E4372; margin-top:3em;"><u>Added Beneficiary</u></h3>
                <form action='delete_beneficiary.php' method='POST'>
                <table class="table table-hover" style="color:black;width:80%;" align="center">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Beneficiary Account No</th>
                        <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($rws=  mysqli_fetch_array($result)){
                            
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[5]."</td>";
                           
                            echo "</tr>";
                        } ?>
                    </tbody>
                </table> 
                    <div style="margin-left:200px;width:30%;">
                                <input type="submit" name="submit_id" value="DELETE BENEFICIARY" class="addstaff_button btn btn-green btn-block btn-flat ">  
                    </div>
                </form>
            </div>
            </div>  
        </div>
    </body>
</html>