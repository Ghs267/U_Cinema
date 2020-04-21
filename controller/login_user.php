<?php

    session_start();
    include '../model/database.php';
    $email = htmlspecialchars($_POST['email']);
    $pw = md5(htmlspecialchars($_POST['password']));

    $query = $db->prepare('SELECT * FROM employee WHERE email_employee = ? && password = ?');
    $query->bindParam(1, $email);
    $query->bindParam(2, $pw);
    $query->execute();

    if($query->rowCount() == 1){
        $_SESSION['status'] = 'login';
        $_SESSION['email'] = $email;
        $query = 'SELECT SUBSTRING(email_employee,1,((LOCATE("@",email_employee)-1))) FROM employee WHERE email_employee="'.$email.'";';
        $res = $db->query($query);
        $name = $res->fetch();
        $_SESSION['name'] = $name[0];

        $query = 'SELECT nama_role from role where role_id = (SELECT role FROM employee WHERE email_employee = "'.$email.'");';
        $res = $db->query($query);
        $role = $res->fetch();
        $_SESSION['role'] = $role[0];

        header("location:../view/home.php");
    }
    else{
        $_SESSION['errors'] = "Invalid Username / Password!";
        header("location:../view/login.php");
    }

?>