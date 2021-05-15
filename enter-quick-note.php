<?php
  include("config.php");

  if($_POST){
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = $_POST['category'];
    $sql = 'INSERT INTO notes (title, content, date, category) VALUES ("' . $title . '", "' . $content . '", "' . date('Y-m-d') . '", "' . $notes_category_id . '")';
    $result = $conn->query($sql);

    if(!$result)
    {
      echo "There was an error saving the note!";
      return false;
    }
    else
    {
      return true;
    }
  }
?>
