<?php
session_start();
require 'include/config.php';
?>
<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    
    $sql = "DELETE FROM tellers where tell_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: displayseeker.php?deletesuccess=true");
        exit(0);
        } 
        else {
            die(mysqli_error($conn));
        }
    }


?>
