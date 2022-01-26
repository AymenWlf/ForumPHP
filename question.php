<?php 
    function getAuthorAnswerName($db,$id)
    {
        $getAuthor = $db->prepare('SELECT username FROM user WHERE id = ?');
        $getAuthor->execute([
            $id
        ]);
        $author = $getAuthor->fetch();
        return $author['username'];
    }
?>
<?php 
require('actions/question/pinByIdAction.php');
require('actions/question/getAnswers.php');
require('actions/question/addAnswer.php');
?>
<!DOCTYPE html>

<html lang="en">
    
<?php include('includes/head.php')?>
    <title>Answer</title>
<body>
    <?php include('includes/navbar.php')?>
    <div class="container mt-5">
        <h2>The Question :</h2>
        <div class="card mt-5">
            <div class="card-body">
                <strong><h3><?php echo $question['title'] ?></h3></strong><hr>
                <?php echo $question['content'] ?>
            </div>
            <div class="card-footer">
            <?php 
                print("Publied by <strong>".$question['author']."</strong> the  <strong>".$question['created_at']."</strong>");
                ($question['modified_at']) ? print(" / last modif : ".$question['modified_at'] ): null;
                ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
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
        <h2 class="mb-5">Answers : </h2>
        <div class="mb-5">
            <form method="POST">
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="content" name="content" placeholder="Your Answer"></textarea>
                    <label for="content">Your Answer</label>
                </div>
                <input type="submit" name="submit" class="btn btn-outline-success" value="Send">
            </form>
        </div>
        <?php
        while($answer = $getAnswers->fetch())
        {
            $author = getAuthorAnswerName($db,$answer['id_answer_author']);
        ?>
        <div class="card mt-3">
            <div class="card-header">
                <?php 
                print("Answered by <strong>".$author."</strong> the <strong>".$answer['created_at']."</strong>");
                ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $answer['content']?>.</p>
            </div>
        </div>
        <?php 
        }
        ?>
   
        <?php if($getAnswers->rowCount() == 0)
            {
                print("<h4>No answer found</h4>");
            }
        ?>
    </div>
    
<?php include('includes/footer.php')?>
</body>
</html>