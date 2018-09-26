<?php 

session_start();
if(isset($_POST['submitBtnquery'])){
    date_default_timezone_set('Asia/Kolkata');
    $filename=$_SESSION['name'];
    $old="";
    if(!file_exists("messages/".$filename.".txt")){
                $file = tmpfile();
            }
    $file = fopen("messages/".$filename.".txt","a+");
chmod("messages/".$filename.".txt",0777);
    while(!feof($file)){
                $old = $old . fgets($file);
            }
     $text = $_POST["textdata"];
            file_put_contents("messages/".$filename.".txt", $old."\r\n" . $text);
            fclose($file);
      echo '<script>';
  echo 'alert("Submitted Successfully!")'; 
  echo '</script>';
    header('location:customer_account_summary.php'); 
}        
    
?>
