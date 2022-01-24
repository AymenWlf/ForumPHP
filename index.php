<?php 
session_start();
    if($_SESSION['auth'] == false)
    {
        header('Location: signUp.php');
        
    };$_SESSION['auth'] = false;
?>

<!DOCTYPE html>

<html lang="en">
    
<?php require('includes/head.php')?>
    <title>Acceuil</title>s
<body>
    <div class="container mt-5">
        <h2>Acceuil</h2>
    </div>
<?php require('includes/footer.php')?>
</body>
</html>