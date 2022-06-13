<?php
$title = "Login";
session_start();
session_destroy();

?>

<?php require "./parts/head.php"; ?>
<div class="container">
    <form action="includes/login.inc.php" method="post">
        <h1 class="form-title">Login</h1>
        <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
        <div class="form-group">
            <input type="email" placeholder="Email" autocomplete="off" name="email" required>
            <input type="password" placeholder="Passsword" autocomplete="off" name="password" required>
            <input type="submit" name="submitLog" value="login">
        </div>
        <hr>
        <p><a href="forgot.php">Forgot Password?</a></p>
        <p><a href="register.php">Register</a></p>
    </form>
</div>
<?php include './parts/footer.php'; ?>