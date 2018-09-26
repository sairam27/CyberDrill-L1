<?php 
session_start();      
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
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
<?php include 'header.php' ?>
    <div class="container mainsec section-padding ">
    <?php include 'side_tabs.php'?>    
        <div class="divider">
        <div class="wel">
            <div class="text">Welcome <?php echo $_SESSION['name']?></div>
        </div>
            <div class="statement" style="padding-top:30px;">
                 <h3 style="text-align:center;color:#2E4372;"><u>Account summary by Date</u></h3>
                <div class="date_pick" style="color:black;">
                <form action='transaction.php' method='POST'>
                    <div class="row" id="com_container"> 
                        <div class="col-lg-12 col-md-12 col-sm-12"><br>
                        	<div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;" >Start Date</label>
                                <div class="col-sm-4 col-md-3">
                                    <input id="datepicker" name="date1" width="276" required/>
                                </div>
					       </div>
                    	<div class="form-group">
						<label class="control-label col-sm-3 col-md-3 col-comn" style="padding-top:5px;">End Date</label>
						<div class="col-sm-4 col-md-3">
							<input id="datepicker1" name="date2" width="276" required/>
						</div>
                        </div> 
                            <div style="margin-left:200px;width:30%;">
                                <input type="submit" name="summary_date1" value="Go" class="summary_date1 btn btn-green btn-block btn-flat ">  
                            </div>
                        </div>
                        
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</body>