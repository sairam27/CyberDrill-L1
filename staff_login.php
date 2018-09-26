<?php 
session_start();
        
if(isset($_SESSION['staff_login'])) 
    header('location:staff_homepage.php');   
?>
<?php
if(isset($_REQUEST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];
    $password=$_REQUEST['pwd'];
  
    $sql="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);
    
    
    
    if($rws[0]==$username && $rws[1]==$password){
        session_start();
        $_SESSION['staff_login']=1;
        $_SESSION['staff_id']=$username;
        
    header('location:staff_homepage.php'); 
    }
    else
        echo "fail";
        
}
?>
<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
        <meta charset="UTF-8">
        <title>Staff Login - Online Banking</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script> 
    </head>
    <body>
    <?php include 'header.php'; ?>
        <div class='container mainsec'>
        <h4 style="text-align:center;color:black;padding-top:5%;">Staff Login</h4>
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
                        <div style="width:50%;margin-left:80px;" class="col-sm-8 col-md-8">
                             <input type="submit" name="submitBtn" value="Log In"  class="btn financierlogin-btn btn-green btn-block btn-flat" >  
                            </div>
                        
                    </div></div>
                </form>
            </div> 
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
          

