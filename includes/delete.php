<?php
$manage=$_POST['manage'];
if($manage=="application"){
	include_once("../classes/Apply.php");
	if($_REQUEST['sid']){
		$sid=$_REQUEST['sid'];
		$apply = new Apply();
		$apply->delete($sid);
	}
}
?>