<?php

include 'includes/db_conn.php';
 $getId = $_GET['id'];
 $sql = "DELETE FROM post WHERE post_id=$getId";

if ($conn->query($sql) === TRUE) {
  echo "<p class='alert alert-danger'>OOps! Please try again.</p>";
}else{
echo "<p class='alert alert-success'>Post Upload successful</p>";
header( "Location:dashboard.php" );
}

?>