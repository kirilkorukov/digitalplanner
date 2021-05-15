<!DOCTYPE html>
<html>
  <head>
    <title>Birthdays</title>
    <?php include("head-include.php"); ?>
  </head>
  <body>
    <?php
      include("header.php");
      include("config.php");
    ?>
    <div class="container w-100 mx-auto mw-80">
      <div class="row mt-4 mb-4">
        <h3 class="mx-auto page-title">Add Birthday</h3>
      </div>
      <?php
        if($_POST){
          $sql = 'INSERT INTO birthdays (person, date) VALUES ("' . $_POST["person"] . '", "' . $_POST["date"] . '")';
          $result = $conn->query($sql);

          if($result){
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-success mx-auto mt-2">Successfully added birthday</span>
            </div>
            <?php
          }
          else{
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-danger mx-auto mt-2">Could not add birthday</span>
            </div>
            <?php
          }
        }
      ?>
      <form class="w-50 mx-auto mt-5 form-expanded-sm" action="birthdays.php" method="post">
        <input type="date" class="form-control mt-3" name="date" placeholder="Date" style="border: 2px solid #e9e9e9;" required>
        <input type="text" class="form-control mt-3" name="person" placeholder="Person *" style="border: 2px solid #e9e9e9;" required>
        <input type="submit" class="btn btn-info mt-3 float-right" value="Add">
      </form>

      <div style="clear: both;"></div>

      <div class="row mt-5">
        <?php
          $sql = "SELECT * FROM birthdays ORDER BY date";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        ?>
        <!-- Birthday reminder card -->
        <div class="col-lg-2 col-md-3 cold-sm-4 mb-2 post text-center">
           <div class="card-icon mx-auto">
             <img src="images/resources/balloons.png" class="rounded-circle img-fluid w-50">
           </div>
           <h6 class="card-title mt-2">
             <?= $row['person'] ?> - <?= $row['date'] ?>
           </h6>
        </div>
        <?php
          }
        ?>
      </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/my_scripts.js"></script>
  </body>
</html>
