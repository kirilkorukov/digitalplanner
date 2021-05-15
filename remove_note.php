<?php
  include("config.php");

  if(!isset($_POST))
  {
    return false;
  }
  $note_id = $_POST['note_id'];

  $sql = "DELETE FROM notes WHERE id = $note_id";
  $result = $conn->query($sql);

  if(!$result)
  {
    echo "error";
    return false;
  }

  return true;
?>
