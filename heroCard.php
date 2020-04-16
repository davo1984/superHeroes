<?php

require "dbConnect.php";
require "header.php";

$id = $_GET["id"];
?>

<div class="col-4">
  <div class="card mb-3 bg-light" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $name; ?></h5>
      <p class="card-text"><?php echo $about; ?></p>
      <a href="<?php echo $heroPage ?>" class="btn btn-primary">About <?php echo $name; ?></a>
    </div>
  </div>
</div>