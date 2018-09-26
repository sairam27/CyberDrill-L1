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
            <div class="addben" style="padding-top:30px;">
            <h3 style="text-align:center;color:#2E4372;"><u>Add Beneficiary</u></h3>
                <div class="date_pick" style="color:black;">
                    <form action='add_beneficiary_process.php' method='post'>
                        <div class="row" id="com_container"> 
                            <div class="col-lg-12 col-md-12 col-sm-12"><br>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Payee Name:</label>
                                <div class="col-sm-4 col-md-3">
                                   <input type='text' style="width:175px;height:30px;" name='name' width="276" required>
                                </div>
					       </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Account No:</label>
                                <div class="col-sm-4 col-md-3">
                                   <input type='text' style="width:175px;height:30px;" name='account_no' required>
                                </div>
					       </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Select Branch:</label>
                                <div class="col-sm-4 col-md-3" >
                                       <select name='branch_select' style="width:175px;height:30px;" required>
                                        <option value='KOLKATA'>Kolkata</option>
                                        <option value='DELHI'>Delhi</option>
                                        <option value='BANGALORE'>Bangalore</option>
                                        </select>
                                </div>
					       </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Ifsc Code:</label>
                                <div class="col-sm-4 col-md-3">
                                   <input type='text' style="width:175px;height:30px;" name='ifsc_code' required>
                                </div>
					       </div>
                                <div style="margin-left:200px;width:30%;">
                                <input type="submit" style="width:175px;height:30px;" name='submitBtn' value='Add Beneficiary' class="addstaff_button btn btn-green btn-block btn-flat ">  
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
           