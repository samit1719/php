<?php
   session_start();
   if(isset($_SESSION['uname'])){
     echo "<h1>Welcome ".$_SESSION['uname']."</h1>";
     echo "<a href='logout.php'>logout</a>";
   }else{
	 echo "<h1>Please login first .</h1><br><a href=\"login.php\">click here to login</a>" ;
     session_destroy();
   }
   
?>