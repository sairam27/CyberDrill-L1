<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cheque Book Approval Requests</title>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>
    <body>
       <?php include 'header.php' ?>
        <div class='container mainsec'>
        <?php include 'staff_navbar.php'?>
            <div class="divider">
                <div class="atmapr" style="color:black;">
                <h3 style="text-align:center;color:#2E4372;"><u>ATM approval requests</u></h3>
                  <?php
                    include '_inc/dbconn.php';
                    $sql="SELECT * FROM cheque_book WHERE cheque_book_status='PENDING'";
                    $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
                  ?>
                  <form action="staff_cheque_approve_process.php" method="POST">  
                    <div class="row" id="com_container"> 
                    <div class="col-lg-12 col-md-12 col-sm-12"><br>
                        <table class="table table-hover" align="center">
                            <thead>
                            <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Account No.</th>
                        <th>Check Book Status</th>
                            </tr>
                            </thead>
                        <tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "</tr>";
                        } ?>
                            </tbody>
                        </table>
                         <div style="margin-left:300px;width:30%;">
                                <input type="submit" name="submit_id" value="APPROVE REQUEST" class="addstaff_button btn btn-green btn-block btn-flat ">  
                        </div>
                        </div></div>  
                  </form>
                </div> 
            </div>
        </div> 
    </body>
</html>
        