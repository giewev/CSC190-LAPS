
 <?php  
$conn = mysql_connect("localhost", "root", "goodyear123!@#");
if (!$conn)
{
	echo "Failed";
}
mysql_select_db("laps", $conn);

 ?>
 
<!DOCTYPE html>  
 <html>  
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
      <head>  
           <title>List PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
            <br /><br />  
            <table style="width:100%">
            <tr>
              <th>Username</th>
              <th>Q1</th> 
              <th>Q2</th>
              <th>Total</th>
            </tr>
       
                          <?php

                          $q = "select * from users";
                          $response = mysql_query($q, $conn);
                          while($userRow = mysql_fetch_assoc($response))  
                          {
                            $user = $userRow["name"];

                            echo '<tr><td>'.$user.'</td>';

                            $q1Query = "select * from scores where uname = '$user' and qid = '1' order by score desc";
                            $q1Score = mysql_fetch_assoc(mysql_query($q1Query, $conn))["score"];
                            if ($q1Score == NULL)
                            {
                              $q1Score = 0;
                            }

                            echo '<td>'.$q1Score.'</td>';

                            $q2Query = "select * from scores where uname = '$user' and qid = '2' order by score desc";
                            $q2Score = mysql_fetch_assoc(mysql_query($q2Query, $conn))["score"];
                            if ($q2Score == NULL)
                            {
                              $q2Score = 0;
                            }

                            echo '<td>'.$q2Score.'</td>';
                            echo '<td>'.($q1Score + $q2Score).'</td>';
                          }
                          echo '</tr>';

                          
                          ?>  
                      </table>
      </body>  
 </html>  
