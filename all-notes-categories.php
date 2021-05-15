<!DOCTYPE html>
<html>
  <head>
    <title>Notes Categories</title>
    <?php include("head-include.php"); ?>
  </head>
  <body>
    <?php
      include("header.php");
      include("config.php");
    ?>
    <div class="container w-100 mx-auto mw-80">
      <div class="row mt-4 mb-4">
        <h3 class="mx-auto page-title">Notes Categories</h3>
      </div>
      <?php
        if($_POST){
          $sql = 'INSERT INTO notes_categories (name) VALUES ("' . $_POST["category_name"] . '")';
          $result = $conn->query($sql);

          if($result){
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-success mx-auto mt-2">Successfully added new category</span>
            </div>
            <?php
          }
          else{
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-danger mx-auto mt-2">Could not add new category</span>
            </div>
            <?php
          }
        }
      ?>
      <form class="w-50 mx-auto mt-5 form-expanded-sm" action="all-notes-categories.php" method="post">
        <input type="text" class="form-control mt-3" name="category_name" placeholder="Category Name *" style="border: 2px solid #e9e9e9;" required>
        <input type="submit" class="btn btn-info mt-3 float-right" value="Add">
      </form>

      <div style="clear: both;"></div>

      <div class="row mt-5">
        <?php
          $sql = "SELECT * FROM notes_categories ORDER BY name";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        ?>
            <span class="new-note-category-label badge badge-info mr-2 mt-2 category-<?= $row['id'] ?>" onclick="choose_category_for_new_note('<?= $row['name'] ?>', '<?= $row['id'] ?>')"><?= $row['name'] ?></span>
        <?php
          }
        ?>
      </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/my_scripts.js"></script>
  </body>
</html>
