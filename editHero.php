<?php
//next 3 lines check for errors:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require "dbConnect.php";
  require "header.php";
  
  // collect variables
  $conn = $GLOBALS["conn"];
  $id = $_POST["id"];
  // cName=str_replace("'", "&#039;", $_POST['countryName']); escape tic
  // &#8220; &#8221; right and left double quotes
  $bio = str_replace("'", "&#039;", $_POST["bio"]);
  $bio = str_replace("\"", "&#8221;", $bio);
  $about_me = str_replace("'", "&#039;", $_POST["aboutMe"]);
  $about_me = str_replace("\"", "&#8221;", $bio);
  $name = str_replace("'", "&#039;", $_POST["name"]);
  $img = str_replace("'", "&#039;", $_POST["img"]);
  $method = $_POST["method"];
var_dump($method);
  // if to find which method
  // if ($method == 'updateHero') {
    // updateHero($bio, $about_me, $name, $img);
  // }
  
  /******************************
  **  updateHero function           
  */
  // function updateHero($bio, $about_me, $name, $img) {

  // echo print_r(" in editHero.php records fetched for id=" . $id . ' bio=' . $bio .
  // ' name=' . $name . ' about me=' . $about_me, 1) . PHP_EOL;   
  $sql = "UPDATE heroes 
    SET name='$name', about_me=$about_me, biography='$bio', image_url='$img'
    WHERE id=$id";
  // echo "<pre>" . print_r($sql, 1) . "</pre>";     // this will print "pretty" the sql
    echo "<pre>" . print_r($sql, 1) . "</pre>";     

  if ($GLOBALS["conn"]->query($sql)) {
    header("Location: /superHeroes/heroPage.php?id=" . $id);
  } 
  // continue and show result if error found!
// }
/**************
 * End of updateHero function
 */

  // show that the changes worked
  $sql = "SELECT * FROM heroes WHERE id=$id";

  $result = $GLOBALS["conn"]->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // $hero = "hero.php?id=" . $row["id"];
    $name = $row["name"];
    $bio =  $row["biography"];
    $img =  $row["image_url"];
  } else {
    echo "0 results for id=" . $id;
  }
  ?>
  <!-- //AFTER this -->

  <form action="./heroPage.php">
  <label for="name">Id:</label><br>
  <input type="text" id="id" name="id" value="<?php echo $id ?>"><br>
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
  $GLOBALS["conn"]->close();
  // <!-- This one goes back to the hero page after processing data -->
  header("Location: /superHeroes/heroPage.php?id=" . $id);
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>