<?php 
session_start();
        
if(isset($_SESSION['admin_login'])) 
    header('location:admin_homepage.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>   
    </head>
    <body>
    <?php include 'header.php'; ?>
        <div class='container mainsec'>
        <h4 style="text-align:center;color:black;padding-top:5%;">Welcome Admin</h4>
        <div class="adminlogin" style="color:black;border:1px solid white;border-radius:5px;">
                <form action='' method='POST'>
                    <div class="row" id="com_container"> 
                        <div class="col-lg-12 col-md-12 col-sm-12"><br>
                            <p class="mandatory_txt">
                            Mandatory fields are marked with an asterisk (*)
                            </p>
                        	<div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" >Username<span
                                    class="mandatory_txt">*</span> </label>
                                <div class="col-sm-4 col-md-3">
                                    <input required type="text" class="form-control p" name="uname"
                                        maxlength="17" value=""
                                        onfocus="disableautocompletion(this.id);"
                                        onblur="disableautocompletion(this.id);" onCopy="return false"
                                        onPaste="return false">
                                </div>
					       </div>
                    	<div class="form-group">
						<label class="control-label col-sm-3 col-md-3 col-comn">Password <span
							class="mandatory_txt">*</span> </label>
						<div class="col-sm-4 col-md-3">
							<input type="password" required class="form-control p" name="pwd"
								size="20" maxlength="20" value=""
								onfocus="disableautocompletion(this.id);"
								onblur="disableautocompletion(this.id);" onCopy="return false"
								onPaste="return false">
						</div>
                            </div> 
                            
                            <div style="width:50%;padding-left:100px;">
                             <input type="submit" name="submitBtn" value="Sign In"  class="btn financierlogin-btn btn-green btn-block btn-flat" >  
                            </div>
                            
                        </div>
                        
                    </div>
                </form>
        </div>
         <?php include 'footer.php'; ?>
        </div>
        <?php 
            include '_inc/dbconn.php';
            if(!isset($_SESSION['admin_login'])){
            if(isset($_REQUEST['submitBtn'])){
                $sql="SELECT * FROM admin WHERE id='1'";
                $result=mysqli_query($con,$sql);
                $rws=  mysqli_fetch_array($result);
                $username=  mysqli_real_escape_string($con,$_REQUEST['uname']);
                $password=  mysqli_real_escape_string($con,$_REQUEST['pwd']);
                if($username==$rws[8] && $password==$rws[9]) {

                    $_SESSION['admin_login']=1;
                header('location:admin_hompage.php'); }
                else
                    header('location:adminlogin.php');      
            }
            }
            else {
                header('location:admin_hompage.php');
            }
            ?>
    </body>
</html>