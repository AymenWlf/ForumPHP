
<?php include('actions/question/publishAction.php');
    include('actions/auth/securityAction.php');
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
         <?php if(isset($successMSG))
        {
        ?>
        <div class="alert alert-success"><?php echo $successMSG ?></div>
        <?php
        }
        ?>
        <h2>What is your question ?</h2>
        <form method="POST" class="mt-3" >
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
    </div>
</body>
</html>