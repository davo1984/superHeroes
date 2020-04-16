<?php
require "./dbConnect.php";
require "./header.php";

$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);
?>

<div class="container pl-5">
  <div class='display-1 text-center mt-5 mb-4'>
    SuperHero Friends!
  </div>
<div class="row">

<?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $about = $row["about_me"];
    $heroPage = "./heroPage.php?id=" . $row["id"];
?>

    <div class="col-4">
      <div class="card mb-3 bg-light" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $name; ?></h5>
          <p class="card-text"><?php echo $about; ?></p>
          <a href='<?php echo $heroPage; ?>' class="btn btn-primary">About <?php echo $name; ?></a>
        </div>
      </div>
    </div>

<?php
  }
} else {
  echo "0 results";
}
?>



  </div>
</div>

<?php $conn->close(); ?>
</body>

</html>