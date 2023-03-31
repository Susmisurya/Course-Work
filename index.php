<?php

include "includes/db_conn.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .root-row{
    padding: 20px;
    border: 1px solid #000;
  }
  </style>
</head>
<body>

<?php include "includes/navigation.php";?>


<div class="container" style="margin-top:30px">

  <div class="row root-row">
    <?php
                
        $sql = "SELECT * FROM post ORDER BY post_id  DESC LIMIT 1 ";
        $result = mysqli_query($conn, $sql);
        if($result){

            while($post = mysqli_fetch_assoc($result))
            {   

        
           ?>
    <div class="col-md-5"> 
        <img src="./storyteller/images/<?=$post['image'];?>" style="height:300px; width: 450px; margin-left:-15px;" />
    </div>
    <div class="col-md-7"> 
        <h3><a href="read.php?view_id=<?=$post['post_id'];?>"><?=$post['title'];?></a></h3>
        <p class="fs-3"><?=$post['content'];?></p>
        
    </div>
    <?php
        }
    }
    ?>
  </div>
 <br>
  <div class="row root-row">
    <div class="col-md-3"> 
    </div>
    <div class="col-md-4"> 
        <p >Share your story with us.
    </p>
    </div>
    <div class="col-md-5"> 
        <a class="btn btn-info" href="../storyteller/registerTeller.php">Become a storyteller</a>
    </div>
    
  </div>
    <BR>
  <div class="row root-row">
    <div class="col-md-12">
        <h2>Lastest Stories:</h2>
    </div>
    <?php
                
        $sql = "SELECT * FROM post ORDER BY post_id  DESC LIMIT 3";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($post = mysqli_fetch_assoc($result))
            {   
           ?>
    <div class="col-md-4"> 
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="./storyteller/images/<?=$post['image'];?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><a href=""></a><?=$post['title'];?></h5>
               <a href="read.php?view_id=<?=$post['post_id'];?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
    <?php
            }
        }

    ?>
                                    </div>
<div class="jumbotron text-center mt-5" >
   <!-- Copyright -->
   <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="/">World Stories</a>
  </div>
  <!-- Copyright -->
</div>

</body>
</html>
