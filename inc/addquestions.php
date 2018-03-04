<?php
    include'db.php';            
    $question = mysqli_real_escape_string($connect, $_POST['question']);
    $option1 = mysqli_real_escape_string($connect, $_POST['option1']);
    $option2 = mysqli_real_escape_string($connect, $_POST['option2']);
    $option3 = mysqli_real_escape_string($connect, $_POST['option3']);
    $option4 = mysqli_real_escape_string($connect, $_POST['option4']);
    $answer = mysqli_real_escape_string($connect, $_POST['answer']);
    $ids = mysqli_real_escape_string($connect, $_POST['ids']);
    include'functions.php';
    insertquestion($question,$option1,$option2,$option3,$option4,$answer,$ids);
?>