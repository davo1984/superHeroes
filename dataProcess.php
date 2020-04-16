
<!-- This one goes back to the hero page after processing data -->
header("Location: /hero.php?id=" . $last_id);

<!-- This line goes last to return you to home page -->
header("Location: /index.php”);