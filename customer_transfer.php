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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <?php include 'header.php' ?>
    <div class="container mainsec section-padding ">
      <?php include 'side_tabs.php'?>
        <div class="divider">
        <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
        </div>
            <div class="transfer" style="padding-top:30px;color:black;">
            <h3 style="text-align:center;color:#2E4372;"><u>Transfer Funds</u></h3>
                <?php
                    include '_inc/dbconn.php';
                    $sender_id=$_SESSION["login_id"];
                    $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
                    $result=  mysqli_query($con,$sql);
                    $rws=mysqli_fetch_array($result);
                    $s_id=$rws[1];              
                ?>
                <?php       
                if($sender_id==$s_id)    
                {
                ?>
                <form action='customer_transfer_process.php' style="margin-left:2em;" method='POST'>
                    <div class="row" id="com_container"> 
                        <div class="col-lg-12 col-md-12 col-sm-12"><br>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Select Beneficiary:</label>
                                <div class="col-sm-4 col-md-3">
                                    <select name='transfer' style="width:175px;height:30px;">
                                    <?php
                                      $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
                                    $result=  mysqli_query($con,$sql);
                                    while($rws=mysqli_fetch_array($result)) {
                                    echo "<option value='$rws[3]'>$rws[4]</option>";
                                    }  
                                    ?>
                                    </select>
                                </div>
					   </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Enter Amount:</label>
                                <div class="col-sm-8 col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon fa">&#xf156;</span>
                                        <input type='number' style="width:175px;height:30px;text-align:right;padding-right: 15px;" name='t_val' required width="276" required/> 
                                    </div>
                                </div>
					   </div>
                        <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Description:</label>
                                <div class="col-sm-4 col-md-3">
                                    <input type='text' style="width:175px;height:30px;" name='t_dec' required width="276" required/>
                                </div>
					   </div>  
                         <div style="margin-left:200px;width:30%;">
                                <input type='submit' style="width:175px;height:30px;" name='submitBtn' value='Transfer' class="addstaff_button btn btn-green btn-block btn-flat ">  
                        </div> 
                        <?php
                        }else{
                            echo "<br><br><div class='head'><h3>No Benefeciary Added with your account.</h3></div>";
                        }
                        ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
        