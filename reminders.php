<!DOCTYPE html>
<html>
  <head>
    <title>Reminders</title>
    <?php include("head-include.php"); ?>
  </head>
  <body>
    <?php
      include("header.php");
      include("config.php");
    ?>
    <div class="container w-100 mx-auto mw-80">
      <div class="row mt-4 mb-4">
        <h3 class="mx-auto page-title">Reminders</h3>
      </div>
      <?php
        if($_POST){
          $title = $_POST['title'];
          $description = $_POST['description'];
          $date = $_POST['date'];
          $active = 0;
          $time = $_POST['time'];
          $place = $_POST['place'];
          $sql = 'INSERT INTO reminders (title, description, date, active, time, place) VALUES ("' . $title . '", "' . $description . '", "' . $date . '", "' . $active . '", "' . $time . '", "' . $place . '")';
          $result = $conn->query($sql);

          if($result){
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-success mx-auto mt-2">Successfully added reminder</span>
            </div>
            <?php
          }
          else{
            ?>
            <div class="row mt-4 mb-4 text-center">
              <span class="badge badge-danger mx-auto mt-2">Could not add reminder</span>
            </div>
            <?php
          }
        }
      ?>
      <form class="w-50 mx-auto mt-5" action="reminders.php" method="post">
        <input type="text" class="form-control input-border mt-3" name="title" placeholder="Title *" required>
        <textarea class="form-control input-border mt-3" name="description" placeholder="Description *" required></textarea>
        <input type="date" class="form-control input-border mt-3" name="date" placeholder="Date">
        <input type="text" class="form-control input-border mt-3" name="time" placeholder="Time">
        <input type="text" class="form-control input-border mt-3" name="place" placeholder="Place">
        <input type="submit" class="btn btn-info mt-3 float-right my-btn" value="Add">
      </form>

      <div class="clearfix">

      </div>

      <div class="card-columns mt-5">
        <?php
          $sql = "SELECT * FROM reminders ORDER BY date";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        ?>
        <!-- Reminder card -->
        <div class="card post mx-auto text-center form-expanded-sm" id="reminder-<?= $row['id'] ?>" onclick="remove_reminder(<?= $row['id'] ?>)">
           <div class="card-icon mx-auto">
             <img src="images/resources/reminders.png" class="img-fluid w-50">
           </div>
           <h6 class="card-title mt-2">
             <?= $row['title'] ?>
           </h6>
           <div class="card-description">
             <?= $row['description'] ?>
           </div>
           <div class="card-reminder-time-and-date mt-3">
             <img src="images/resources/calendar.png" style="width: 25px;" class="mr-1"><?= $row['date'] ?>
             <?php if($row['time'] != "" || $row["place"] != ""){ ?><img src="images/resources/clock.png" style="width: 25px;" class="ml-2 mr-1"><?= $row['time'] ?> 
             <img src="images/resources/map.png" style="width: 25px;" class="mr-2 ml-1"><?= $row["place"] ?><?php } ?>
           </div>
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
