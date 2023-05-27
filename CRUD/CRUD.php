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
    <?php require_once 'process.php';?>
    <?php
      if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php
                 echo $_SESSION['message'];
                 unset($_SESSION['message']);
              ?>
        </div>
        <?php endif ?>
    
  <div class="container">
    
    <?php
    //   connect to the database
      $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
      //select all from the database and store in result
      $result = mysqli_query($mysqli,"SELECT * FROM data") or die(mysqli_error($mysqli));
      ?>
    <div class="d-sm-flex  justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            // fetch each record until the end is reached
              while($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td>
                        <a href="CRUD.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>

        </table>
    </div>
    <div class="d-sm-flex  justify-content-center">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name" class="form-control" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" placeholder="Enter your location" class="form-control" value="<?php echo $location;?>">
        </div> <br>
        <div class="form-group">
            <?php
              if($update == true):?>
              <button type="submit" name="update" class="btn btn-info">Update</button>
            <?php else:?>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            <?php endif;?>
        </div>  
    </form>
    </div>
  </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>