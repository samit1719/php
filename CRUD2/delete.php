<?php
  include 'connect.php';
  if(isset($_GET['deleteid'])){
      $id = $_GET['deleteid'];
      mysqli_query($con,"DELETE FROM crud WHERE id=$id") or die(mysqli_error($con));

      header("Location:display.php");
  }
  
  ?>