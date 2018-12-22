<?php
	include_once("Database.php");
	require_once("Session.php");
	require_once("Functions.php");
	class User{
        private $connection;
        public function __construct(){
            global $database;
            $this->connection=$database->getConnection();
            Session::startSession();
        }
		/**************************************************************
		*The below function is used to log in the user
		*It automatically assigns the session attributes
		*It is the responsibility of the CALLER to start the session
		*returns true if credentials were correct otherwise false.
		*************************************************************/
		public function processLogin($email, $password){
			
			
			$query = "SELECT * FROM users WHERE user_email = ?";
			$preparedStatement = $this->connection->prepare($query);
			$preparedStatement->bind_param("s", $email);//s stands for string,i for integer,d for double, b for blob.
			$preparedStatement->execute();
			
			$preparedStatement->store_result();//database ke saare columns locally leke aayega.method of php 7
			
			$count = $preparedStatement->num_rows;//store_result chala to hi num_rows will display value.
			if($count==1){
				$preparedStatement->bind_result($user_id, $user_email, $user_password, $user_role);
				$preparedStatement->fetch();
				if($password === $user_password){
					if($user_role == 2){
						$_SESSION['login'] = true;
						$_SESSION['user_email'] = $user_email;
						$_SESSION['user_id'] = $user_id;
						$_SESSION['user_role'] = $user_role;
					}
					else{
						$_SESSION['login'] = true;
						$_SESSION['user_email'] = $user_email;
						$_SESSION['user_id'] = $user_id;
						$_SESSION['user_role'] = $user_role;
					}
					return true;
				}else{
					return false;
				}
			}//method of php 7
			
		}
		
		public function get_session(){
			return $_SESSION['login'];
		}
		
		public function user_logout(){
			$_SESSION['login'] = false;
            $_SESSION['user_email']=null;
            $_SESSION['user_id'] = null;
            $_SESSION['user_role'] = null;
			session_destroy();
		}
		public static function checkActiveSession(){
		    if(!Session::isSessionStart()){
		        Functions::redirect("index_login.php");
        }
	}}
?>