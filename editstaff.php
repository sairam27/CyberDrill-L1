<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
$sql="SELECT * FROM `staff` WHERE id=$id";
$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
$rws=  mysqli_fetch_array($result);
?>
<?php
    $delete_id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
    if(isset($_REQUEST['submit2_id'])){
            $sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
            mysqli_query($con,$sql_delete) or die(mysqli_error($con));
            header('location:delete_staff.php');
    }
?>
<html>
    <head>
      <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Admin Login</title>
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
            <form action="alter_staff.php" method="POST">
                <table class="table" >
                <input style="width:276px;radius:15px;" type="hidden" name="current_id" value="<?php echo $id;?>"/>
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Staff Details</u></h3></td></tr>
                <tr>
                    <td>Staff's name</td>
                    <td><input style="width:100%;radius:15px;" type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        M<input type="radio" name="edit_gender" value="M" <?php if($rws[10]=="M") echo "checked";?>/>
                        F<input type="radio" name="edit_gender" value="F" <?php if($rws[10]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input style="width:100%;radius:15px;" id="datepicker" name="edit_dob" required  value="<?php echo $rws[2];?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>Relationship</td>
                    <td>
                        <select name="edit_status">
                            <option <?php if($rws[3]=="unmarried") echo "selected";?>>unmarried</option>
                            <option <?php if($rws[3]=="married") echo "selected";?>>married</option>
                            <option <?php if($rws[3]=="divorced") echo "selected";?>>divorced</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>
                        <select name="edit_dept">
                            <option <?php if($rws[4]=="revenue") echo "selected";?>>revenue</option>
                            <option <?php if($rws[4]=="developer") echo "selected";?>>developer</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        DOJ
                    </td>
                    <td>
                        <input style="width:100%;radius:15px;" id="datepicker1" name="edit_doj" value="<?php echo $rws[5];?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>Address:</td>
                    <td><textarea style="width:100%;radius:15px;" name="edit_address"><?php echo $rws[6];?></textarea></td>
                </tr>
                    <td>Mobile:</td>
                    <td><input style="width:100%;radius:15px;" type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/></td>
                </tr>
                <tr>
                    <td>Email id</td>
                    <td><input style="width:100%;radius:15px;" type="text" name="edit_mobile" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'>
                        <input style="width:40%;radius:15px;" type="submit" name="alter" value="UPDATE DATA" class="summary_date1 btn btn-green btn-block btn-flat "/></td>
                </tr>
            </table>
            </form>
        </div>
        </div>
    </div>
    </body>
</html>
   