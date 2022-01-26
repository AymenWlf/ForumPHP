<?php require('actions/question/getAllAction.php');
require('actions/question/getBySearchAction.php');

?>
<!DOCTYPE html>

<html lang="en">
    
<?php include('includes/head.php')?>
    <title>Acceuil</title>
<body>
    <?php include('includes/navbar.php')?>
    <div class="container mt-5">
        <div class="container">
            <form method="GET">
                <div class="row">
                    <div class="col-3">
                        <h2>Acceuil</h2>
                    </div>
                    <div class="col-6">
                        <input type="text" name="text" id="text" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Search">
                    </div>
                </div>
            </form>
        </div>
        
        <?php while($question = $getQuestions->fetch())
        {
        ?>
        <div class="card mt-5">
            <div class="card-header">
                <?php 
                print("Publied by <strong>".$question['author']."</strong> the <strong>".$question['created_at']."</strong>");
                ($question['modified_at']) ? print(" / last modif : ".$question['modified_at'] ): null;
                ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"> <?php echo $question['title']?></h5>
                <p class="card-text"><?php echo $question['content']?>.</p>
                <a <?php printf('href="question.php?id=%s"',$question['id'])?>  class="btn btn-primary">Answer</a>
            </div>
        </div>
        <?php 
        }
        ?>

        <?php if($getQuestions->rowCount() == 0)
        {
            print("<h4 class='mt-5'>Vous n'avez aucune reponse !</h4>");
       
        }
        ?>
    </div>
<?php include('includes/footer.php')?>
</body>
</html>