<?php 

session_start();
$id = 0;
$name = '';
$location = '';
$update = false;

$mysqli= new mysqli('localhost','root','','crud')or die("Could not connect to mysql".mysqli_error($mysqli));

//if the button is clicked
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    // insert data into the table
    mysqli_query($mysqli,"INSERT INTO data(name,location) VALUES('$name','$location')") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("Location:CRUD.php");
}

if(isset($_GET['delete'])){
   $id =  $_GET['delete'];
   mysqli_query($mysqli,"DELETE FROM data WHERE id=$id") or die(mysqli_error($mysqli));
 

   $_SESSION['message'] = "Record has been deleted!";
   $_SESSION['msg_type'] = "danger";
   header("Location:CRUD.php");
  
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($mysqli,"SELECT * FROM data WHERE id=$id") or die(mysqli_error($mysqli));

    // if(count($result)==1)
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
        
    
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    mysqli_query($mysqli,"UPDATE data SET name='$name',location='$location' WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

   
    header('location:CRUD.php');
}
