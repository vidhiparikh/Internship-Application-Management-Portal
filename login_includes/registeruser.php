<?php
    include_once("../includes/db.php");
    include_once("../functions.php");
    session_start();
    
    if(isset($_POST['register_user'])){
        extract($_POST);
        
        if(empty($user_email) || empty($user_firstname) || empty($user_lastname) || empty($user_confirm) || empty($user_password) || empty($user_contactno) ){
            echo "<h3 class = 'text-center'>Some Values Missing</h3>";
        } else{

            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
            $user_confirm = mysqli_real_escape_string($connection, $user_confirm);
            $user_password = mysqli_real_escape_string($connection, $user_password);
			$user_contactno = mysqli_real_escape_string($connection, $user_contactno);
            
            if($user_confirm === $user_password){
                
                $query = "SELECT * FROM users WHERE user_email = '$user_email'";
                $checkuseremail = mysqli_query($connection, $query);
                confirmQuery($checkuseremail);
                
                if(mysqli_num_rows($checkuseremail) > 0){
                    echo "<h2 class = 'text-center'>User Already Exists</h2>";
                    header("refresh: 2, url=../register.php#registerDiv");
                } else{
                   
                    $query = "INSERT INTO users (user_email, user_password, user_role) VALUES ('$user_email', '$user_password', 3)";

                    $add_user_query = mysqli_query($connection, $query);

                    confirmQuery($add_user_query);
                    $query = "SELECT * FROM users WHERE user_email = '$user_email'";
                    
                    $get_user_id = mysqli_query($connection, $query);
                    
                    confirmQuery($get_user_id);
					if($row = mysqli_fetch_assoc($get_user_id)){
                        extract($row);
						$user_id=$row['user_id'];
						$query = "INSERT INTO student(student_first_name,student_last_name,student_contactno,user_id,first_login)VALUES('$user_firstname','$user_lastname','$user_contactno',$user_id,0)";

						$add_student_query = mysqli_query($connection, $query);

						confirmQuery($add_student_query);


						echo "<h2 class = 'text-center'> User Registered Successfully. Please Login To Enjoy Our Services</h2>";

						header("refresh: 2, url=../index_login.php");

                }
            
            } 
			}
			else{
                echo "<h2 class = 'text-center'> Passwords Do Not Match</h2>";
            }
                
        
        
        
    }
	}

?>
