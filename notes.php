<!DOCTYPE html>
<html>

<head>
    <title>Notes</title>
    <?php include("head-include.php"); ?>
</head>

<body>
<?php
include("header.php");
include("config.php");
$notes_category_id = "";
if (isset($_GET['category'])) {
    $notes_category_id = htmlspecialchars($_GET['category']);
}
?>

<div class="container mt-5 mw-80 w-100">

    <?php
    if ($_POST) {
        $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
        if (isset($_POST['title']))
            $title = mysqli_real_escape_string($conn, $_POST['title']);
        else $title = "";

        $category = "default";
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $category = $_POST['category'];
        }
        $currentDate = date("Y-m-d");

//        echo "<script>console.log(${category})</script>";
        $sql = "INSERT INTO notes (title, content, date, category) VALUES ('${title}', '${content}', '${currentDate}', '${category}')";

//        echo "<script>console.log(${sql})</script>";

        $result = $conn->query($sql);

        if (!$result) echo "There was an error saving the note!";
    }
    ?>
    <div class="row">
        <div class="card mt-3 w-60 mx-auto">
            <form action="notes.php" method="post">
                <div class="card-header">
                    <div class="row pl-4 pr-4 new-note-category-labels-holder">
                        <?php
                        $sql = "SELECT * FROM notes_categories ORDER BY name";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <span class="new-note-category-label badge badge-info mr-2 mt-2 category-<?= $row['id'] ?>"
                                  onclick="choose_category_for_new_note('<?= $row['name'] ?>', '<?= $row['id'] ?>')"><?= $row['name'] ?></span>
                            <?php
                        }
                        ?>
                        <a href="all-notes-categories.php"><span
                                    class="new-note-category-label badge badge-info mr-2 mt-2">+ New Category</span></a>
                        <input type="hidden" name="category" id="new-note-category-input-field">
                    </div>
                </div>
                <div class="card-body">
                    <textarea class="form-control" spellcheck="false" name="content" rows="8" cols="80"
                              style="overflow: hidden;"></textarea>
                    <input type="submit" name="" value="Save" class="btn btn-info float-right mt-3 mb-3">
                </div>
            </form>
        </div>
    </div>

    <div class="row pl-3 mt-5">
        <span class="pr-3">Filter notes by category:</span>
        <a href="notes.php"><span class="badge badge-info mr-2">All</span></a>
        <?php
        $sql = "SELECT * FROM notes_categories ORDER BY name";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <a href="notes.php?category=<?= $row['id'] ?>"><span
                        class="badge badge-info mr-2"><?= $row['name'] ?></span></a>
            <?php
        }
        ?>
        <a href="all-notes-categories.php"><span class="badge badge-info mr-2">+ New Category</span></a>
    </div>

    <div class="card-columns mt-5">
        <?php

        if ($notes_category_id != "") $sql = "SELECT * FROM notes WHERE category = (SELECT name FROM `notes_categories` WHERE id = ${notes_category_id})";
        else $sql = "SELECT * FROM notes";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card mt-2" id="note-<?= $row['id'] ?>">
                <div class="card-body">
                    <?= $row['content'] ?>
                    <div class="note-footer mt-2">
                        <?= $row['date'] ?>
                        <button type="button" class="close float-right" onclick="remove_note(<?= $row['id'] ?>)"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
