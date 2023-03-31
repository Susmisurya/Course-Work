<?php
session_start();
include "includes/db_conn.php";



//update post
if(isset($_POST['submit'])){
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$category = $_POST['category'];
$location = $_POST['location'];
move_uploaded_file($image_temp, "images/$image" );
if(empty($image)){
$query = "SELECT * FROM post WHERE post_id=$id1 ";
$image1 = mysqli_query($conn, $query);
$row = mysqli_fetch_array($image1);
$image = $row['image'];
}

//SQL Injection
$title = htmlspecialchars(mysqli_real_escape_string($conn, $title));
$image = htmlspecialchars(mysqli_real_escape_string($conn, $image));
$image_temp = htmlspecialchars(mysqli_real_escape_string($conn, $image_temp));
$content = mysqli_real_escape_string($conn, $content);
$location = htmlspecialchars(mysqli_real_escape_string($conn, $location));
//SQL Injection

//check title, content and category and location
if($title == '' || $content == '' || $category == '' || $location == ''){
echo "<p class='alert alert-danger' style='width: 60%'>Please fill all fields</p>";
}else{
 $now = date( 'd-m-Y h:i:s A', time () );
//query
$query = "UPDATE post SET title = '$title', content = '$ontent', image='$image',  location = '$location', category= '$category', update= $now WHERE post_id = $id1";
//update query
$update_posts = mysqli_query($conn, $query);
if(!$update_posts){
echo "<p class='alert alert-danger' style='width: 60%'>Process Failed, please try again!</p>";

}else{
echo "<p class='alert alert-success'>Post Updated</p>";
header( "Location:dashboard.php" );
}
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
    <title>Edit Post</title>
    
</head>
<body>
<?php
if(isset($_GET['edit_id'])){
$id = $_GET['edit_id'];
$query1 = "SELECT * FROM post WHERE post_id=$id";
$result1 = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result1);
$id1 = $row['post_id'];
$title = $row['title'];
$image = $row['image'];
$content = $row['content'];
$location = $row['location'];
$category = $row['category'];
}
?>
    <main>
        
        <div class="d-flex"> 
          <?php include 'includes/sidebar.php';?>
            <div class="container justify-content-center">
                <h2>Create Post</h2>
                <form method="post" class="row g-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputEmail4"  value="<?php echo $title;?>" name="title" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Location</label>
                        <input type="text" class="form-control" id="inputCity"  value="<?php echo $location;?>" name="location" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="category"required>
                        <option selected value="<?php echo $category;?>"><?php echo $category;?></option>
                        <option value="entertainment">Entertainment</option>
                        <option value="science">Science and Technology</option>
                        <option value="romance">Entertainment</option>
                        </select>
                    </div>
                   <div class="input-group mb-3 col-md-12">
                        <input type="file" class="form-control" id="inputGroupFile02" accept="image/*" name="image" required>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        <img src="image/ <?php echo $image;?>" width="50" height="50" alt="">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" required> <?php echo $content;?></textarea>
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
