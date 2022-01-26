<?php 

require("actions/database.php");


if(isset($_POST['submit']))
{
    if(!empty($_POST['content']))
    {
        $createdAt = date("d/m/Y H:i");
        $content = htmlspecialchars($_POST['content']);
        $idQuestion= htmlspecialchars($_GET['id']);
        $idAnswerAuthor = $_SESSION['id'];

        $getQuestionData = $db->prepare('SELECT id_user FROM question WHERE id = ?');
        $getQuestionData->execute([
            $idQuestion
        ]);
        $question = $getQuestionData->fetch();
        $idAuthor = $question['id_user'];

        $postAnswer = $db->prepare("INSERT INTO answer(id_author,id_answer_author,id_question,content,created_at) VALUES(?,?,?,?,?)");
        $isPosted = $postAnswer->execute([
            $idAuthor,
            $idAnswerAuthor,
            $idQuestion,
            $content,
            $createdAt
        ]);

        if($isPosted)
        {
            $successMSG = "Your answer is posted successfully";
            header('Location: question.php?id='.$idQuestion);
        }else
        {
            $errorMSG = "Error in postinf your answer, please try again !";
        }
    }else
    {
        $errorMSG = "Please complete all the champs !";
    }
}