<?php
$conn = mysqli_connect('localhost','root','bhea@123','test');
$createrecord="insert into crontest (name) values('hi')";
	$createquery=mysqli_query($conn, $createrecord);
	echo "You have successfully created one record\n";
	?>
