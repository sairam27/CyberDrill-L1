<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
    <title>Add staff</title>
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
                 $('#datepicker1').datepicker({
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
            <div class="addstaff" style="color:black;">
             <h3 style="text-align:center;color:#2E4372;"><u>Add staff</u></h3>
                <form action="add_staff.php" method="POST">
                 <div class="row" id="com_container"> 
                     <div class="col-lg-12 col-md-12 col-sm-12"><br>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Staff's name</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" name="staff_name" style="width:100%;radius:15px;height:37px;" required/>
                                </div>
					       </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >gender</label>
                                <div class="col-sm-8 col-md-8">
                                    M<input type="radio" name="staff_gender" value="M" checked/>
                                    F<input type="radio" name="staff_gender" value="F" />
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >DOB</label>
                                <div class="col-sm-8 col-md-8">
                                   <input id="datepicker" name="staff_dob" style="width:100%;radius:15px;" required/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Relationship</label>
                                <div class="col-sm-8 col-md-8">
                                   <select name="staff_status" style="width:100%;radius:15px;height:37px;">
                                        <option>unmarried</option>
                                        <option>married</option>
                                        <option>divorced</option>
                                    </select>
                                </div>
					       </div>
                          <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Department</label>
                                <div class="col-sm-8 col-md-8">
                                   <select name="staff_dept" style="width:100%;radius:15px;height:37px;">
                                        <option>revenue</option>
                                        <option>developer</option>
                                    </select>
                                </div>
					       </div>
                          <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >DOJ</label>
                                <div class="col-sm-8 col-md-8">
                                   <input id="datepicker1" name="staff_doj" style="width:100%;radius:15px;" required=""/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Address:</label>
                                <div class="col-sm-8 col-md-8">
                                   <textarea name="staff_address"style="width:100%;radius:15px;" required=""></textarea>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Mobile</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="text" name="staff_mobile" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Email id</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="email" name="staff_email" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Password</label>
                                <div class="col-sm-8 col-md-8">
                                   <input type="password" name="staff_pwd" style="width:100%;radius:15px;height:37px;" required=""/>
                                </div>
					       </div>
                         <div style="margin-left:200px;width:30%;">
                                <input type="submit" name="add_staff" value="ADD STAFF MEMBER" class="summary_date1 btn btn-green btn-block btn-flat ">  
                            </div>
                         
                     </div>
                    </div>
                </form>
            </div>
        </div>    
    
    </div>
    </body>
</html>
