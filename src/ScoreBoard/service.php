<?php
include_once("common.php");
include_once("db.php");
$op = $_REQUEST["op"];
if($op== "Login")
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
else if($op == "submitAndGetNext")
{
    $uname = $_REQUEST["uname"];
    $grade = $_REQUEST["pwd"];
    $link = submitCurrentAndGetNext($uname,$grade);
    print($link);
}
?>

