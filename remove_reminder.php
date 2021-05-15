<?php
  include("config.php");

  if(!isset($_POST))
  {
    return false;
  }
  $reminder_id = $_POST['reminder_id'];

  $sql = "DELETE FROM reminders WHERE id = $reminder_id";
  $result = $conn->query($sql);

  if(!$result)
  {
    echo "error";
    return false;
  }

  return true;
?>
