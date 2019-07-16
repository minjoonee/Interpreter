#!/usr/bin/php
<?php

	$conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
	$board=$_SERVER['argv'];

	$db=mysqli_select_db($conn, "interpreter");
	$query="SELECT num, input1, input2 from board where num='$board[1]'";
	$result= mysqli_query($conn, $query);
	while($array = mysqli_fetch_array($result)){
		echo "$array[input1]\n";
		echo "$array[input2]";
	}


?>
