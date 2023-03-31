<?php
session_start();
include "include/config.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$title = $_POST['title'];
$description = $_POST['content'];
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$loc = $_POST['location'];
$categ = $_POST['category'];
$keywords = $_POST['kwords'];
$user_id = $_SESSION['id'];

function remove_tags($value)
    {
        
        $data = strip_tags($value);
        return $value;
    }
//image transfer
move_uploaded_file($image_temp, "post_img/$image");

//SQL Injection
$title = remove_tage($title);
$description = remove_tags($description);
$image = remove_tags($image);
$loc = remove_tags($loc);
$categ = remove_tags($categ);
$keyword = remove_tags($keywords);

if($title == '' || $description == '' || $keywords == '' || $loc == '' || $categ == '' || $image == ''){
echo "<p class='alert alert-danger'>Please fill all fields</p>";
}else{
//inserting into database
$query = "INSERT INTO posts (post_title, post_content, post_keywords, post_image, category, location, auth_id)";
$query .= "VALUES ('$title', '$description', '$keywords', '$image', '$categ', '$loc', $user_id)";
$result = mysqli_query($conn, $query);
if(!$result){
echo "<p class='alert alert-danger'>Something went wrong!, please try again!</p>";

exit();
}else{
echo "<p class='alert alert-success'>Post Uploaded ✔</p>";
header( "location:dashboard.php" );
}
}
}


?>




<div class="row">
        <div class="container col-md-5 mt-5">
            <p class="fs-3 fw-bolder">Story seeker sign up</p>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
                    
                </div>

                <div class="d-flex justify-content-between">
                    <p>Have an account? <a href="signIn.php">Sign in.</a></p> <button type="submit"
                        class="btn btn-primary">Sign up</button>
                </div>
            </form>
        </div>
    </div>