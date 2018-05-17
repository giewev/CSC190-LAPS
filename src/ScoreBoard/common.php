<?php
include_once("db.php");

function submitScore($uname, $grade)
{
     $grade = secure($grade);
     $uname = secure($uname);
     $qid = usersCurrentQid($uname);

     $insertScoreQuery = "INSERT INTO scores(uname,qid,score) VALUES ('$uname','$qid','$grade');";
     executeSQL($insertScoreQuery);

     $newqid = ($qid+1) % 4;
     setCurrentQid($uname, $newqid);
}

function setCurrentQid($uname, $newId)
{
     $uname = secure($uname);
     $updateQuestionQuery = "UPDATE users SET qid = $newId WHERE name = '$uname'";
     executeSQL($updateQuestionQuery);
}

function usersCurrentQid($uname)
{
     $uname = secure($uname);
     $q = "SELECT qid FROM users WHERE name = '$uname'";
     $arr = executeSQL($q);
     return $arr[0]["qid"];
}

function qidToFileName($qid)
{
     $map = array(1 => "disableApache.tar", 2 => "insertFile.tar");
     if (array_key_exists($qid, $map))
     {
          return $map[$qid];
     }
     else 
     {
          return "restartProblem.tar";
     }
}

?>