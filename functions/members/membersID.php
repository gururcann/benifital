<?php
session_start();
$random = rand(0,99999999999);
$notMembersID = $random;
if(!isset($_SESSION["login"]) && !isset($_SESSION["membersID"])){
    $_SESSION["notMembersID"] = $notMembersID;
}
?>