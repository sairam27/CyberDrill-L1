<?php 
session_start();
include '_inc/dbconn.php';
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>

<!DOCTYPE html>
<html>
    <head>
       <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Admin Login</title>
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
    <?php include 'header.php'; ?>
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
          <div class="cpassadmin"  style="color:black;margin-left:4em;">
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
                    if(isset($_REQUEST['change_password'])){
                    $sql="SELECT * FROM admin WHERE id='1'";
                    $result=mysqli_query($con,$sql);
                    $rws=  mysqli_fetch_array($result);
                    $old=  mysqli_real_escape_string($con,$_REQUEST['old_password']);
                    $new=  mysqli_real_escape_string($con,$_REQUEST['new_password']);
                    $again=  mysqli_real_escape_string($con,$_REQUEST['again_password']);
                    if($rws[9]==$old && $new==$again){
                        $sql1="UPDATE admin SET pwd='$new' WHERE id='1'";
                        mysqli_query($con,$sql1) or die(mysqli_error($con));
                        header('location:admin_hompage.php');
                    }
                    else{
                        header('location:change_password.php');
                    }
                    }
                ?>
            </div>  
            </div>
        </div>
    </body>
</html>