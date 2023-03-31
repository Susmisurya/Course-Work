<?php
include "includes/db_conn.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg = strip_tags($_POST['message']);

    $sql = "INSERT INTO contact (email, message) VALUES ('$email', '$msg')";
    $result = mysqli_query($conn, $sql);
        if ($result) 
        {
                $showAlert = true;
                header("Location: contact.php?signupsuccess=true");
                exit();
                }
            else {
                $showError = "Process Failed try again";}

            } else{
                echo "";
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


   <?php include "includes/navigation.php";?>
    <!--END NAVIGATION BAR--->

    <div class="container pt-3">
        <p>Please leave us a message. Our team will get back to you soonest.</p>

        <form method="post">
             <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php
                        if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert"> successfull!</p>';
                        }
                    ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        



<div class="sticky-lg-bottom text-dark text-center">© World Stories 2023. All rights reserved.</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>