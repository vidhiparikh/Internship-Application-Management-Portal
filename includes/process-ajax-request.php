<?php
	$manage=$_POST['manage'];
	if($manage=="student"){
	require_once("../classes/Student.php");
	$student= new Student();
	if(isset($_POST['rows'])){
		$numRows=$_POST['rows'];
		if($numRows==0){
			$numRows=$student->studentPerPage;
		}
	}
	$student->displayStudentWithPagination($numRows);
}
else if($manage=="application"){
	require_once("../classes/Apply.php");
$apply= new Apply();
if(isset($_POST['rows'])){
	$numRows=$_POST['rows'];
	if($numRows==0){
		$numRows=$apply->recordsPerPage;
	}
}
$id=$_POST['id'];
$apply->displayRecordsWithPagination($numRows, $id);

}
else if($manage=="internship"){
	require_once("../classes/Internship.php");
$internship= new Internship();
if(isset($_POST['rows'])){
	$numRows=$_POST['rows'];
	if($numRows==0){
		$numRows=$internship->recordsPerPage;
	}
}
$id=$_POST['id'];
$internship->displayRecordsWithPagination($numRows, $id);

}else if($manage=="first_login"){
	
}

?>