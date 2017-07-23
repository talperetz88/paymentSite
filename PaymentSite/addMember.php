<?php include("connection.php"); ?>
<?php 
		session_start();
		if(isset($_SESSION['Email'])){
			if (mysqli_connect_error()) {
				die ("Database Connection Error");
			}
		
		$quary = "SELECT * from practice";
		$res = mysqli_query($link,$quary);
		
		//$row = mysqli_fetch_array($res);
		}else{
			header("Location: index.php");
			
		}
		
		$error = "";
		$success ="";
		if(array_key_exists("submit",$_POST)){
			//print_r($_POST);
		if(mysqli_connect_error()){
			die("Database Connection Error");
		}

		//print_r($_POST);
		if(!$_POST['Name'] ){
			$error .= "Plese enter name<br>";
		}
		if(!$_POST['Email']){
			$error .= "Plese enter email<br>";
		}
		if(!$_POST['Phone']){
			$error .= "Plese enter phone number<br>";
		}
		if($error != ""){
			$error = "<p> There were erros(s) in you'r form</p> ".$error;
		}else{
			$quary = "SELECT * from `Members` WHERE `Email` = '".mysqli_real_escape_string($link,$_POST['Email'])."' AND Name = '".mysqli_real_escape_string($link,$_POST['Name'])."' LIMIT 1";
			$res = mysqli_query($link,$quary);
			//$row = mysqli_fetch_array($link,$res);
			//print_r($row);
			if(mysqli_num_rows($res) > 0){
				$error = "That member is already in DB.";
			}else{
				$quary = "INSERT INTO `Members` (`Id`, `Name`, `Email`, `Phone`) VALUES (NULL, '".mysqli_real_escape_string($link,$_POST['Name'])."', '".mysqli_real_escape_string($link,$_POST['Email'])."', '".mysqli_real_escape_string($link,$_POST['Phone'])."')";
				if (!mysqli_query($link, $quary)) {
                    $error = "<p>Could not add member - please try again later.</p>";
                } else{
					$success = "Payment added";//echo "yess!!";
				}
				
			}
		}
		}

?>


<?php include("header.php");?>
<?php include ("NavBar.php");?>
<div class = "container">
<div id = "error" ><?php  if($error !=""){
	echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	}
?></div>
<div id = "success" ><?php  if($success != ""){
	echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
}
	?></div>
<form id = "member" method = "post">
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Name</label>
  <div class="col-10">
    <input class="form-control" type="text" name = "Name" placeholder="Name" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="email" name = "Email" placeholder="example@example.com" id="example-search-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-email-input" class="col-2 col-form-label">Phone</label>
  <div class="col-10">
    <input class="form-control" type="text" name = "Phone" placeholder="+972 521112233" id="example-email-input">
  </div>
</div>
<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			  <button class="btn btn-primary" type="submit" name = "submit" >submit</button>
		</div>
</div>
</form>

<?php include("footer.php") ?>