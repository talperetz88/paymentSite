<?php include("connection.php"); ?>
<?php 
		session_start();
		
		$error = "";
		$success ="";
		if(array_key_exists("submit",$_POST)){
			//print_r($_POST);
		if(mysqli_connect_error()){
			die("Database Connection Error");
		}

		//print_r($_POST);
		if($_POST['select'] == 'Choose'){
			$error .= "plese choose participator<br>";
		}
		if($error != ""){
			
		}else{
			///$quary1 = "SELECT * from `Members` WHERE `Name` = '".mysqli_real_escape_string($link,$_POST['select'])."' LIMIT 1";
			//$res1 = mysqli_query($link,$quary1);
			//$row1 = mysqli_fetch_array($res1);
			//print_r($row1);
			$quary2 = "INSERT INTO `practices` (`Name`, `Date`, `Id`) VALUES ('".mysqli_real_escape_string($link,$_POST['select'])."','".mysqli_real_escape_string($link,$_POST['Date'])."', 'NULL')";
		        if (!mysqli_query($link, $quary2)) {
					$error = "<p>Could not enter payment - please try again later.</p>";
				}else{
					$success = "Payment added";//echo "yess!!";
				}
		}
		}
		if(isset($_SESSION['Email'])){
			if (mysqli_connect_error()) {
				
				die ("Database Connection Error");
				
			}
		$quary = "SELECT * from Members";
		$res = mysqli_query($link,$quary);
		
		//$row = mysqli_fetch_array($res);
		}else{
			header("Location: index.php");
			
		}

?>

<?php include("header.php");?>
<?php include("NavBar.php");?>

<div class = "container">
<div id = "error" ><?php  if($error !=""){
	echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	}
?></div>
<div id = "success" ><?php  if($success != ""){
	echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
}
	?></div>

<form class="form-horizontal" method = "post">
  <div class="form-group">
    <label for="exampleSelect1"><h4>Participator</h4></label>
    <select name = "select" class="form-control" id="exampleSelect1">
	<option selected>Choose</option>
	<?php  $i = 1; ?>
	<?php while($row = mysqli_fetch_array($res)){ ?>
      <option><?php echo $row['Name'];?></option>
	<?php }
	$i++?>
    </select>
  </div>
  
    <div class="form-group">
    <label for="exampleInputPassword1"><h4>Date of practice</h4></label>
    <input  class="form-control" type="date" name = "Date" id="example-date-input">
  </div>
  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			  <button class="btn btn-primary" type="submit" name = "submit" >submit</button>
		</div>
	</div>
  </div>
  <form>
  
<?php include("footer.php") ?>