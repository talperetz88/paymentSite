<?php include("connection.php"); ?>
<?php
	session_start();
		$error = "";
	if(array_key_exists("submit",$_POST)){
		if(mysqli_connect_error()){
			die("Database Connection Error");
		}
		
		//print_r($_POST);
		if(!$_POST['email']){
			$error .= "Enter an email <br>";
		}
		if(!$_POST['password']){
			$error .= "Enter an password <br>";
		}
		if($error != ""){
			$error = "<p> There were erros(s) in you'r form</p> ".$error;
		}
		else{
			$quary = "SELECT * FROM user WHERE Email = '".mysqli_real_escape_string($link,$_POST['email'])."'";
			$res = mysqli_query($link,$quary);

			$row = mysqli_fetch_array($res);
			//print_r($row);
			$email = $row['Email'];
			//echo $email;
			
			if(array_key_exists("id",$row)){
				if($row['password'] == $_POST['password']){
					$_SESSION['Email'] = $email;
					header("Location: logInPage.php");
				}
			}
		
		}
	}


?>

<?php include("header.php"); ?>
  
	<div class = "container">
	<div id = "error" ><?php  if($error !=""){
	echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	}
?></div>
		<form class="form-horizontal" method = "post">
		  <div class="form-group">
			<div class="col-sm-10">
			  <input type="email" name = "email" class="form-control" id="inputEmail3" placeholder="Email">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-10">
			  <input type="password" name = "password" class="form-control" id="inputPassword3" placeholder="Password">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
				<label>
				  <input type="checkbox"> Remember me
				</label>
			  </div>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button class="btn btn-success" type="submit" name = "submit" >login</button>
			</div>
		  </div>
		</form>
		

	</div>
<?php include("footer.php"); ?>