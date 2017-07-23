<?php include("connection.php"); ?>
<?php 
		session_start();
		if(isset($_SESSION['Email'])){
			//echo $_SESSION['Email'];
		
			if (mysqli_connect_error()) {
				
				die ("Database Connection Error");
				
			}

		$quary = "SELECT * from practices";
		$res = mysqli_query($link,$quary);
		
		//$row = mysqli_fetch_array($res);
		}else{
			header("Location: index.php");
			
		}

?>


<?php include("header.php");?>
<?php include ("NavBar.php");?>
<div >
<table class="table table-bordered" id = "tableRes" align = "center">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
 <?php  $i = 1; ?>
  <?php while($row = mysqli_fetch_array($res)){ ?>
    <tr>
	<th scope ="row"><?php echo $i ?></th>
      <td><?php echo $row['Name'];?></td>
      
      <td><?php echo $row['Date'];?></td>
    </tr>
	<?php $i ++;
  }
  ?>
  </tbody>
</table>
</div>
<div align = "center">
<button type="button" onclick = "addPayment()" class="btn btn-primary">Add payment</button>
<button type="button" class="btn btn-primary">Send payment</button>
</div>
<script>
	function addPayment(){
		window.location.href = "addPayment.php";
	}
</script>
<?php include("footer.php") ?>