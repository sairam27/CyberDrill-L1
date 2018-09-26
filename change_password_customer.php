<?php 
session_start();
include '_inc/dbconn.php';
        
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
            </div><br><br><br><br>
            <div class="cpass"  style="color:black;margin-left:4em;">
            <h3 style="text-align:center;color:#2E4372;"><u>Change Password</u></h3>
                <form action="" method="POST" style="margin-left:5em;">
                <div class="row" id="com_container"> 
                    <div class="col-lg-12 col-md-12 col-sm-12"><br>
                    <div class="form-group">
                            <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Enter old password:</label>
                            <div class="col-sm-4 col-md-3">
                                <input type="password" name="old_password" width="276" required/>
                            </div>
				    </div>
                    <div class="form-group">
                            <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Enter new password:</label>
                            <div class="col-sm-4 col-md-3">
                                <input type="password" name="new_password" width="276" required/>
                            </div>
				    </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Enter password again:</label>
                            <div class="col-sm-4 col-md-3">
                                <input type="password" name="again_password" width="276" required/>
                            </div>
				    </div>
                            <div style="margin-left:100px;width:30%;">
                                <input type="submit" name="change_password" value="Change Password" class="addstaff_button btn btn-green btn-block btn-flat ">  
                            </div>
                    </div>
                    </div>
                </form>
                <?php
                    $change=$_SESSION['login_id'];
                    if(isset($_REQUEST['change_password'])){
                    $sql="SELECT * FROM customer WHERE id='$change'";
                    $result=mysqli_query($con,$sql);
                    $rws=  mysqli_fetch_array($result);
                    $salt="@g26jQsG&nh*&#8v";
                    $old=  sha1($_REQUEST['old_password'].$salt);
                    $new=  sha1($_REQUEST['new_password'].$salt);
                    $again=sha1($_REQUEST['again_password'].$salt);
                    if($rws[9]==$old && $new==$again){
                        $sql1="UPDATE customer SET password='$new' WHERE id='$change'";
                        mysqli_query($con,$sql1) or die(mysqli_error($con));
                        header('location:customer_account_summary.php');
                    }
                    else{

                        header('location:change_account_summary.php');
                    }
                    }
                ?>
            </div>    
        </div>
        </div>
    </body>
</html>