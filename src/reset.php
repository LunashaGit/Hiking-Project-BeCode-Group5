<?php
session_start();
if (isset($_GET['id']) && isset($_GET['token'])) {
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['token'] = $_GET['token'];
} else {
    header('Localisation: ../index.php');
}
include './parts/head.php';
?>

<div class="container">
    <form action="./includes/reset.inc.php" method="POST">
        <p style="color: red;"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></p>
        <h1 class="form-title">Reset Password</h1>
        <p style="color: red; text-align:center;">
            <?= (!empty($error)) ? $error : "" ?>
        </p>
        <div class="form-group">
            <input type="password" class="password" placeholder="Password" name="password" required />
            <input type="password" class="password" placeholder="Confirm Password" name="cpassword" required />
            <label for="show-password" style="display: inherit;" class="show-password">
                <input type="checkbox" name="showpassword" style="box-shadow: none; width: auto; margin:1.2rem 1rem;" onclick="showPassword()" />
                <p>Show Password</p>
            </label>
            <input type="submit" name="submit" value="Reset" />
        </div>
        <p style="color: green; text-align: center;">
            <?= (!empty($validation)) ? $validation : "" ?>
        </p>
    </form>
</div>
<?php include './parts/footer.php'; ?>

<script>
    function showPassword() {
        const x = document.querySelectorAll(".password");
        x.forEach(element => {
            if (element.type === "password") {
                element.type = "text";
            } else {
                element.type = "password";
            }
        });
    }
</script>
</body>

</html>