<?php $title = "Forgot";
session_start();
?>
<?php require "./parts/head.php"; ?>
<div class="container">
    <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
    <a href="index.php"><i class="arrow left"></i></a>
    <h1 class="form-title">Forgot Password</h1>
    <p style="color: red; text-align:center;"><?= (!empty($error)) ? $error : "" ?></p>
    <form action="./includes/forgot.inc.php" method="POST">
        <div class="form-group">
            <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Email" required>
            <input type="submit" name="submit" value="Send mail !">
        </div>
        <p style="color: green; text-align:center;"><?= (!empty($validation)) ? $validation : "" ?></p>
    </form>
</div>
<?php include './parts/footer.php'; ?>
</body>