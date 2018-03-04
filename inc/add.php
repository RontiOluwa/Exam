<?php
    include'db.php';            
    $type = mysqli_real_escape_string($connect, $_POST['type']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $course = mysqli_real_escape_string($connect, $_POST['course']);
    include'functions.php';
    insertexam($type,$name,$course);
?>