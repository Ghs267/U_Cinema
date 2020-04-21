<?php
    session_start();
?>

<!DOCTYPE html> 
<html>  
<head>    
    <title>U-CINEMA</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function validasi() {
        var email = document.getElementById("email").value;
        var pass = document.getElementById("password").value;		
        if (email != "" && pass!="") {
            // event.preventDefault();
            return true;
        }else{
            alert('All field must be not be empty!');
            return false;
        }
    }
    </script>
</head>  
<body>
    <h1 style="text-align:center;">U-CINEMA</h1>
    <div class="container" style="width:25%; margin-top:2em;">
        <form action="../controller/login_user.php" method="post" id="myform" onSubmit="return validasi()">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <input type="submit" value="Login" class="btn btn-primary" style="margin-top:2em;">
            <?php if(isset($_SESSION['errors'])){
                $error = $_SESSION['errors'];
                echo "<p style='color : red; padding-top:1em;'>" . $error . "</p>";
            }
            ?>
            <p style="padding-top:1em;">Don't have an account? <a href='register.php'>Register</a> Now!</p>
        </form>
    </div>
</body> 
</html>

<?php
    unset($_SESSION['errors']);
?>