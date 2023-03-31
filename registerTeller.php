<?php 
include 'includes/db_conn.php';
if (isset($_POST['submit'])) {
    
    extract($_REQUEST);

    $fname = strip_tags($_POST['first']);
    $lname = strip_tags($_POST['last']);
    $email = strip_tags($_POST['email']);
    $password = md5(strip_tags($_POST['password']));
    $confirmPsw = md5(strip_tags($_POST['cpassword']));


    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

   

    $fname = htmlspecialchars(mysqli_real_escape_string($conn, $fname));
    $lname = htmlspecialchars(mysqli_real_escape_string($conn, $lname));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $password));
    $cpassword = htmlspecialchars(mysqli_real_escape_string($conn, $cpassword));
    $image = htmlspecialchars(mysqli_real_escape_string($conn, $image));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $email));
    
    
        
            $sql = "SELECT * FROM tellers WHERE  email = '$email'";
            $result = mysqli_query($conn, $sql);
         
          if(!$result || mysqli_num_rows($result) == 0)  {
                 
                echo $sql = "INSERT INTO tellers (fname, lname, email, password, image) VALUES ('$fname', '$lname', '$email', '$password',  '$image')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                    header("Location: login.php?signupsuccess=true");
                    exit();
                }
                
            } else {
                    $showError = "Email already exists";
                    header("Location: registerTeller.php?signupsuccess=false&error=$showError");
                    exit();
            }
        }
    

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <?php //include "includes/navigation.php"?>
    <!--END NAVIGATION BAR--->
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6>
        <h1></h1>
        

    </div>
    <div class="row">
        <div class="container col-md-5 mt-5">
            <p class="fs-3 fw-bolder text-center"> sign up</p>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first" id="exampleInputEmail1" required aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last" required id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control"  required name="password" id="exampleInputPassword1">
                    
                </div>
                <div class=" mb-3">
                    <label for="exampleInputPassword1" class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="inputGroupFile01">
                </div>

                <div class="d-flex justify-content-between">
                    <p>Have an account? <a href="login.php">Sign in.</a></p> <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>