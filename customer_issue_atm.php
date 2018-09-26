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
                </div><br><br>
               <div class="atmc" style="color:black;">
                   <form action="customer_issue_atm_process.php" method="POST">
                        <div class="row" id="com_container"> 
                            <div class="col-lg-12 col-md-12 col-sm-12"><br>
                                <div class="form-group" style="margin-left:6em;">
                                    <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Issue</label>
                                    <div class="col-sm-4 col-md-3">
                                        <select name="atm">
                                            <option value='ATM' selected>ATM</option>
                                            <option value='CHEQUE'>Cheque Book</option>
                                        </select>
                                    </div>
					           </div>
                                <div style="margin-left:200px;width:30%;">
                                <input type="submit" name="submitBtn" value="Request" class="summary_date1 btn btn-green btn-block btn-flat ">  
                            </div>
                            </div>
                       </div>
                   </form>
               </div>
               <div class="status" style="color:black;width:80%;margin-left:4em;margin-top:3em;">
               <?php 
                include '_inc/dbconn.php';
                $sender_id=$_SESSION["login_id"];

                $sql="SELECT * FROM cheque_book WHERE account_no='$sender_id'";
                $result=mysqli_query($con,$sql) or die(mysqli_error($con));
                $rws=mysqli_fetch_array($result);
                $c_status=$rws[3];
                $c_id=$rws[2];

                $sql="SELECT * FROM atm WHERE account_no='$sender_id'";
                $result=mysqli_query($con,$sql) or die(mysqli_error($con));
                $rws=mysqli_fetch_array($result);
                $atm_status=$rws[3];
                $a_id=$rws[2];

                if(($a_id==$sender_id) || ($c_id==$sender_id))
                {

                echo "<table class='table table-hover' align='center'>";
                echo "<thead><tr><th>Requests</th><th>Status</th></tr></thead>";
                echo "<tbody>";
                echo "<tr><td>ATM Card Status: </td><td>$atm_status</td></tr>";
                echo "<tr><td>Cheque Book Status: </td><td>$c_status</td></tr>";
                echo "</tbody>";
                echo "</table>"; 
                }
                ?>
               </div>
            </div>
        </div>
    </body>
</html>