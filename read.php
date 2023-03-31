<?php
include 'includes/db_conn.php';
if (isset($_GET['view_id'])) {
    $id = $_GET['view_id'];
    
    
    $query = "SELECT * FROM post WHERE post_id=$id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        } else {
            die(mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Dashboard| Post</title>
     <style>
  .root-row{
    padding: 20px;
    border: 1px solid #000;
  }
  </style>
</head>
<body>
    <?php include "includes/navigation.php";?>
    <main>
        
        <div class="d-flex"> 
          
            <div class="container">
                        <div class="row root-row">
                            <div class="col-md-12">
                                            <h2><?php echo $row['title'];?></h2>
                                        </div>
                    					<div class="col-md-12">
                        					<img src="./storyteller/images/<?php echo $row['image'];?>" width="300" height="300" alt="">
                    					</div>
                						<div class="col-md-12">
                    						<?php echo $row['content'];?>
                						</div>
                					</div>
                    </div>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
   <div class="jumbotron text-center mt-5" >
   <!-- Copyright -->
   <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="/">World Stories</a>
  </div>
  <!-- Copyright -->
</div>
  </main>
</body>
</html>