<?php
include_once("common.php");
include_once("db.php");
$op = $_REQUEST["op"];
if($op == "login")
{
    $uname = $_REQUEST["uname"];
    $pwd = $_REQUEST["pwd"];
    $val = check_password($uname,$pwd);
    print($val);
}
else if ($op == "register")
{
    $uname = $_REQUEST["uname"];
    $pwd = $_REQUEST["pwd"];
    $val = register($uname,$pwd);
}
else if($op == "submitScore")
{
    $uname = $_REQUEST["uname"];
    $grade = $_REQUEST["grade"];
    $link = submitScore($uname,$grade);
}
else if ($op == "reset")
{
    $uname = $_REQUEST["uname"];
    setCurrentQid($uname, 1);
}
else if ($op == "currentProblem")
{
    $uname = $_REQUEST["uname"];
    $qid = usersCurrentQid($uname);
    print(qidToFileName($qid));
}
?>

