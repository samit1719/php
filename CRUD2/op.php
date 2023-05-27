<?php
  $con = new mysqli('localhost','root','','crudoperation') or die(mysqli_error($con));
  

  if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    mysqli_query($con,"DELETE FROM crud WHERE id=$id") or die(mysqli_error($con));

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("Location:display.php");
}
?>