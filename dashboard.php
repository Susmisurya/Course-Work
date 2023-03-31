<?php
include 'includes/db_conn.php';
 $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard|Home</title>
    <style>
        .active2{
            background-color:#337ab7;
            border-color:#337ab7;
        }
    </style>
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include('includes/sidebar.php');?>

            <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Location</th>
                <th scope="col">Content</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                <?php
    
                $sql = "SELECT * FROM post where tell_id = $id";
                $result = mysqli_query($conn, $sql);

                if($result){
                    $i=1;
                    while($row = mysqli_fetch_assoc($result)){

                        $post_id = $row['post_id'];
                        $title = $row['title'];
                        $content = substr($row['content'],0,20);
                        
                       ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><a href="postEdit.php?id=<?php echo $row['post_id']; ?>"class="btn btn-primary">Edit</a></td>
                    <td><a href="postDelete.php?id=<?php echo $row['post_id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                $i++;
            }
                    }
                ?>
            </tbody>
          </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© company name 2023. All rights reserved.</div>
  </main>
</body>
</html>