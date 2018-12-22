<?php
function check_user(){
        if(!isset($_SESSION['user_id'])){
            die("<p style='color:black; font-weight:bold; font-size: 20px;' class='text-center'>You have not logged in ,please login from <a href='index_login.php'>here</a></p>");
        }
        $user_id=$_SESSION['user_id'];
        return $user_id;
    }
	function confirmQuery($result){
		global $connection;
		if(!$result){
			die("QUERY FAILED :" .mysqli_error($connection));
		}
	}
    function get_user_email($user_id){
        /*Get the  email from user_id*/
        global $connection;

        $query="SELECT * FROM users where user_id=$user_id";
        $user_name_query=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($user_name_query);

        $user_email=$row['user_email'];
        return $user_email;
    }
?>