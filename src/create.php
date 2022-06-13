<?php
$title = "Create Hike";
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["permission"])) {
    header("Location: ../index.php");
}
include './parts/head.php';
include './includes/nav.inc.php';

?>

<div class="header-create">
</div>
<section class="section__create">
    <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
    <h1>Creation Hike</h1>
    <form action="includes/create.inc.php" method="post">
        <label for="name">Name</label>
        <input autocomplete="off" type="text" name="name" placeholder="Name">
        <div>
            <label for="difficulty">Difficulty</label>
            <select name="difficulty">
                <option value="easy">easy</option>
                <option value="normal">normal</option>
                <option value="hard">hard</option>
            </select>
        </div>
        <label for="distance">Distance</label>
        <input type="number" name="distance" placeholder="Distance">
        <div>
            <label for="duration">Duration</label>
            <input type="number" name="duration" placeholder="Duration">
            <label for="elevationPos">Elevation</label>
            <input type="number" name="elevationPos" placeholder="Elevation">
        </div>
        <input type="submit" name="submit">
    </form>
</section>
<?php include './parts/footer.php'; ?>