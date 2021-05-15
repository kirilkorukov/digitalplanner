<?php
  include("config.php");

  if(!isset($_POST))
  {
    return false;
  }
  $food_id = $_POST['food_id'];

  $sql = 'INSERT INTO foods_bulking_days (date, food_id) VALUES ("' . date('Y-m-d') . '", ' . $food_id . ')';
  $result = $conn->query($sql);

  if(!$result)
  {
    echo "error";
    return false;
  }

  $sql = 'SELECT * FROM foods WHERE id = ' . $food_id;
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    echo $row['title'];
  }
  return true;
?>
