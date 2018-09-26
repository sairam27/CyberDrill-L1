<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($con,$_REQUEST['staff_name']);
$gender=  mysqli_real_escape_string($con,$_REQUEST['staff_gender']);
$dob=  mysqli_real_escape_string($con,$_REQUEST['staff_dob']);
$status=  mysqli_real_escape_string($con,$_REQUEST['staff_status']);
$dept=  mysqli_real_escape_string($con,$_REQUEST['staff_dept']);
$doj=  mysqli_real_escape_string($con,$_REQUEST['staff_doj']);
$address=  mysqli_real_escape_string($con,$_REQUEST['staff_address']);
$mobile=  mysqli_real_escape_string($con,$_REQUEST['staff_mobile']);
$email= mysqli_real_escape_string($con,$_REQUEST['staff_email']);
$password=  mysqli_real_escape_string($con,$_REQUEST['staff_pwd']);
$date = date('y-m-d h:i:s', time());
$sql="insert into staff(name,dob,relationship,department,doj,address,mobile,email,pwd,gender,lastlogin) values('$name','$dob','$status','$dept','$doj','$address','$mobile',
    '$email','$password','$gender','$date')";
mysqli_query($con,$sql) or die(mysqli_error($con));
header('location:admin_hompage.php');
?>