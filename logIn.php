<?php require('actions/auth/logInAction.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<title>LogIn Page</title>
<body>
<?php include('includes/navbar.php')?>
    <div class="container signUp mt-5">
        <?php if(isset($errorMSG))
        {
        ?>
        <div class="alert alert-danger"><?php echo $errorMSG ?></div>
        <?php
        }
        ?>
        <h2>LogIn :</h2>
        <form method="POST" class="mt-3" >
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">LogIn</button><br>
                <a href="signUp.php" class="mt-5">Vous n'avez pas de compte , cliquez ici !</a>
            </div>
        </form>
    </div>
</body>
</html>