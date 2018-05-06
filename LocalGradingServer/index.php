<html>
<head>
<title> User Input</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>

<body>
    <div class= "Container">
       <div class = "row">
	  <div class = "col">
	    User Name : <input type ="text" id = "username" name ="name"><br>
	    Comment   : <input type ="text" id = "comment" name ="comment"><br>
	    <button class = "btn btn-success" onclick="verify();"> Submit </button><br>
          </div>
       </div>
    </div>

<script>
		function verify(){
			var uname = $("#username").val();
			var pwd = $("#comment").val();
			
			    $.post("/service.php?op=login",
			    {
				uname: uname,
				pwd: pwd 
			    },
			    function(data, status){				
				if(data = "ok"){
				    window.location = "/LAPS/problem/problem.html";
				    location.reload();
				}
				else{
					alert(" Error!! data : " +data);
				}				
			    });
		}
	</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

