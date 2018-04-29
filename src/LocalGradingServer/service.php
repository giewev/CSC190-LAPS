<?php

	$op =$_REQUEST["OP"];
	if($OP == "login"){
		$uname=$_REQUEST["uname"];
		$pwd=$_REQUEST["pwd"];
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
