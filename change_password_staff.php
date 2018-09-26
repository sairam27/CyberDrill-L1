<?php 
session_start();
include '_inc/dbconn.php';
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
                    $user=$_SESSION['login_id'];
                    if(isset($_REQUEST['change_password'])){
                    $sql="SELECT * FROM staff WHERE email='$user'";
                    $result=mysqli_query($con,$sql);
                    $rws=  mysqli_fetch_array($result);
                    $old=  mysqli_real_escape_string($con,$_REQUEST['old_password']);
                    $new=  mysqli_real_escape_string($con,$_REQUEST['new_password']);
                    $again=  mysqli_real_escape_string($con,$_REQUEST['again_password']);
                    if($rws[9]==$old && $new==$again){
                        $sql1="UPDATE staff SET pwd='$new' WHERE email='$user'";
                        mysqli_query($con,$sql1) or die(mysqli_error($con));
                        header('location:staff_homepage.php');
                    }
                    else{
                        /*RASHID give the pop up window about something went wrong try again*/
                        header('location:change_password_staff.php');
                    }
                    }
                    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
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
             <div class="changestaff" style="color:black;">
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
                 
            </div>
            </div>  
        </div>
    </body>
</html>
       