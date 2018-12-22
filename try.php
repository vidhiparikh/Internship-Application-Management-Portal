<?php
	include_once("classes/Student.php");
	$student_rollno = "172111";
	$year_of_study = 1;
	$semester = 4;
	$branch = 1;
	$course = "M Tech";
	$division = "A";
	$cv = "CV.pdf";
	$first_login = 1;
	$user_id = 15;
	$student = new Student();
	$student->insert($year_of_study, $semester, $course, $branch, $division, $student_rollno, $cv, $user_id);
	?>