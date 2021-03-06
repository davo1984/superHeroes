<?php

require "./dbConnect.php";
require "./header.php";

$hero = "heroCard.php?id=" . $row["id"];

$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ( $row = $result->fetch_assoc() ) {
    $id = $row["id"];
    $name = $row["name"];
    $about = $row["about"];
  }
} else {
    echo "0 results";
}
?>

  <h1 class='text-center mt-5 mb-4'>Hello Supers!</h1>
    <div class="container pl-5">
      <div class="row">
        
        <div class="col-4">
          <div class="card mb-3 bg-light" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <p class="card-text"><?php echo $about; ?></p>
                <a href=' . $hero . ' class="btn btn-primary">About <?php echo $name; ?></a>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php $conn->close(); ?>
</body>
</html>