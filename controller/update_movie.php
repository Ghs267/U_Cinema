<?php 
    session_start();
    include "../model/database.php";

    $id = $_POST['id'];
    $genre = implode(", ", $_POST["genre"]);
    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $synopsis = $_POST['synopsis'];
    $date = strtotime($_POST['release_date']);
    $r_date = date('Y-m-d', $date);
    $name = $_FILES['file']['name'];
    $target_dir = "../model/img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    if($name != ""){
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        $query = 'UPDATE movies SET poster="'.$name.'", title="'.$title.'", synopsis="'.$synopsis.'", duration="'.$duration.'", genre="'.$genre.'", release_date="'.$r_date.'" WHERE movie_id = "'.$id.'";';
        $result = $db->query($query);
        if($query){
            header("location:../view/home.php");
         }
         else{
            $_SESSION['errors'] = 'Update failed, please try again!';
            header("location:../view/editmovie.php");
         }
    }else{
        $query = 'UPDATE movies SET title="'.$title.'", synopsis="'.$synopsis.'", duration="'.$duration.'", genre="'.$genre.'", release_date="'.$r_date.'" WHERE movie_id = "'.$id.'";';
        $result = $db->query($query);
        if($query){
           header("location:../view/home.php");
        }
        else{
            $_SESSION['errors'] = 'Update failed, please try again!';
            header("location:../view/editmovie.php");
        }
    }
    

?>