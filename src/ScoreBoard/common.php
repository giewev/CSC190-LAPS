<?php
include_once("db.php");

function submitScore($uname, $grade)
{
     $grade = secure($grade);
     $uname = secure($uname);

     $qid = usersCurrentQid($uname);
     $insertScoreQuery = "INSERT INTO Scores(uname,qid,score) VALUES ('$uname','$qid','$grade');";
     executeSQL($insertScoreQuery);

     $newqid = ($qid+1) % 4;
     setCurrentQid($newqid);
}

function setCurrentQid($uname, $newId)
{
     $uname = secure($uname);
     $updateQuestionQuery = "UPDATE tbl_users SET qid = $newId WHERE uname = '$uname'";
     executeSQL($updateQuestionQuery);
}

function usersCurrentQid($uname)
{
     $uname = secure($uname);
     $q = "SELECT qid FROM tbl_users WHERE uname = '$uname'";
     $arr = executeSQL($q);
     return $arr[0]["qid"];
}

function qidToFileName($qid)
{
     if (array_key_exists($qid, $map))
     {
          $map = array(1 => "disableApache.tar", 2 => "insertFile.tar", 3 => "portScan.tar");
          return $map[$newqid];
     }
     else 
     {
          return "restartProblem.tar";
     }
}

?>