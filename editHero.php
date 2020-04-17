<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <?php
  require "dbConnect.php";
  require "header.php";

  $data = $_SESSON['heroes'][$id];
  $id = $_GET["id"];

  // $sql = "UPDATE heroes
  //       SET biography = $bio, image_url = $img
  //       WHERE id = $id"; 
  
  $result = $conn->query($sql);
?>
<div class="col-6">*************************
</div>

<?php
echo $id . '<id data>' . $data;

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hero = "hero.php?id=" . $row["id"];
    $name = $row["name"];
    $bio =  $row["biography"];
    $img =  $row["image_url"];
  } else {
    echo "0 results";
  }
  
  $conn->close();
  header("Location: ./heroForm.php?id=" . $id);
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>