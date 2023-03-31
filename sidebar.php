<?php
$sql = "SELECT * FROM tellers WHERE tell_id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

 $image = $row['image'];
 $fname = $row['fname'];
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">World Stories</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../index.php" class="nav-link active" aria-current="page">
         
          Home
        </a>
      </li>
      <li>
        <a href="dashboard.php" class="nav-link text-white">
          
          Dashboard
        </a>
      </li>
      <li>
        <a href="makepost.php" class="nav-link text-white">
         
          Add Post
        </a>
      </li>
      
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- <img src="images/ alt="" width="32" height="32" class="rounded-circle me-2"> -->
        <strong><?php echo $fname;?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
    </ul>
  </div>
</div>