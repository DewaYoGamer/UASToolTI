<?php
	$conn = mysqli_connect("localhost", "yoga","","datamahasiswati");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>