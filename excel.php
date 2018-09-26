<?php
session_start();      
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
include '_inc/dbconn.php';
$sender_id=$_SESSION["login_id"];
if(count($_POST) > 0 && isset($_POST["export_excel"])){
    $output = "";
    $date1 = $_SESSION['date1'];
    $date2 = $_SESSION['date2'];
    $sql="SELECT transactionid,transactiondate,narration,credit,debit,amount,descr FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
    $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
    if ($result && $rws = mysqli_fetch_array($result)) 
		{
	
			$output .= '  <table class="table" bordered="1">
							<thead>
								<tr>
									<th>Sr No.</th>
                                    <th>transactionid</th>
                                    <th>transactiondate</th>
                                    <th>credit</th>
                                    <th>debit</th>
                                    <th>Balance Amount</th>
                                    <th>Narration</th>
                                    <th>descr</th>
								</tr>
							</thead>
							<tbody>';	
			$sr = 1;
			do
			{
				$output .= '
					<tr>
                        <td>'.$sr.'</td>
                        <td>'.$rws['transactionid'].'</td>
                        <td>'.$rws['transactiondate'].'</td>
                        <td>'.$rws['credit'].'</td>
                        <td>'.$rws['debit'].'</td>
                        <td>'.$rws['amount'].'</td>
                        <td>'.$rws['narration'].'</td>
                        <td>'.$rws['descr'].'</td>
					</tr>';
	
		    $sr++;
			}
			while($rws = mysqli_fetch_array($result));
	
			 $output .= '	</tbody>
						</table>';
		
			header("Content-Type: application/xls");   
           	header("Content-Disposition: attachment; filename=statement.xls");  
           	echo $output;  
		}
}
?>