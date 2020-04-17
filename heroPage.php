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
  $heroForm = './heroForm.php?id=' . $id;

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hero = "./heroPage.php?id=" . $row["id"];
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
      <div class="col-3 card">
        <div class="card-body">
          <img class="card-img-bottom" src="<?php echo $img ?>" alt="Image of Our Hero">
          <p>
            <?php echo $bio; ?>
          </p>
          <a href='<?php echo $heroForm; ?>' class="btn btn-primary">Edit Bio</a>
        </div>
      </div>

      <div class="col-3 card card-body">
        <!-- TODO place friends list -->
        <div class="card-body">
          <h5 class="card-title">Abilities</h5>
          <p class="card-text">

            <?php
            $sql = "SELECT ability 
                    FROM abilities 
                    INNER JOIN ability_hero ON abilities.id=ability_hero.ability_id 
                    INNER JOIN heroes ON ability_hero.hero_id=heroes.id 
                    WHERE heroes.id=" . $id;

            $abilityResult = $conn->query($sql);

            if ($abilityResult->num_rows > 0) {
              $ability = '';
              while ($abilityRow = $abilityResult->fetch_assoc()) {
                echo "<li>$abilityRow[ability]</li>";
              }
            } else {
            ?>
              <li>A Powerless Superhero!?</li>
            <?php
            }

            ?>
          </p>
        </div>
      </div>
      <div class="col-3 card card-body">

        <div class="card-body">
          <h5 class="card-title">Friends</h5>
          <p class="card-text">
            <?php
            $sql = "SELECT DISTINCT name AS friend FROM relationships 
                INNER JOIN heroes ON heroes.id=relationships.hero1_id || heroes.id=relationships.hero2_id 
                INNER JOIN relationship_types ON relationships.type_id=relationship_types.id 
                WHERE (relationships.hero1_id=$id || relationships.hero2_id=$id) && relationship_types.id=1 
                ORDER BY name ASC ";

            $friendsResult = $conn->query($sql);

            if ($friendsResult->num_rows > 0) {
              $ability = '';
              while ($friendsRow = $friendsResult->fetch_assoc()) {
                if ($name != $friendsRow['friend']) {
                  echo "<li>$friendsRow[friend]</li>";
                }
              }
            } else {
            ?>
              <li>Supervillans have no friends!</li>
            <?php
            }
            ?>
          </p>
          <a href='<?php echo $heroPage; ?>' class="btn btn-primary">Edit Friends</a>
        </div>
      </div>

      <div class="col-3 card card-body">

        <div class="card-body">
          <h5 class="card-title">Enemies</h5>
          <p class="card-text">
            <?php
            $sql = "SELECT DISTINCT name AS friend FROM relationships 
                INNER JOIN heroes ON heroes.id=relationships.hero1_id || heroes.id=relationships.hero2_id 
                INNER JOIN relationship_types ON relationships.type_id=relationship_types.id 
                WHERE (relationships.hero1_id=$id || relationships.hero2_id=$id) && relationship_types.id=2 
                ORDER BY name ASC ";

            $friendsResult = $conn->query($sql);

            if ($friendsResult->num_rows > 0) {
              $ability = '';
              while ($friendsRow = $friendsResult->fetch_assoc()) {
                if ($name != $friendsRow['friend']) {
                  echo "<li>$friendsRow[friend]</li>";
                }
              }
            } else {
            ?>
              <li>He\'s so nice even Supervillans like him!</li>
            <?php
            }
            ?>
          </p>
          <a href='<?php echo $heroPage; ?>' class="btn btn-primary">Edit Enemies</a>
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