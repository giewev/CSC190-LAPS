<?php
	include_once("common.php");

	$op = $_REQUEST["op"];
	if($op == "login"){
		$uname=$_REQUEST["uname"];
		$pwd=$_REQUEST["pwd"];
		
		$val=login($uname,$pwd);
		print($val);
	}
	else if($op== "submit"){
		$uname = $_REQUEST["uname"];
		$link = submitScore($uname);
		print($link);
	}
	else if ($op == "reset")
	{
		$uname = $_REQUEST["uname"];
		resetUser($uname);
	}
	else if ($op == "runProblem")
	{
		$number = $_POST["pid"];
		downloadAndExtract("challenges/problem".$number.".tar");
		runCmd("python PROBLEM/setup.py");
	}
?>
