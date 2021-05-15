<!DOCTYPE html>
<html>
  <head>
    <title>My feed</title>
    <?php include("head-include.php"); ?>
  </head>
  <body>
    <?php
      include("header.php");
    ?>
    <div class="container mt-5 w-100 mx-auto mw-80">
      <div class="row mt-4 mb-4">
        <h3 class="mx-auto page-title">My feed</h3>
      </div>
      <div class="card-columns">
		  <?php
          include("config.php");
          $is_my_feed_empty = true;

          $sql = "SELECT * FROM reminders";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
            if($row['date'] == date("Y-m-d"))
            {
              $is_my_feed_empty = false;
        ?>
            <!-- Reminder card -->
            <div class="card post mx-auto text-center">
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
                 <img src="images/resources/calendar.png" style="width: 25px;" class="mr-1"><?= $row['date'] ?><?php if($row['time'] != "" || $row["place"] != ""){ ?><img src="images/resources/clock.png" style="width: 25px;" class="ml-2 mr-1"><?= $row['time'] ?> <img src="images/resources/map.png" style="width: 25px;" class="mr-2 ml-1"><?= $row["place"] ?><?php } ?>
               </div>
            </div>
        <?php
            }
          }
        ?>
        <?php
          $sql = "SELECT * FROM reminders_uni";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
            if($row['date'] == date("Y-m-d"))
            {
              $is_my_feed_empty = false;
        ?>
            <!-- College reminder card -->
            <div class="card post mx-auto text-center">
               <div class="card-icon mx-auto">
                 <img src="images/resources/graduation-hat.png" class="img-fluid w-50">
               </div>
               <h6 class="card-title mt-2">
                 <?= $row['title'] ?>
               </h6>
               <div class="card-description">
                 <?= $row['content'] ?>
               </div>
               <div class="card-reminder-time-and-date mt-3">
                 <img src="images/resources/calendar.png" style="width: 25px;" class="mr-1"><?= $row['date'] ?><?php if($row['time'] != "" || $row["place"] != ""){ ?><img src="images/resources/clock.png" style="width: 25px;" class="ml-2 mr-1"><?= $row['time'] ?> <img src="images/resources/map.png" style="width: 25px;" class="mr-2 ml-1"><?= $row["place"] ?><?php } ?>
               </div>
            </div>
        <?php
            }
          }
        ?>

        <?php
          $sql = "SELECT * FROM birthdays";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
          if($row['date'] == date("Y-m-d"))
          {
            $is_my_feed_empty = false;
        ?>
          <!-- Birthday reminder card -->
          <div class="card post mx-auto text-center">
            <div class="card-icon mx-auto">
              <img src="images/resources/balloons.png" class="rounded-circle img-fluid w-50">
            </div>
            <h6 class="card-title mt-2">
              <?= $row['person'] ?> has a Birthday!
            </h6>
          </div>
        <?php
            }
          }
        ?>
      
      </div>

      <?php
        if($is_my_feed_empty == true)
        {
      ?>
          <div class="card post mx-auto text-center">
              You have nothing for today :)
          </div>
      <?php  
          }
      ?>
    </div>

    <div style="height: 50px;">

    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/my_scripts.js"></script>
  </body>
</html>
