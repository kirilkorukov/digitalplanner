<!DOCTYPE html>
<html>

<head>
  <title>Fitness</title>
  <?php include("head-include.php"); ?>
  <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
</head>

<body>
  <?php
  include("header.php");
  include("config.php");

  $today_goal_calories = 3200;
  $today_goal_proteins = 150;
  $today_goal_carbs = 300;
  $today_goal_fats = 100;
  ?>

  <div class="container mw-80 w-100">
    <div class="row mt-4">
      <h3 class="mx-auto page-title">Eaten today</h3>
    </div>

    <!--<div class="row mt-4">
      <button type="button" class="btn btn-primary">Show statistics</button>
    </div>-->

    <div class="row mt-4">
      <div class="col-lg-3 col-md-6 col-sm-12 food-box" style="border-right: none;">
        <input type="hidden" name="meals">
        <h6 class="card-title mt-2">
          Breakfast
        </h6>
        <?php
        $sql = "SELECT * FROM foods WHERE most_eaten = 'Breakfast'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="food-item">
            <span class="food-item-title"><?= $row['title'] ?></span>
            <button type="button" class="btn btn-info font-weight-bold float-right" onclick="add_meal('<?= $row['id'] ?>')" name="add-<?= $row['id'] ?>">+</button>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 food-box" style="border-right: none;">
        <h6 class="card-title mt-2">
          Lunch
        </h6>
        <?php
        $sql = "SELECT * FROM foods WHERE most_eaten = 'Lunch'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="food-item">
            <span class="food-item-title"><?= $row['title'] ?></span>
            <button type="button" class="btn btn-info font-weight-bold float-right" onclick="add_meal('<?= $row['id'] ?>')" name="add-<?= $row['id'] ?>">+</button>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 food-box" style="border-right: none;">
        <h6 class="card-title mt-2">
          Dinner
        </h6>
        <?php
        $sql = "SELECT * FROM foods WHERE most_eaten = 'Dinner'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="food-item">
            <span class="food-item-title"><?= $row['title'] ?></span>
            <button type="button" class="btn btn-info font-weight-bold float-right" onclick="add_meal('<?= $row['id'] ?>')" name="add-<?= $row['id'] ?>">+</button>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 food-box">
        <h6 class="card-title mt-2">
          Snacks
        </h6>
        <?php
        $sql = "SELECT * FROM foods WHERE most_eaten = 'Snack'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="food-item">
            <span class="food-item-title"><?= $row['title'] ?></span>
            <button type="button" class="btn btn-info font-weight-bold float-right" onclick="add_meal('<?= $row['id'] ?>')" name="add-<?= $row['id'] ?>">+</button>
            <div style="clear: both;"></div>
          </div>
        <?php
        }
        ?>
      </div>
      <a href="add-food.php" class="btn btn-info" style="margin-top: 20px; margin-left: 0px;">
        Add food item
      </a>
    </div>

    <h3 class="text-center mt-4 page-title">Macros for today</h3>

    <?php
    $calories_eaten_today = 0;
    $today_date = date("Y-m-d");
    $today_eaten_calories = 0;
    $today_eaten_proteins = 0;
    $today_eaten_carbs = 0;
    $today_eaten_fats = 0;

    $sql = "SELECT * FROM foods JOIN foods_bulking_days ON foods.id = foods_bulking_days.food_id WHERE date = '" . $today_date . "'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $today_eaten_calories += $row['calories'];
      $today_eaten_proteins += $row['proteins'];
      $today_eaten_carbs += $row['carbs'];
      $today_eaten_fats += $row['fats'];
    }
    ?>

    <div class="row mt-4">
      <div class="col lg-6 mb-4 food-macros-container">
        <div class="row">
          <div class="col-lg-12">
            <h6 class="text-center mt-4 page-title">Calories</h6>
            <div class="badge badge-gainz badge-info w-100" style="font-size: 100%;"><?= $today_eaten_calories . " / " . $today_goal_calories ?> kcal</div>
          </div>
          <div class="col-lg-12">
            <h6 class="text-center mt-4 page-title">Protein</h6>
            <div class="badge badge-gainz badge-info w-100" style="font-size: 100%;"><?= $today_eaten_proteins . " / " . $today_goal_proteins ?> g</div>
          </div>
          <div class="col-lg-12">
            <h6 class="text-center mt-4 page-title">Carbs</h6>
            <div class="badge badge-gainz badge-info w-100" style="font-size: 100%;"><?= $today_eaten_carbs . " / " . $today_goal_carbs ?> g</div>
          </div>
          <div class="col-lg-12">
            <h6 class="text-center mt-4 page-title">Fats</h6>
            <div class="badge badge-gainz badge-info w-100" style="font-size: 100%;"><?= $today_eaten_fats . " / " . $today_goal_fats ?> g</div>
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-2 text-center mb-4">
        <h6 class="text-center mt-4 page-title">Supplements</h6>
        <?php
        $sql = 'SELECT * FROM creatine WHERE date = "' . date("Y-m-d") . '" LIMIT 1';
        $result = $conn->query($sql);

        $creatineTakenToday = false;
        if ($row = $result->fetch_assoc()) {
          $creatineTakenToday = true;
        }
        ?>
        <input type="checkbox" name="creatine-checkbox" class="form-control" <?php if ($creatineTakenToday == true) echo 'checked'; ?>>
      </div>
      <div class="col-lg-6 col-md-12 food-box pt-3 pb-3 eaten-today-food">
        <?php
        $sql = "SELECT * FROM foods JOIN foods_bulking_days ON foods.id = foods_bulking_days.food_id WHERE date = '" . $today_date . "' ORDER BY foods_bulking_days.id";
        $result = $conn->query($sql);
        $element_num = 0;
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="food_eaten_item" id="food_eaten_item_<?= $element_num ?>">
            <span><?= $row['title'] ?></span>
            <button type="button" class="close float-right" onclick="remove_meal(<?= $row["food_id"] . ', ' . $element_num ?>)" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
          $element_num += 1;
        }
        ?>
      </div>
    </div>

    <h3 class="text-center mt-4 page-title">Statistics</h3>

    <div id="chartdiv" style="height: 500px; margin-top: 30px; margin-bottom: 50px;"></div>
  </div>

  <!-- Chart code -->
  <script>
    am4core.ready(function() {

      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.paddingRight = 20;

      var data = [{
          calories_eaten_today: 2400,
          date: new Date(2021, 4, 4),
          goal: 3200
        },
        {
          calories_eaten_today: 2600,
          date: new Date(2021, 4, 5),
          goal: 3200
        },
        {
          calories_eaten_today: 3300,
          date: new Date(2021, 4, 6),
          goal: 3200
        },
        {
          calories_eaten_today: 3100,
          date: new Date(2021, 4, 7),
          goal: 3200
        },
        {
          calories_eaten_today: 3500,
          date: new Date(2021, 4, 8),
          goal: 3200
        },
        {
          calories_eaten_today: 2000,
          date: new Date(2021, 4, 9),
          goal: 3200
        },
        {
          calories_eaten_today: 2890,
          date: new Date(2021, 4, 10),
          goal: 3200
        },
        {
          calories_eaten_today: 2780,
          date: new Date(2021, 4, 11),
          goal: 3200
        },
        {
          calories_eaten_today: 3140,
          date: new Date(2021, 4, 12),
          goal: 3200
        },
        {
          calories_eaten_today: 3200,
          date: new Date(2021, 4, 13),
          goal: 3200
        },
      ]

      chart.data = data;

      var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
      dateAxis.renderer.grid.template.location = 0;
      dateAxis.minZoomCount = 5;

      // this makes the data to be grouped
      dateAxis.groupData = true;
      dateAxis.groupCount = 500;

      var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

      var series = chart.series.push(new am4charts.LineSeries());
      series.dataFields.dateX = "date";
      series.dataFields.valueY = "calories_eaten_today";
      series.tooltipText = "{valueY} kcal";
      series.tooltip.pointerOrientation = "vertical";
      series.tooltip.background.fillOpacity = 0.8;

      // Create series
      var series2 = chart.series.push(new am4charts.LineSeries());
      series2.dataFields.dateX = "date";
      series2.dataFields.valueY = "goal";
      series2.strokeWidth = 4;
      series2.stroke = series.stroke;

      chart.cursor = new am4charts.XYCursor();
      chart.cursor.xAxis = dateAxis;

      var scrollbarX = new am4core.Scrollbar();
      scrollbarX.marginBottom = 20;
      chart.scrollbarX = scrollbarX;

    }); // end am4core.ready()
  </script>

  <script src="js/bootstrap.js"></script>
  <script src="js/my_scripts.js"></script>
</body>

</html>