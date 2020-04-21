<?php

    include '../model/database.php';
    $statusMsg = '';

    // Image
    $name = $_FILES['file']['name'];
    $target_dir = "../model/img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Other Values
    $genre = implode(", ", $_POST["genre"]);
    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $synopsis = $_POST['synopsis'];
    $date = strtotime($_POST['release_date']);
    $r_date = date('Y-m-d', $date);

    // ID
    $query = "SELECT * FROM movies";
    $res = $db->query($query);
    $count = $res->rowCount();
    $id = $count + 1;

    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    $insert = $db->query("INSERT into movies(movie_id, poster, title, synopsis, duration, genre, release_date) VALUES ('".$id."' ,'".$name."', '".$title."', '".$synopsis."', '".$duration."', '".$genre."', '".$r_date."');");
    if(!$insert){
        $_SESSION['errors'] = "Insert data failed, please try again.";
        header("location:../view/addmovie.php");
    }else{
        header("location:../view/home.php");
    } 
    
?>