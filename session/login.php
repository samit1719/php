<?php

  session_start();
     
 $mes1 = "";
 $mes2 = "";
 $con = mysqli_connect('localhost','root','','student') or die ('Unable To connect');

if(isset($_POST['un']) && isset($_POST['pass'])){
	 $un=$_POST['un'];
	 $pass=$_POST['pass'];
	if(!empty($un) && !empty($pass)){
		 $result = mysqli_query($con, "SELECT * FROM ALL_USER WHERE User_name='" . $un . "' and Password = '" . $pass . "'" );
         $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION ["uname"] = $row['User_name'];
			header( "Location:main.php");
        }else{
           $mes1 = "wrong user name or password";
        }
    }else{
		$mes2 = "please fill in all fields";
	}

}
if(isset($_POST['create'])){
	header("Location:create.php");
}
?>
<html>
  <head>
    <style type="text/css">
	  .x{
		 border:1px solid red;
		 width: 250px;
		 padding: 20px 12px 10px 20px;
		 position: absolute;
		 top:200px;
		 left:660px;
	  }
	</style>
  </head>
  <body>
    <h1 align="center">Loging Form</h1>
	<div class="x">
	<form action=" " method="post">
	<h3 style="color:red"><?php echo $mes2;?></h3>
	  Username <input type="text" name="un"><br><br>
	  Password <input type="password" name="pass"><br><br>
	<h3 style="color:red"><?php echo $mes1;?></h3>
	  <input type="submit" name="go" value="login"><br>
	  <input type="submit" name="create" value="create account">
	</form>
	</div>
  </body>
</html>
