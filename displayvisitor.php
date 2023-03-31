<?php
session_start();
include 'includes/db_conn.php';
$user_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Posts</title>
    
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include 'includes/sidebar.php';?>

            <table class="table table-striped table-hover">
              <?php
                        if (isset($_GET['deletesuccess']) && $_GET['deletesuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert">Delete successful!</p>';
                        }
                    ?>
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Manage</th>
                
                
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM contact";
                $result = mysqli_query($conn, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['id'];
                        $email = $row['email'];
                        $message = substr($row['Message'],0,30);
                        
                        
                        echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$email.'</td>
                             <td>'.$message.'</td>
                            <td>
                                <a href="seekerDelete.php?del='.$id.'"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                            <td>
                        </tr>';
                    }
                }
            
            ?> 
            </tbody>
          </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© World Stories 2023. All rights reserved.</div>
  </main>
</body>
</html>