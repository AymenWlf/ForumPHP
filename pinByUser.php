
<?php include('actions/question/pinByAction.php');
    include('actions/auth/securityAction.php');
    $_SERVER['page'] = 'pin';
?>

<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<title>Pin Page</title>
<body>
<?php include('includes/navbar.php')?>
    <div class="container signUp mt-5">
        <h2>My Questions :</h2> <br>
        <div class="d-flex flex-wrap">
        <?php while($question = $findByUser->fetch())
        {  
        ?>
            <div class="card mx-3 mb-5" style="min-width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $question['title'] ?></h5>
                    <p class="card-text"><?php echo $question['content'] ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $question['created_at'] ?></h6>
                    <a  <?php printf('href="actions/question/deleteAction.php?id=%s"',$question['id'])?>  class="btn btn-danger mx-3">Delete</a>
                    <a <?php printf('href="modify.php?id=%s"',$question['id'])?> class="btn btn-outline-warning">Modify</a>
                </div>
            </div>
        <?php 
        }
        ?>
        
        <?php if($findByUser->rowCount() == 0)
        {
            print("<h4>Vous n'avez aucune question !</h4>");
       
        }
       ?>
        </div>
    </div>
</body>
</html>