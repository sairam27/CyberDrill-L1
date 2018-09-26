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
        <style>
        .content3{
                margin-left:15%;
                margin-top:15%;
                float:left;
                height:230px;
                width:250px;
                border-radius:5px;
                background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%); 
            }
        .content3 p{
                padding-left:10px;
                text-align: left;
                padding-top:10px;
            }
        .content4{
                margin-left:15%;
                margin-top:15%;
                float:left;
                height:230px;
                width:250px;
                border-radius:5px;
                background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%); 
            }
        .content4 p{
                padding-left:10px;
                text-align: left;
                padding-top:10px;
            }
        </style>
    </head>
    <body>
    <?php include 'header.php' ?>
        <div class="container mainsec section-padding ">
        <?php include 'side_tabs.php'?> 
        <div class="divider">
        <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
        </div>
        <div class="pdet" style="color:black;">
            <h3 style="text-align:center;color:#2E4372;"><u>Personal Details</u></h3>
            <?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);
                $name= $rws[1];
                $account_no= $rws[0];
                $dob=$rws[3];
                $nominee=$rws[4];
                $branch=$rws[10];
                $branch_code= $rws[11];
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $address=$rws[6];
                $last_login= $rws[12];
                $acc_status=$rws[13];
                $acc_type=$rws[5];                  
            ?>
            <div class="customer_body">
            <div class="content3">
            <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">gender: </span><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><span class="heading">Mobile: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
            </div>
            <div class="content4">
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
            <p><span class="heading">Nominee: </span><?php echo $nominee;?></p>
            <p><span class="heading">Branch: </span><?php echo $branch;?></p>
            <p><span class="heading">Branch Code: </span><?php echo $branch_code;?></p>
            <p><span class="heading">Account Type: </span><?php echo $acc_type;?></p>
            </div>
            </div> 
        </div>
        </div>
        </div>
    </body>
</html>