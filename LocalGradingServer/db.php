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
		mysql_select_db("db_posts", $link);

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
