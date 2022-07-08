<?php
session_start();
//LOGİN OLUNMAMIŞSA MEMBERSID
if(!isset($_SESSION["login"]) && !isset($_SESSION["membersID"])){
    $_SESSION["notMembersID"] = rand(0,99999999999);
}else{
//LOGİN OLUNMUŞSA MEMBERSID
    $_SESSION["membersID"] = 1;
}
?>