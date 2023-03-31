<?php
session_start();
require 'includes/db_conn.php';
?>
<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    
    $sql = "DELETE FROM post where post_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: displayPost.php?deletesuccess=true");
        exit(0);
        } 
        else {
            die(mysqli_error($conn));
        }
    }


?>
