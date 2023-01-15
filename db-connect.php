<?php
    //Connect to DB
    $conn = mysqli_connect('localhost', 'root', '', 'myhome_db');
    if(!$conn){
		echo 'Connection error';
	}
	$conn->set_charset("utf-8");
?>