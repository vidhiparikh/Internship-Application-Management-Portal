<?php
$manage=$_POST['manage'];
if($manage=="application"){
	include_once("../classes/Apply.php");
	if($_REQUEST['id']){
		$sid=$_REQUEST['id'];
		$apply = new Apply();
		$apply->updateApprove($sid);
	}
}
