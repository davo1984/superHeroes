<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <?php
  require "dbConnect.php";
  require "header.php";
  $id = $_GET["id"];
  $sql = "SELECT * FROM heroes WHERE id = " . $id;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hero = "hero.php?id=" . $row["id"];
    $name = $row["name"];
    $bio =  $row["biography"];
    $img =  $row["image_url"];
  } else {
    echo "0 results";
  }
  ?>
  <!-- /* AFTER this */ -->

  <div class="container pl-5">
    <div class="row">
      <div class='display-1 text-center mt-5 mb-4'>
        SuperHero <?php echo $name ?>
      </div>
    </div>

    <div class="row">
      <div class="col-3 card card-body">
          <?php echo $bio; ?>
      </div>
    </div>


    <!-- //BEFORE this -->
    <?php
    $conn->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>