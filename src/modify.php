<?php
$title = "Modify";
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["permission"])) {
    header("Location: ../index.php");
}

require "./classes/read.classes.php";

?>
<?php include './parts/head.php';
include './includes/nav.inc.php';
?>
<?php $row = $post->getHike(); ?>
<div class="header-modify">
</div>
<section class="section__modify">
    <h2>Modification</h2>
    <h3><?php echo $row['name']; ?></h3>
    <form method="POST" action="./includes/post.inc.php">
        <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
        <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>">
        <div>
            <label for="difficulty">Difficulty</label>
            <select name="difficulty">
                <option value="easy">easy</option>
                <option value="normal">normal</option>
                <option value="hard">hard</option>
            </select>
        </div>
        <input type="number" name="distance" placeholder="Distance" value="<?php echo $row['distance']; ?>">
        <input type="number" name="duration" placeholder="Duration" value="<?php echo $row['duration']; ?>">
        <input type="number" name="elevationPos" placeholder="Elevation" value="<?php echo $row['elevation_gain']; ?>">
        <input class="btn-modify" type="submit" name="submit" value="Modifier">
        <button id="delete"><a href="./classes/delete.classes.php">Supprimer</a></button>
    </form>
</section>

<?php include './parts/footer.php'; ?>