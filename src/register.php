<?php
session_start();
$title = "Register";
?>

<?php require "./parts/head.php"; ?>
<div class="container">
    <a href="index.php"><i class="arrow left"></i></a>
    <h1 class="form-title">Register</h1>
    <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
    <form action="includes/signup.inc.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Username" autocomplete="off" name="username" required>
            <input type="email" placeholder="Email" autocomplete="off" name="email" required>
            <input type="password" class="password" placeholder="Password" name="password" required>
            <input type="password" class="password" placeholder="Confirm Password" name="cpassword" required>
            <input type="submit" name="submit">
        </div>
    </form>
</div>
<?php include './parts/footer.php'; ?>
</body>