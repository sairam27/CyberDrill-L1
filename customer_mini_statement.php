<?php 
session_start();      
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);
                $name= $rws[1];
                $account_no= $rws[0];
                $branch=$rws[10];
                $branch_code= $rws[11];
                $last_login= $rws[12];
                $acc_status=$rws[13];
                $address=$rws[6];
                $acc_type=$rws[5];
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;
?>
<head>
    <link rel="icon" type="image/png" href="./img/head-logo.png" />
    <title>Customer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css"/>
    <script src="js/jquery-3.3.1.min.js"></script>  
</head>
<body>
<?php include 'header.php' ?>
    <div class="container mainsec section-padding ">
    <?php include 'side_tabs.php'?>
         <?php
                $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
                $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
                while($rws=  mysqli_fetch_array($result))
                {
                $balance=$rws[7];
                } 
                ?>
        <div class="divider">
        <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
        </div>
            <div class="customer_body" style="color:black;">
            <div class="content1" >
            <p><span class="headingi">Account No: </span><?php echo $account_no;?></p>
            <p><span class="headingi">Branch: </span><?php echo $branch;?></p>
            <p><span class="headingi">Branch Code: </span><?php echo $branch_code;?></p>
            </div>
            <div class="content2">
            <p><span class="headingi">Balance: INR </span><?php echo $balance;?> </p>
            <p><span class="headingi">Account status: </span><?php echo $acc_status;?></p>
            <p><span class="headingi">Last Login: </span><?php echo $last_login;?></p>
           </div>     
        </div>
            <div class="tranc">
                <?php    include '_inc/dbconn.php';
                $sender_id=$_SESSION["login_id"];
                $sql="SELECT * FROM passbook".$sender_id." LIMIT 10";
                $result=  mysqli_query($con,$sql) or die(mysqli_error($con)); ?>
            <h3><u>Last 10 Transaction</u></h3>
                <table class="table table-hover" align="center">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Transaction Date</th>
                        <th>Narration</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            
                            echo "<tr>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                           
                            echo "</tr>";
                        } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>