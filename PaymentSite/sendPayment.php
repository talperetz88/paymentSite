<?php include("connection.php"); ?>
<?php	
		session_start();
		if(isset($_SESSION['Email'])){
			if (mysqli_connect_error()) {
				die ("Database Connection Error");
			}
		}else{
			header("Location: index.php");
		}
	$quary = "SELECT * FROM `Members`";
	$res = mysqli_query($link,$quary);
	while($row = mysqli_fetch_array($res)){
	$to = $row['Phone']."@spikosms.com";
	echo $to;
	$quary1 = "SELECT `Members`.`Phone`,`practices`.`Name` from `Members` INNER JOIN `practices` ON `Members`.`Name`=`practices`.`Name`";
	$quary2 = "SELECT * FROM `practices` WHERE `Name` = '".mysqli_real_escape_string($link,$row['Name'])."'";
	$res1 = mysqli_query($link,$quary2);
	$numberOfPractis = mysqli_num_rows($res1);
	//echo $numberOfPractis;
	if($numberOfPractis%2 == 0){
	$price = 120+(30*($numberOfPractis/2)+35*($numberOfPractis/2));
	}else{
		$price = 120+(30*($numberOfPractis/2)+35*($numberOfPractis/2)+30);
	}
	$from = "Tal@paymentsite-com.stackstaging.com";
	$message = "This is a text".$price." message\nNew line...";
	$headers = "From: $from\n";
	echo '<br/>';
	var_dump(mail("525553033@SpikkoSMS.com", '', $message,$headers));
	echo "here";
	}


//number@SpikkoSMS.com


 ?>
 <?php
require 'class-Clockwork.php';

try
{
    // Create a Clockwork object using your API key
    $clockwork = new Clockwork( 'b69cae9dda47f49ddfd3fdd58320b549a96651ee' );

    // Setup and send a message
    $message = array( 'to' => '972525553033', 'message' => 'This is a test!' );
    $result = $clockwork->send( $message );

    // Check if the send was successful
    if($result['success']) {
		$msg = 'Message sent - ID: ' . $result['id'];
        echo "<script type='text/javascript'>alert('$msg');</script>";
    } else {
        echo 'Message failed - Error: ' . $result['error_message'];
    }
	header("Location : logInPage.php");
}
catch (ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}
?>
<script>
<?php if($result['success'])?>

</script>