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
        var role = document.getElementById("role").value;
        var repass = document.getElementById("repassword").value;		
        if (email != "" && pass!="" && repass!="" && role != "") {
            // event.preventDefault();
            return true;
        }else{
            alert('All field must be not be empty!');
            return false;
        }
    }

    $(document).ready(function(){
        $('#exampleModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        });
    });

    </script>
</head>  
<body>
<?php
    if(isset($_SESSION['message'])){
        echo 
        "<div class=\"modal fade\" id=\"exampleModal\" role=\"dialog\">
                <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h3 class=\"modal-title\" style='text-align:center;'>Notification</h3>
                        </div>
                        <div class=\"modal-body\">";
                        echo "<h4 style='padding-top:5px; text-align:center;'>" . $_SESSION['message'] . "</h4>
                        <a href='login.php'><button type='button' class='btn btn-primary'>Login</button></a>
                        </div>
                </div>
                </div>
        </div>";
    }
?>

    <h1 style="text-align:center;">Register</h1>
    <div class="container" style="width:25%; margin-top:2em;">
        <form action="../controller/register_user.php" method="post" id="myform" onSubmit="return validasi()">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <label>Role</label>
            <select id="role" name="role" class="form-control">
                <option value="" disabled selected>Select role</option>
                <option value="1">Admin</option>
                <option value="2">Manager</option>
                <option value="3">Cashier</option>
            </select>
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <label>Re-Type Password</label>
            <input type="password" class="form-control" name="repassword" id="repassword">
            <input type="submit" value="Register" class="btn btn-primary" style="margin-top:2em;">
            <?php if(isset($_SESSION['errors'])){
                $error = $_SESSION['errors'];
                echo "<p style='color : red; padding-top:1em;'>" . $error . "</p>";
            }
            ?>
            <p style="padding-top:1em;">Already have an account? <a href="login.php">LOGIN</a> now!</p>
        </form>
    </div>
</body> 
</html>

<?php
    session_destroy();
?>