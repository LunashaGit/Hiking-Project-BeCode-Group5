<?php
$title = "Welcome page";
session_start();
if(!isset($_SESSION["id"]) && !isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["permission"])){
    header("Location: ../index.php");
}
require "./classes/read.classes.php";
?>

<?php include './parts/head.php';
include './includes/nav.inc.php';
?> <div class="header-welcome">
</div>
<div class="all-cards">
    <?php foreach ($read->getAllHikes() as $row) { ?>
        <div class="cards">
            <h2><?php echo $row['name']; ?></h2>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"> (14)</i>
            </div>
            <img src="./ressources/medias/home-page-02b.jpg" alt="hiking-card" />
            <p class="<?php echo $row['difficulty']; ?>"> <span id="difficulty"><?php echo $row['difficulty']; ?></span></p>
            <p><?php echo $row['distance']; ?> Meters</p>
            <p><?php echo $row['duration']; ?> Minutes</p>
            <p><?php echo $row['elevation_gain']; ?> Meters</p>
            <?php if ($row['id_user'] == $_SESSION['id']) { ?>
                <button class="btn-modify" type="button">
                    <a href="./includes/cookie.inc.php?id=<?php echo $row['id']; ?>">Modify</a>
                </button>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php include './parts/footer.php'; ?>

</body>

</html>