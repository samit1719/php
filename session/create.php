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
    <h1 align="center">create an account</h1>
	<div class="x">
	<form action=" " method="post">
	  Username <input type="text" name="un"><br><br>
	  Password <input type="password" name="pass"><br><br><br>
	  <input type="submit" name="create" value="create account"><br>
	  <input type="submit" name="go" value="login">
	</form>
	</div>
  </body>
</html>

<?php
  if(isset($_POST['create'])){
	  $uname = $_POST['un'];
	  $pass = $_POST['pass'];
	  
	  $con = mysqli_connect('localhost','root','','student') or die ('Unable To connect');
	  mysqli_query($con,"INSERT INTO ALL_USER(User_name,Password) VALUES('$uname','$pass')");
  }
  if(isset($_POST['go'])){
	  header("Location:login.php");
  }