<?php
  include("config.php");

  if(!isset($_POST))
  {
    return false;
  }

  $sql = 'INSERT INTO creatine VALUES("' . date("Y-m-d") . '")';
  $result = $conn->query($sql);

  if(!$result)
  {
    echo "error";
    return false;
  }

  return true;
?>
