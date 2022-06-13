<?php
$title = "Profil Page";
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["username"]) && !isset($_SESSION["email"]) && !isset($_SESSION["permission"])) {
    header("Location: ../index.php");
}
require './parts/head.php';
require "./classes/profil.classes.php";

?>

<?php include './includes/nav.inc.php'; ?>

<?php $row = $profil->ProfilInformation(); ?>
<div class="header-profil">
</div>
<section class="section__profil">
    <div class="personal-informations">
        <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
        <img src="./ressources/medias/logouser.webp" alt="profil-img" />
        <h2><i class="fa-solid fa-at"></i> <?php echo $row['username']; ?></h2>
        <p id="email"><i class="fa-solid fa-envelope"></i> <?php echo $row['email']; ?></p>
        <p id="quote"><i class="fa-solid fa-quote-left"></i> <?php echo $row['description']; ?> <i class="fa-solid fa-quote-right"></i></p>
    </div>
    <div class="modification">
        <hr />
        <h2><i class="fa-solid fa-user-pen"></i> Modification</h2>
        <form action="includes/profil.inc.php" method="post">
            <input autocomplete="off" type="text" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
            <input autocomplete="off" type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
            <input autocomplete="off" type="text" name="description" placeholder="Description" value="<?php echo $row['description']; ?>">
            <input type="submit" name="submit" value="Modifier">
        </form>
    </div>
</section>
<?php include './parts/footer.php'; ?>