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
  echo '$id=' . $id;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // $hero = "hero.php?id=" . $row["id"];
    $name = $row["name"];
    $bio =  $row["biography"];
    $img =  $row["image_url"];
  } else {
    echo "0 results for id=" . $id;
  }
  // $data = getHeroData($id);
  $_SESSION['heroes'][$id] = $row;  // originally was $data vice $row
  echo $result->num_rows . " records fetched for id=" . $id . ' name=' . $name;
  ?>
  <!-- //AFTER this -->

  <form action="./editHero.php?id=<?php echo $id ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name ?>"><br>
    <label for="aboutMe">About Me:</label><br>
    <input type="text" id="aboutMe" name="aboutMe" value="<?php echo $about_me ?>"><br>
    <label for="bio">Biography:</label><br>
    <input type="text" id="bio" name="bio" value="<?php echo $bio ?>"><br><br>
    <label for="img">Image URL:</label><br>
    <input type="text" id="img" name="img" value="<?php echo $img ?>"><br><br>
    <input type="submit" value="Submit">
  </form>


  <!-- //BEFORE this -->
  <?php
  $conn->close();
  // <!-- This one goes back to the hero page after processing data -->
  // header("Location: /heroPage.php?id=" . $id);
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>