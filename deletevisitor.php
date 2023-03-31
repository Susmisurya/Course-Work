<?php
session_start();
require 'include/config.php';
?>
<?php
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    
    $sql = "DELETE FROM contact where post_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: dashboard.php?deletesuccess=true");
        exit(0);
        } 
        else {
            die(mysqli_error($conn));
        }
    }


?>
