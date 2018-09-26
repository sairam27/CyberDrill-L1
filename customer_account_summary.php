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
    <script>
        
        $(document).ready(function(){
            $(".tranc").hide();
            $(".statement2").hide();
            $(".statement").hide();
            $(document).on('click','.mini',function(){
                  $(".content1").show();
                $(".content2").show();
                $(".sai1").hide();
                $(".statement").hide();
                $(".tranc").show();
            });
            $(document).on('click','.stmt',function(){
                 $(".content1").hide();
                $(".content2").hide();
                $(".sai1").hide();
                $(".tranc").hide();
                $(".statement").show();
            });
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap',
                format : 'yyyy-mm-dd'
            });
            $('#datepicker1').datepicker({
                uiLibrary: 'bootstrap',
                format : 'yyyy-mm-dd'
            });
            var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
        $chatboxTitle.on('click', function() {
            $chatbox.removeClass('chatbox--empty');
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
            
        $(".mesbutton").each(function(){
         $(this).on('click',function(){
             var sage=$(".sage").val();
             $("<div class='chatbox__body__message chatbox__body__message--right chai'><img src='img/customer.png' alt='Picture'><p></p></div>").appendTo(".saira");
             $(".saira").children('.chai').last().find('p').html(sage);
              $.get("ssti.php",{sage:sage},function(data){
                  var result = JSON.parse(data);
                  if(result.success){
                      var m=result.message;
                      $("<div class='chatbox__body__message chatbox__body__message--left ram'><img src='img/customercare.png' alt='Picture'><p id='ram'></p></div>").appendTo(".saira");
                     $(".saira").children('.ram').last().find('p').html(m);
                  }
              });
            });  
        });
    });
        
    </script>
        <style>
.chatbox {
    position: fixed;
    bottom: 0;
    right: 30px;
    width: 300px;
    height: 600px;
    background-color: #fff;
    font-family: 'Lato', sans-serif;

    -webkit-transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);
    transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);

    display: -webkit-flex;
    display: flex;

    -webkit-flex-direction: column;
    flex-direction: column;
}

.chatbox--tray {
    bottom: -350px;
}

.chatbox--closed {
    bottom: -400px;
}

.chatbox .form-control:focus {
    border-color: #1f2836;
}

.chatbox__title,
.chatbox__body {
    border-bottom: none;
}

.chatbox__title {
    min-height: 50px;
    padding-right: 10px;
    background-color: #1f2836;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    cursor: pointer;

    display: -webkit-flex;
    display: flex;

    -webkit-align-items: center;
    align-items: center;
}

.chatbox__title h5 {
    height: 50px;
    margin: 0 0 0 15px;
    line-height: 50px;
    position: relative;
    padding-left: 20px;

    -webkit-flex-grow: 1;
    flex-grow: 1;
}

.chatbox__title h5 a {
    color: #fff;
    max-width: 195px;
    display: inline-block;
    text-decoration: none;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chatbox__title h5:before {
    content: '';
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    width: 12px;
    height: 12px;
    background: #4CAF50;
    border-radius: 6px;

    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.chatbox__title__tray,
.chatbox__title__close {
    width: 24px;
    height: 24px;
    outline: 0;
    border: none;
    background-color: transparent;
    opacity: 0.5;
    cursor: pointer;

    -webkit-transition: opacity 200ms;
    transition: opacity 200ms;
}

.chatbox__title__tray:hover,
.chatbox__title__close:hover {
    opacity: 1;
}

.chatbox__title__tray span {
    width: 12px;
    height: 12px;
    display: inline-block;
    border-bottom: 2px solid #fff
}

.chatbox__title__close svg {
    vertical-align: middle;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-width: 1.2px;
}

.chatbox__body,
.chatbox__credentials {
    padding: 15px;
    border-top: 0;
    background-color: #f5f5f5;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;

    -webkit-flex-grow: 1;
    flex-grow: 1;
}

.chatbox__credentials {
    display: none;
}

.chatbox__credentials .form-control {
    -webkit-box-shadow: none;
    box-shadow: none;
}

.chatbox__body {
    overflow-y: auto;
}

.chatbox__body__message {
    position: relative;
}

.chatbox__body__message p {
    padding: 15px;
    border-radius: 4px;
    font-size: 14px;
    background-color: #fff;
    -webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
    box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
}

.chatbox__body__message img {
    width: 40px;
    height: 40px;
    border-radius: 4px;
    border: 2px solid #fcfcfc;
    position: absolute;
    top: 15px;
}

.chatbox__body__message--left p {
    margin-left: 15px;
    padding-left: 30px;
    text-align: left;
}

.chatbox__body__message--left img {
    left: -5px;
}

.chatbox__body__message--right p {
    margin-right: 15px;
    padding-right: 30px;
    text-align: right;
}

.chatbox__body__message--right img {
    right: -5px;
}

.chatbox__message {
    padding: 15px;
    min-height: 50px;
    outline: 0;
    resize: none;
    border: none;
    font-size: 12px;
    border: 1px solid #ddd;
    border-bottom: none;
    background-color: #fefefe;
}

.chatbox--empty {
    height: 262px;
}

.chatbox--empty.chatbox--tray {
    bottom: -212px;
}

.chatbox--empty.chatbox--closed {
    bottom: -262px;
}

.chatbox--empty .chatbox__body,
.chatbox--empty .chatbox__message {
    display: none;
}

.chatbox--empty .chatbox__credentials {
    display: block;
}
        
        </style>
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
           <div class="sai1">
                 <form action="messages.php" method="POST" id="query">
                 <p><span class="headingi">Query BOX:</span></p> 
                <textarea class="attack1" rows="10" cols="80" maxlength="800" name=textdata></textarea>
                     <div class="subbut">
                    <input type="submit" name="submitBtnquery" value="SUBMIT"  class="btn login-btn" >  
                    </div>
                 </form>
            </div>  
        </div>
        
    </div> 
        <div class="chatbox chatbox--tray chatbox--empty">
    <div class="chatbox__title">
        <h5><a href="#">Customer Service</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body saira">
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="img/customercare.png" alt="Picture">
            <p>Hello....!</p>
        </div><br>
        
        
    </div>
        
    <div class="has-feedback">    
    <input class="sage chatbox__message" style="width:78%;" placeholder="Write something here." id="sage"/> 
    <button type="button" class="mesbutton btn btn-default  btn-sm" style="height:50px;width:20%;">
    <span class="glyphicon glyphicon-send form-control-has-feedback"></span>
    </button>    
    </div>
                
</div>
        
    </body>
</html>
