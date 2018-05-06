<?php
	include_once("db.php");

	function mylog($msg){
	
		$myFile = fopen("logs.txt","a");
		fwrite($myFile, "\n", $msg);
		fclose($myFile);
	}

	function submitRequest($url){
		$fileContent = file_get_content($url);	
		return $fileContent;
	}


	function noName(){				//chekc the name of the function

		function login($uname , $pwd){
			global $Server;
			$url = $Server."service.php?op=login&uname=$uname&pwd=$pwd"; // check
			$res=submitRequest($url);
			if($res != "ok")return $res; // chekc "ok"
			
			//call submitandgetnext()
			submitAndGetNext($uname);
			return "ok"			// check "ok"	
 		}

		function runCmd($cmd){
			return exec($cmd); 	//given a string runs linux command and returns the output in  a string
		}

		function downloadAndExtract($link){
			global $Server, $PracImg;
			$url = $Server."DOWNLOAD/$link";
			$cmd = "wget $url -o /var/www/html/LAPS/tmp/$link";
			runCmd($cmd);
			$cmd2 = "tar-xvf /var/www/html/LAPS/tmp/$link -c PROBLEM";  //chek -c
	
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
	}

?>
