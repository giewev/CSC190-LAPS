<?php
include_oonce("common.php");
$op = $_REQUEST["op"];
if($op== "Login")
{
    $uname = $_REQUEST["uname"];
    $pwd = $_REQUEST["pwd"];
    $val = log($uname,$pwd);
    print($val);
}
else if($op = "submitAndGetNext")
{
    $uname = $_REQUEST["uname"];
    $grade = $_REQUEST["pwd"];
    $link = submitCurrentAndGetNext($uname,$grade);
    print($link);
}
?>

