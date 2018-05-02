<?php
	include_once("common.php");

	$op =$_REQUEST["OP"];
	if($op == "login"){
		$uname=$_REQUEST["uname"];
		$pwd=$_REQUEST["pwd"];
		print($uname);
		print($pwd);
		
		$val=login($uname,$pwd);
		print($val);
	}
	else if($op= "submitAndGetNext"){
		$uname = $_REQUEST["uname"];
		$grade = $_REQUEST["grade"];
		$link = submitAndGetNextQ($uname,$grade);
		print($link);
	}
?>
