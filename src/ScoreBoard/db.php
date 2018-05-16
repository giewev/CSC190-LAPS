<?php
//provide db operations
	//execute sql statement
	//return an array of associative array
	function executeSQL($q){
		//1. establish db connection
		$link = mysql_connect('localhost', 'root', 'goodyear123!@#');
		if (!$link) {
		    throw new Exception("error: ".mysql_error());
		}
		mysql_select_db("laps", $link);

		//2. do it
		$res = mysql_query($q, $link);
		if(!$res){
			throw new Exception("error in query: ".mysql_error());
		}

		//3. build up arrays
		$arrRet = array();
		while($row=mysql_fetch_assoc($res)){
			$arrRet []= $row;
		}
		return $arrRet;
	
	}

	function secure($txt){
		//1. establish db connection
		$link = mysql_connect('localhost', 'root', 'goodyear123!@#');
		if (!$link) {
		    throw new Exception("error: ".mysql_error());
		}
		return mysql_real_escape_string($txt, $link);
	}

	function check_password($usr, $pass)
	{
		$users = executeSQL("Select * from users where UPPER(name) = UPPER('".$usr."')");
		if (count($users) != 1)
		{
			return "Unknown User";
		}
		else if ($users[0]["pass"] == $pass)
		{
			return "Good";
		}
		else{
			return "Bad Password";
		}
	}

	function register($usr, $pass)
	{
		executeSQL("Insert into users(name, pass) values ('".$usr."', '".$pass."')");
	}

//TEST CASES
if(1==2){
/*
	executeSQL("INSERT INTO tbl_users(uname, pwd_hash, real_name) VALUES ('xfu', 'abc', 'evil')");
	$arr = executeSQL("SELECT * FROM tbl_users");
	print_r($arr);	
*/
	print(secure("abc'abc"));
}
?>
