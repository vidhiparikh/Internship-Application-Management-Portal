<?php
    define("SERVER","localhost");
    define("USER","vidhi");
    define("PASSWORD","vidhi123");
    define("DB","internado");
    $connection=mysqli_connect(SERVER,USER,PASSWORD,DB);
    
    if($connection){
       // echo "We are connected!!";
    }
?>