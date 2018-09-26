<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
$sql="SELECT * FROM `customer` WHERE id=$id";
$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
$rws=  mysqli_fetch_array($result);
?>
<?php
                        $delete_id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="DELETE FROM `customer` WHERE `id` = '$delete_id'";
                            $sql_drop="DROP TABLE passbook".$delete_id;
                            mysqli_query($con,$sql_delete) or die(mysqli_error($con));
                            mysqli_query($con,$sql_drop) or die(mysqli_error($con));
                            header('location:delete_customer.php');
                        }
                        ?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Customer editing</title>
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
            <div class="editstaff" style="color:black;margin-left:4em;">
                <form action="alter_customer.php" method="POST">
                 <table class="table" align="center">
                            <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Customer Details</u></h3></td></tr>
                <tr>
                    <td>customer's name</td>
                    <td><input type="text" name="edit_name" style="width:100%;radius:15px;height:37px;" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td>
                        M<input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>
                        F<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input id="datepicker" name="edit_dob" style="width:100%;radius:15px;height:37px;" value="<?php echo $rws[3];?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="edit_nominee" style="width:100%;radius:15px;height:37px;"value="<?php echo $rws[4];?>" required=""/></td>
                </tr>
                <tr>
                    <td>account type</td>
                    <td>
                        <select name="edit_account" style="width:100%;radius:15px;height:37px;">
                            <option <?php if($rws[5]=="savings") echo "selected";?>>savings</option>
                            <option <?php if($rws[5]=="current") echo "selected";?>>current</option>
                        </select>
                    </td>
                </tr>
                
                                
                <tr>
                    <td>Address:</td>
                    <td><textarea style="width:100%;radius:15px;" name="edit_address"><?php echo $rws[6];?></textarea></td>
                </tr>
                
                    <td>mobile</td>
                    <td><input type="text" name="edit_mobile" style="width:100%;radius:15px;height:37px;" value="<?php echo $rws[7];?>" required=""/></td>
                </tr>

                <tr>
                    <td>email id</td>
                    <td><input type="text" name="edit_mobile" style="width:100%;radius:15px;height:37px;" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input style="width:40%;radius:15px;"  type="submit" name="alter_customer" value="UPDATE DATA" class="summary_date1 btn btn-green btn-block btn-flat "/></td>
                </tr>
            </table>
                </form> 
            </div>
        </div>
        </div>
    </body>
</html>
    