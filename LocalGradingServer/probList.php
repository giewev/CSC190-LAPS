<hrml>
<head> </head>

<body>
<h1 onclick= run()> NO1. PROBLEM 1 </h1>

<script>
	function run(){
		$.post("168.254.236.102/service.php?op=runProblem", 
			{
			     pid : "1"
			},
		function(data, status){
		  if(data = "ok"){
		     window.location = "/LAPS/PROBLEM/problem.html";
		     location.reload();
		  }
		}	
	};
</script>
</body>

</html>
