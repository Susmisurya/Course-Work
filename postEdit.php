<?php
include 'includes/db_conn.php';
echo $getId = $_GET['id'];
$id = $_SESSION['id'];
if(isset($_POST['submit'])){
    extract($_REQUEST);
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$category = $_POST['category'];
$id = $_SESSION['id'];
$location = $_POST['location'];

move_uploaded_file($image_temp, "images/$image");


$title = strip_tags($title);
$content = strip_tags($content);
$image = strip_tags($image);
$location = strip_tags($location);
$category = strip_tags($category);


//inserting into database
 $query = "UPDATE post SET title='".$title."',content='".$content."', image='".$image."',location='".$location."',category= '".$category."' WHERE post_id ='".$getId."'";

$result = mysqli_query($conn, $query);
if(!$result){
echo "<p class='alert alert-danger'>OOps! Please try again.</p>";


}else{
echo "<p class='alert alert-success'>Post Upload successful</p>";
header( "Location:dashboard.php" );
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
    <title>Make Post</title>
    
</head>
<body>
    <main>
        <div class="d-flex"> 
          <?php  include ('includes/sidebar.php');?>
            <div class="container justify-content-center">
                <h2>Create Post</h2>
                <?php
    
                    $sql = "SELECT * FROM post where post_id = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <form method="post" class="row g-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputEmail4"  name="title" value="<?php echo $row['title']; ?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Location</label>
                        <input type="text" class="form-control" id="inputCity" name="location" value="<?php echo $row['location']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="category"required>
                        <option  value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                        <option value="entertainment">Food</option>
                        <option value="Science">Science and Technology</option>
                        <option value="romance">Entertainment</option>
                        </select>
                    </div>
                   <div class=" mb-3 col-md-6">
                    <label for="inputState" class="form-label">Image Uplaod</label>

                        <input type="file" class="form-control" id="inputGroupFile02" value="<?php echo $row['image']; ?>"  name="image" required>
                    </div>
                    <div class="form-floating mb-3 col-md-12">
                         Description
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" required ><?php echo $row['content']; ?></textarea>
                        <label for="floatingTextarea"></label>
                    </div>
                       
                    <button type="submit" name="submit" class="btn btn-primary">Make Post</button>
                </form>
            </div>
            <script type="text/javascript">
 
               CKEDITOR.replace( 'content' );
                
            </script>
        </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© World Stories 2023. All rights reserved.</div>
  </main>
</body>
</html>