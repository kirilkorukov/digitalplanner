<?php
include("config.php");

if (!isset($_POST)) {
    return false;
}

$today_goal_calories = 3200;
$today_goal_proteins = 150;
$today_goal_carbs = 300;
$today_goal_fats = 100;

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