<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
             <link rel="icon" type="image/png" href="./img/head-logo.png" />
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css"/>
    <script src="js/jquery-3.3.1.min.js"></script>  
    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
        <script>
             $(document).ready(function(){
                    $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap',
                            format : 'yyyy-mm-dd'
                        });
             });
        </script>
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
            <div class="addcust" style="color:black;">
            <h3 style="text-align:center;color:#2E4372;"><u>Add Customer</u></h3>
                <form action="add_customer.php" method="POST">
                <div class="row" id="com_container"> 
                    <div class="col-lg-12 col-md-12 col-sm-12"><br>
                    <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Customer's name</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" name="customer_name" style="width:100%;radius:15px;height:37px;" required/>
                                </div>
				   </div>
                    <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >gender</label>
                                <div class="col-sm-8 col-md-8">
                                    M<input type="radio" name="customer_gender" value="M" checked/>
                                    F<input type="radio" name="customer_gender" value="F" />
                                </div>
					       </div>    
                    <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >DOB</label>
                                <div class="col-sm-8 col-md-8">
                                   <input id="datepicker" name="customer_dob" style="width:100%;radius:15px;" required/>
                                </div>
				   </div>
                      <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Branch</label>
                                <div class="col-sm-8 col-md-8">
                                   <select name="branch" style="width:100%;radius:15px;height:37px;">
                                    <option>KOLKATA</option>
                                    <option>DELHI</option>
                                    <option>BANGALORE</option>
                                </select>
                                </div>
				    </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Account type</label>
                                <div class="col-sm-8 col-md-8">
                                   <select name="customer_account" style="width:100%;radius:15px;height:37px;">
                                    <option>savings</option>
                                    <option>current</option>
                                </select>
                                </div>
					   </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Minimum amount</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="text" name="initial" value="1000" min="1000" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					   </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Address:</label>
                                <div class="col-sm-8 col-md-8">
                                   <textarea name="customer_address" style="width:100%;radius:15px;height:37px;" required=""></textarea>
                                </div>
					       </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Nominee:</label>
                                <div class="col-sm-8 col-md-8">
                                   <textarea name="customer_nominee" style="width:100%;radius:15px;height:37px;" required=""></textarea>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Mobile</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="text" name="customer_mobile" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Email id</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="email" name="customer_email" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Password</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="password" name="customer_pwd" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                        <div style="margin-left:200px;width:30%;">
                                <input type="submit" name="add_customer" value="Add Customer" class="summary_date1 btn btn-green btn-block btn-flat ">  
                            </div>
                        
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>
    
