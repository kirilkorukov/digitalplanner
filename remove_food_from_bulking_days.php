<?php
  include("config.php");

  if(!isset($_POST))
  {
    return false;
  }
  $food_id = $_POST['food_id'];
  echo $food_id;

  $sql = 'DELETE FROM foods_bulking_days WHERE date= "' . date("Y-m-d") . '" AND food_id = ' . $food_id . ' LIMIT 1';
  $result = $conn->query($sql);

  if(!$result)
  {
    echo "error";
    return false;
  }

  return true;
?>
