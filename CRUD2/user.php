<?php 
   include 'connect.php';

   if(isset($_POST['save'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $mobile = $_POST['mobile'];
       $password = $_POST['pass'];

       mysqli_query($con,"INSERT INTO crud(name,email,mobile,password) values('$name','$email','$mobile','$password')") or die(mysqli_error($con));
       header('location:display.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Enter your password" class="form-control" autocomplete="off">
            </div><br>
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>