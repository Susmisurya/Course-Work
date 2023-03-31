<?php

include 'includes/db_conn.php';
if (isset($_POST['submit'])) {
    
    extract($_REQUEST);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['pwd']);
    


// if (empty($email)) {
//     header("Location: login.php?error=Email is required");
//     exit();
// } else if (empty($password)) {
//     header("Location: login.php?error=Password is required");
//     exit();
// }

$password = md5($password);
$sql = "SELECT * FROM tellers WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $email && $row['password'] === $password) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['tell_id'];
        header("Location:dashboard.php");
        
        } else {
            header("Location: login.php?error=Incorrect Email or password");
           
        }
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
    <title>Login</title>
</head>

<body>
    <?php //include "includes/navigation.php"?>
    <!--END NAVIGATION BAR--->
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6>
        <h1></h1>
        <p class="fs-4 fw-bold">
            
        </p>

    </div>
    <div class="row">
        <div class="container col-md-5 mt-5">
            <p class="fs-3 fw-bolder text-center"> sign in</p>
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" required class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" require class="form-control"  name="pwd" id="exampleInputPassword1">
                    
                </div>
            
                <div class="d-flex justify-content-between">
                    <p>Do not have an account yet? <a href="registerTeller.php">Sign up.</a></p> <button type="submit"
                        class="btn btn-primary" name="submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
