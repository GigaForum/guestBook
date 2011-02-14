<?php

	$mysqli = new mysqli($config["db_server"], $config["db_user"], $config["db_pass"], $config["db_name"]);
	
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>