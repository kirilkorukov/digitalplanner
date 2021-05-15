<!DOCTYPE html>
<html>
  <head>
    <title>Add food</title>
    <?php include("head-include.php"); ?>
  </head>
  <body>
    <?php
      include("header.php");
      include("config.php");
    ?>
    <div class="container w-100 mx-auto mw-80">
      <div class="row mt-4 mb-4">
        <h3 class="mx-auto page-title">Add food</h3>
      </div>
      <?php
        if($_POST){
          $title = $_POST['title'];
          $most_eaten = $_POST['most_eaten'];
          $calories = $_POST['calories'];
          $proteins = $_POST['proteins'];
          $carbs = $_POST['carbs'];
          $fats = $_POST['fats'];
          $unhealthy = $_POST['unhealthy'];
          $price = $_POST['price'];
          if($_POST['price']) $price = $_POST['price'];
          else $price = 0;
          
          $sql = "INSERT INTO foods (title, most_eaten, calories, proteins, carbs, fats, unhealthy, price) VALUES ('" . $title . "', '" . $most_eaten . "', $calories, $proteins, $carbs, $fats, $unhealthy, $price)";
          $result = $conn->query($sql);

          if($result){
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-success mx-auto mt-2">Successfully added food</span>
            </div>
            <?php
          }
          else{
            echo mysqli_error($conn);
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-danger mx-auto mt-2">Could not add food</span>
            </div>
            <?php
          }
        }
      ?>
      <form class="w-50 mx-auto mt-5 form-expanded-sm" action="add-food.php" method="post">
        <input type="text" class="form-control input-border mt-3" name="title" placeholder="Title" style="border: 2px solid #e9e9e9;">
        <select class="form-control input-border mt-3" name="most_eaten">
          <option value="Breakfast">Breakfast</option>
          <option value="Lunch">Lunch</option>
          <option value="Dinner">Dinner</option>
          <option value="Snack">Snack</option>
        </select>
        <input type="number" class="form-control input-border mt-3" name="calories" placeholder="Calories *" required>
        <input type="number" class="form-control input-border mt-3" name="proteins" placeholder="Proteins *" required>
        <input type="number" class="form-control input-border mt-3" name="carbs" placeholder="Carbs *" required>
        <input type="number" class="form-control input-border mt-3" name="fats" placeholder="Fats *" required>
        <input type="number" class="form-control input-border mt-3" name="unhealthy" placeholder="Unhealthy (0 or 1) *" required>
        <input type="number" class="form-control input-border mt-3" name="price" placeholder="Price *" required>
        <input type="submit" class="btn btn-info mt-3 mb-5 float-right my-btn" value="Add">
      </form>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/my_scripts.js"></script>
  </body>
</html>
