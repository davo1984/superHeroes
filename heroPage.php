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

      <div class="col-3">
        <img src="<?php echo $img ?>" class="img-fluid" alt="Responsive image">
      </div>

      <div class="col-3 card card-body">
        <!-- TODO place friends list -->
        <div class="card-body">
          <h5 class="card-title">Friends</h5>
          <p class="card-text"><?php echo $about; ?></p>

          <?php
          // SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
          // FROM Orders
          // INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
          $sql = "SELECT ability 
                  FROM abilities 
                  INNER JOIN ability_hero ON abilities.id=abilities_hero.ability_id
                  INNER JOIN heroes ON abilities.hero_id=heroes.id 
                  WHERE heroes.id=" . $id;
          
          $abilityResult = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            while ($abilityRow = $result->fetch_assoc()) {
              $ability = $abilityRow["ability"];
          ?>
              <li><?php $ability ?></li>

            <?php
            }
          } else {
            ?>
            <li>Super Villains have no friends!</li>
          <?php
          }
          ?>
        </div>
      </div>

      <div class="col-3 card card-body">
        <!-- TODO place enemies list -->
        <div class="card-body">
          <h5 class="card-title">Enemies</h5>
          <p class="card-text"><?php echo $about; ?></p>
          <a href='<?php echo $heroPage; ?>' class="btn btn-primary">About <?php echo $name; ?></a>
        </div>
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