<?php
  include 'connect.php';
  
  
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
        
    <div class="container">
        <button class="btn btn-primary my-5" ><a href="user.php" class="text-light">Add user</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Operation</th>
                </tr>
                <?php
                  $result = mysqli_query($con,"SELECT * FROM crud") or die(mysqli_error($con));

                  while($row = $result->fetch_assoc()):
                
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <button class="btn btn-primary"><a href="update.php?updateid=<?php echo $row['id'];?>" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $row['id'];?>" class="text-light">Delete</a></button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </thead>
        </table>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>