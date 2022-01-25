
<?php require('actions/auth/signUpAction.php')?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<title>SignUp Page</title>
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
        <h2>SignUp :</h2>
        <form method="POST" class="mt-3" >
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">LastName</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Confirm</button><br>
            <a href="logIn.php" class="mt-5">Vous avez un compte , cliquez ici !</a>
        </form>
    </div>
</body>
</html>