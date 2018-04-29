<? 
fuction submitCurrentAndGetNextQ($uname,$grade)
{
     $uname = secure($uname);
     $grade = secure($grade);
     $q = "SELECT qid FROM tbl_users WHERE uname = '$uname'";
     $arr = executeSQL($q);
     $qid = $arr[0]["qid"];

     $q2 = "INSERT INTO Scores(uname,qid,score) VALUES ('$UNAME','$QID','$grade');";
     executeSQL($q2);
     
     $newqid = $qid+1;
     $q3 = "UPDATE tbl_users SET qid = $newqid 	WHERE uname = '$uname'";

     $map = array[1->"prob1.tar",2->"prob2.tar",3->"prob3.tar"];
     return $map[$newqid];
}