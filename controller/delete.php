<?php
    include "../model/database.php";
    $del = htmlspecialchars($_POST['Delete']);

    $query = 'DELETE FROM movies WHERE movie_id="'.$del.'"';
    $result = $db->query($query);

    header("location:../view/home.php");
?>