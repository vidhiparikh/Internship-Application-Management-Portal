<?php
	include_once("../../classes/Apply.php");
	if($_REQUEST['id']){
		$bid=$_REQUEST['id'];
		$apply = new Apply();
		$apply->deleteApply($bid);
	}
//request can be post,get or cookie.
?>