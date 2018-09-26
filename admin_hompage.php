<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin.php');  
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/head-logo.png" />
        <title>Welcome Admin</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/styles.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>
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
.mainsec .admin_staff{
     margin-top: 10px;
   margin-left:10px;
    float:left;
    height:220px;
    width:450px;
    background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%); 
}
.mainsec .admin_customer{
    margin-top:10px;
    margin-left:10px;
    float:left;
    height:220px;
    width:450px;
    background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%); 
}
.mainsec .admin_staff li{
    
    font-size:15px;
    padding-top:10px;
    padding-bottom:10px;
 list-style-type:none;
}
.mainsec .admin_customer li{
    
    font-size:15px;
    padding-top:10px;
    padding-bottom:10px;
    list-style-type:none;
 
}
   .mainsec .admin_messages{
    float:right;
    height:65%;;
       margin-top:15px;
    width:80%;
    background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%); 
}     
.admin_messages option{
    padding-top:10px;
    margin-top:15px;
    padding-left: 20px;
    line-height: 1px;
    color:green;
    width:95%;
    float:left;
    background: linear-gradient(to bottom, rgba(224,243,250,1) 49%,rgba(184,226,246,1) 100%,rgba(182,223,253,1) 100%);
}

    .admin_messages .ram{
        color:black;
        padding-top:5px;
        padding-bottom:5px;
        padding-left:10px;
        padding-right:10px;
        background: white;
        width:95%;
        font-size: 15px;
        height:400px;;
        float:right;
        margin-left: 50%;
        margin-right:5px;
    }
        </style>
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
                   <div class='admin_staff'>

                        <ul>
                            <li style='color:black;'><b><u>Staff</u></b></li>
               <li> <a href="addstaff.php">Add staff member</a></li>
                <li><a href="display_staff.php">Edit staff member</a></li>
                <li> <a href="delete_staff.php">Delete staff</a></li>
                </ul>
                </div>
                   <div class='admin_customer'>
                        <ul>
                           <li style='color:black;'><b><u> Customer</u></b></li>
                <li><a href="addcustomer.php">Add Customer</a></li>
               <li> <a href="display_customer.php">Edit customer</a></li>
               <li> <a href="delete_customer.php">Delete customer</a></li>
                       </ul>
                    </div>
         <div class=admin_messages>
             <h3 style="color:black;text-align:center;">Messages</h3>
             <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-6 col-md-6 col-sm-6">
                         <?php
                             $dir="messages/";
                             if (is_dir($dir)){
                                 if ($dh = opendir($dir)){
                                     while (($file = readdir($dh)) !== false){
                                                    if ($file == '.' || $file == '..') { 
                                                continue; 
                                            } 
                                         $name3= trim($file,".txt");
                                        echo "<option class='sai'>".$name3."</option><br>";

                                    }
                                    closedir($dh);
                                    }
                                }
                                  ?>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6">
                     <span class="ram" rows="20" cols="60" maxlength="800" name=textdata >
                    <?php 
                         
                        if(isset($_REQUEST['fname'])){
                        $name = $_GET['fname'];
                             if($fh = fopen("messages/".$name.".txt", 'r')) {
                                        while (!feof($fh)) {
                                            $line = fgets($fh);
                                            echo $line;
                                            }
                                fclose($fh);
                                }
                        }
                    ?>       
            </span>
                </div>
             </div>
         </div>
             </div>
        
         <script>
             
     $(document).on('click','.sai',function(){
         var a = $(this).val();
         window.location.href = "admin_hompage.php?fname=" + a;
    });
         </script>   
    </body>
    
    

</html>