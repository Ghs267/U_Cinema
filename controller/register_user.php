<?php
    session_start();
    include '../model/database.php';

    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $pw = htmlspecialchars($_POST['password']);
    $repass = htmlspecialchars($_POST['repassword']);

    $query = $db->prepare("SELECT * FROM employee WHERE email_employee = '$email';");
    $query->bindParam(1, $email);
    $query->execute();

    if($query->rowCount() >= 1){
        $_SESSION['errors'] = "Email has been registered!";
        header("location:../view/register.php");
    }
    else{
            if(strcmp($pw, $repass) != 0){
                $_SESSION['errors'] = "Password does not match!";
                header("location:../view/register.php");
            }
            else{
                $query = $db->query('INSERT INTO employee VALUES("'.$email.'","'.$role.'","'.md5($pw).'")');
                $_SESSION['message'] = "Register success!";
                header("location:../view/register.php");
            }
        
    }    
?>