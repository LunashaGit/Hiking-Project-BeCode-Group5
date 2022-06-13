<?php 
?>
<nav id="mySidenav" class="navbar sidenav">
    <a href="../welcome.php">Home</a>
    <a href="../create.php">Create</a>
    <a href="../profil.php">Profil</a>
    <?php if ($_SESSION['permission'] == 1) { ?>
        <a href="../admin.php">Admin</a>
    <?php } ?>
    <a id="logout" href="../includes/logout.inc.php">Logout</a>
</nav>


<!--- MENU HAMBURGER --->
<section class="menuham">
    <input id="toggle" type="checkbox"></input>

    <label for="toggle" class="hamburger">
        <div class="top-bun"></div>
        <div class="meat"></div>
        <div class="bottom-bun"></div>
    </label>

    <div class="nav">
        <div class="nav-wrapper">
            <nav>
                <a href="../welcome.php">Home</a><br />
                <a href="../create.php">Create</a><br />
                <a href="../profil.php">Profil</a><br />
                <?php if ($_SESSION['permission'] == 1) { ?>
                    <a href="../admin.php">Admin</a><br />
                <?php } ?>
                <a id="logout" href="../includes/logout.inc.php">Logout</a>
            </nav>
        </div>
    </div>
</section>