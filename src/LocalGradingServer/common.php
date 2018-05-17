<?php
	include_once("db.php");

	function mylog($msg){
	
		$myFile = fopen("logs.txt","a");
		fwrite($myFile, "\n", $msg);
		fclose($myFile);
	}

	function submitRequest($url){
		$fileContent = file_get_contents($url);
		return $fileContent;
	}

		function login($uname , $pwd){
			$Server = "http://192.168.56.3";
			$url = $Server."/service.php?op=login&uname=$uname&pwd=$pwd";

			$res = submitRequest($url);
			if($res != "Good\n")
			{
				return $res;
			}
			
			downloadAndRunCurrentProblem($uname);

			return "ok";
 		}

 		function downloadAndRunCurrentProblem($uname)
 		{
 			$fileName = currentProblemFileName($uname);
 			downloadAndExtract($fileName);
 			runCmd("python tmp/PROBLEM/setup.py");
 		}

 		function currentProblemFileName($uname)
 		{
 			$Server = "http://192.168.56.3";
			$url = $Server."/service.php?op=currentProblem&uname=$uname";

			$fileName = submitRequest($url);
			return $fileName;
 		}

		function runCmd($cmd){
			return exec($cmd); 	//given a string runs linux command and returns the output in  a string
		}

		function downloadAndExtract($fileName){
			$fileName = str_replace("\n", "",$fileName);
			$Server = "http://192.168.56.3";
			$url = $Server."/Problems/$fileName";

			$cmd = "wget $url -O /var/www/html/tmp/$fileName";
			runCmd($cmd);

			$cmd2 = "rm -rf /var/www/html/tmp/PROBLEM && mkdir /var/www/html/tmp/PROBLEM -p && tar -xvf /var/www/html/tmp/$fileName -C /var/www/html/tmp/PROBLEM";
			runCmd($cmd2);

			$cmd3 = "mv /var/www/html/tmp/PROBLEM/*/* /var/www/html/tmp/PROBLEM/";
			runCmd($cmd3);
		}

		function submitScore($uname){
			$grade = runCmd("python tmp/PROBLEM/grade.py");
			print($grade);
			$url= "http://192.168.56.3/service.php?op=submitScore&uname=$uname&grade=$grade";
			submitRequest($url);

			downloadAndRunCurrentProblem($uname);
		}

		function resetUser($uname)
		{
			$url= "http://192.168.56.3/service.php?op=reset&uname=$uname";
			submitRequest($url);

			downloadAndRunCurrentProblem($uname);
		}

		function submitAndGetNext($uname){
			global $Server, $PracImage;
			mylog("step 1. getting grade \n");
			$grade = runCmd("python PROBLEM/grade.py");
			mylog("step2. grade is $grade \n");

			//submit

			$url= $Server. "service.php?op=submitAndGetNextQ & uname=$uname&grade=$grade";  //chekc
			mylog("step3. submit grade url : $url \n");
			$link = submitRequest($url);
			mylog("step4. link is $link \n");

			//extract the link
			mylog("download and extract \n");
			downloadAndExtract($link);         //chekc
			mylog("step 6. run setup.py \n");
			

			//execute the setup
			runCmd("python PROBLEM/setup.py");
			return "ok";
		}	
	

?>
