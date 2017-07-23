<?php 

	$link = mysqli_connect("shareddb1c.hosting.stackcp.net","payment-32304373", "123456789!", "payment-32304373");
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>