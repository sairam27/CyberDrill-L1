<?php 
session_start();      
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<html> 
    <head>
     <link rel="icon" type="image/png" href="./img/head-logo.png" />
    <title>Customer transactions</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css"/>
    <script src="js/jquery-3.3.1.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>
<body>
    <?php include 'header.php' ?>
    <div class="container mainsec section-padding ">
        <div class="container tabs">
                <ul>
                   <li ><a href="customer_account_summary.php">Home</a></li>
                 </ul>
        
        </div>
        <div class="divider">
            <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
        </div>
            <div class="statement2 ">
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
                        <tbody>    
                        <?php 
                        if(isset($_POST['date1']) && isset($_POST['date2'])){
                        $date1 = $_POST['date1'];
                        $date2 = $_POST['date2'];
                            $_SESSION['date1']=$date1;
                            $_SESSION['date2']=$date2;
                         include '_inc/dbconn.php';
                         $sender_id=$_SESSION["login_id"];
                         $sql="SELECT * FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
                         $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
                        while($rws=  mysqli_fetch_array($result)){
                            
                            echo "<tr>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                           
                            echo "</tr>";
                        }
                        } ?>
                    </tbody>
                </table>
                <form method="post" action="excel.php">
                    
                    <input type="submit" name="export_excel"  class="btn btn-green" value="Export to Excel"/> 
                </form>
                
                </div>
        </div>
    </div>
    
    
    
    
</body>

</html>