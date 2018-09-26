<?php   
if(isset($_REQUEST['submitBtn'])){ 
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];
    
    //salting of password
    $salt="@g26jQsG&nh*&#8v";
    $password= sha1($_REQUEST['upass'].$salt);
  
    $sql="SELECT email,password FROM customer WHERE email='$username' AND password='$password'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);
    
    $user=$rws[0];
    $pwd=$rws[1];    
    if($user==$username && $pwd==$password){
        session_start();
        $_SESSION['customer_login']=1;
        $_SESSION['cust_id']=$username;
        
    header('location:customer_account_summary.php'); 
    }
else{
    header('location:index.php');  
}
}
?>
<?php 
session_start();  
if(isset($_SESSION['customer_login'])) 
header('location:customer_account_summary.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>CyberDrill XIII</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>   
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="container mainsec section-padding ">
        <a href="index.php"><div class="hometab btn-green">HOME</div> </a> 
        <a ><div class="contact">Contact US</div> </a>     
        <a ><div class="logintab">LOGIN</div> </a> 
        <a ><div class="obank">Online Banking Application</div></a>
        <div id="a">
            <div class="image">
            
            <div class="text">
            <a class="sob"><h3>Click to read safe online Banking tips</h3></a>
            <a ><h3>Terms and conditions</h3></a>
            <a class="faq"><h3>FAQ'S</h3></a>
            </div>
            </div>
             <div class="home-img" id="home-img">
                <img class="himg" src="./img/head-logo.png" alt="LOGO" style="height:450px; width: 450px;"/>
            </div>
            
              <div class="left_panel">
                <p>Our internet banking portal provides personal banking services that gives you complete control over all your banking demands online.</p>
                <h3>Features</h3>
                <ul>
                    <li>Registration for online banking</li>
                    <li>Adding Beneficiary account</li>
                    <li>Funds Transfer</li>
                    <li>Last Login record</li>
                    <li>Mini Statement</li>
                    <li>ATM and Cheque Book</li>
                    <li>Staff approval Feature</li>
                    <li>Account Statement by date</li>
                </ul>
                </div>
            <div class="right_panel">
                
                    <h3>PERSONAL BANKING</h3>
                    <ul>
                        <li>Personal Banking application provides features to administer and manage non personal accounts online.</li>
                        <li>Phishing is a fraudulent attempt, usually made through email, phone calls, SMS etc seeking your personal and confidential information.</li>
                        <li>Online Bank or any of its representative never sends you email/SMS or calls you over phone to get your personal information, password or one time SMS (high security) password.</li>
                        <li>Any such e-mail/SMS or phone call is an attempt to fraudulently withdraw money from your account through Internet Banking. Never respond to such email/SMS or phone call. Please report immediately on reportif you receive any such email/SMS or Phone call. Please lock your user access immediately.
</li>
                    </ul>
                </div>
            <div class='content_customer'>
            <h3 style="text-align:center;color:#2E4372;"><u>Contact Us</u></h3>
            
            <div class="contacta">
            <h3 style="color:#2E4372;"><u>Hyderabad Branch</u></h3>
            <p><span class="heading">Address - </span>10-3-311, Road No.1, Masab Tank, Hyderabad, Telangana 500057</p>
            <p><span class="heading">Tel - </span> 040 2329 4009/4000/4999</p>
            <p><span class="heading">Fax - </span>  +91 (40) 2353 5157 </p>   
            <p><span class="heading">Website - </span><a href="http://www.idrbt.ac.in/">http://www.idrbt.ac.in/</a></p>
            <p><span class="heading">Email - </span> publisher@idrbt.ac.in </p>
            </div>
            </div>
            <div class='content_customer1'>
            <h3 style="text-align:center;color:#2E4372;"><u>Safe Online Banking Tips</u></h3>
              
            <div class="contacta">
            <h3 style="color:#2E4372;"><u>Please ensure the following before logging in</u></h3> 
            <ul>
            <li>URL address on the address bar of your internet browser begins with "https"; the letter 's' at the end of "https" means 'secured'. </li>
            <li>Look for the padlock symbol either in the address bar or the status bar (mostly in the address bar) but not within the web page display area. Verify the security certificate by clicking on the padlock.</li>
            <li>Do not enter login or other sensitive information in any pop up window.</li>
            <li>The address bar has turned to green indicating that the site is secured with an SSL Certificate.</li>
            </ul>
            <h3 style="color:#2E4372;"><u>Beware of Phishing Attacks</u></h3>
            <ul>
            <li>Phishing is a fraudulent attempt, usually made through email, phone calls, SMS etc seeking your personal and confidential information.</li>
            <li>State Bank or any of its representative never sends you email/SMS or calls you over phone to get your personal information, password or one time SMS (high security) password.</li>
            <li>Any such e-mail/SMS or phone call is an attempt to fraudulently withdraw money from your account through Internet Banking. Never respond to such email/SMS or phone call. </li>
            <li>Change your Internet Banking password at periodical intervals.</li>
            <li>Always check the last log-in date and time in the post login page.</li>
            </ul>
            </div>
            </div>
            
            <div class='content_customer2'>
            <h3 style="text-align:center;color:#2E4372;"><u>Frequently asked questions</u></h3>
            
            <div class="contacta">
            <h3 style="color:#2E4372;"><u>1. What is Online banking?</u></h3>
            <p>Online banking is the Internet banking service provided by Bank of India, India's largest and premier commercial bank</p>
            
             <h3 style="color:#2E4372;"><u>2. What is special about Internet banking?</u></h3>
            <p>Internet banking is the most convenient way to bank- anytime, any place, at your convenience.</p>
            
             <h3 style="color:#2E4372;"><u>3. I do not have a PC?</u></h3>
            <p>You can access Online banking from any computer that has connectivity to the Internet. But make sure your computer is Malware free.</p>
            <h3 style="color:#2E4372;"><u>4. How do I access Online banking?</u></h3>
            <p>You need to have an account at a branch. You also need to register for the Internet banking service with the branch. Branch will provide you a Pre Printed Kit (PPK) containing username and password for first login. If you are not in a position to collect PPK in person, the bank will arrange to send a username through SMS and a mailer containing password to your registered address. Logon to www.onlinebanking.com using this username and password. At the first login, you will need to go through a simple initialization process. Our Net banking assistant will guide you step by step through this process on the site.</p>
            <h3 style="color:#2E4372;"><u>5. I do not have an account with bank?</u></h3>
            <p>You are welcome to open it now. It is very easy to open an account with online bank. You can apply online for opening of a savings bank account. A link 'Online bank Account Application' is available on the home page of www.onlinebanking.com or just walk in to any of our branches nearby. Our staff would be pleased to assist you.</p>
            </div>
            </div>
            
            <div class="login" style="color:black;">
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
							<input type="password" required class="form-control p" name="upass"
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
        </div>  
        <?php include 'footer.php' ?>
            
        </div>
        <script src="js/styles.js"></script> 
    </body>
</html>