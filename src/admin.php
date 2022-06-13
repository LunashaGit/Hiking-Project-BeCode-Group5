<?php
$title = "Admin Page";
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["permission"])) {
    header("Location: ../index.php");
}

require "./classes/read.classes.php";

?>

<?php include './parts/head.php';
include './includes/nav.inc.php';
?>
<div class="header-admin">
</div>
<div class="all-cards">
    <?php foreach ($read->getAllHikes() as $row) { ?>
        <div class="cards">
            <img src="./ressources/medias/home-page-02b.jpg" alt="hiking-card" />
            <h2><?php echo $row['name']; ?></h2>
            <p><?php echo $row['difficulty']; ?></p>
            <p><?php echo $row['distance']; ?> Meters</p>
            <p><?php echo $row['duration']; ?> Minutes</p>
            <p><?php echo $row['elevation_gain']; ?> Meters</p>
            <?php if ($_SESSION['permission'] == 1) { ?>
                <button class="btn-modify" type="button">
                    <a href="./includes/cookie.inc.php?id=<?php echo $row['id']; ?>">Modify</a>
                </button>
            <?php }  ?>
        </div>
    <?php } ?>
</div>
<?php include './parts/footer.php'; ?>
</body>

</html>