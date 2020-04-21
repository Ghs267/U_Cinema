<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>U-CINEMA</title>

  	<!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Data Tables -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		   $('#example').DataTable();
	} );

	</script>
    <style>
        #logout{
            transition-duration: 1s;
        }
        #logout:hover{
            background-color: orange;
            color: white;
        }
        .navbar .glyphicon{
            font-size : 2em;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h4 style="color:grey"> 
                        <?php 
                            echo "Hello, " . $_SESSION['name']; 
                        ?>
                    </h4>
                </div>
                <div class="navbar-nav nav navbar-right">
                    <li class="navbar-right" style="color:black;display:flex; justify-content:space-between; margin-left:35em;">
                        <a href="home.php"><span class="glyphicon glyphicon-home"></span></a>
                        <a href="../controller/logout.php" style="margin-left:1em;" id="logout"><span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
	<div class="container" style="width: 1000px;">
    <a href="../view/home.php" style="color:grey;"><span class="glyphicon glyphicon-arrow-left" style="font-size:2em;"></span></a>
        <?php
            include"../model/database.php";
            $key = htmlspecialchars($_POST['Details']);
            $result = $db->query("SELECT * FROM movies WHERE movie_id='$key'");
            foreach($result as $res){
                echo '<div class="container" style="width:50%; margin-top:2em; border: solid 2px grey;padding:2em;">';
                if(strcmp($_SESSION['role'], 'admin')==0){
                    echo '<form method="post" action="editmovie.php"><a href="../view/editmovie.php" style="color:grey;" value><button type="Submit" value ="' . $res[0] . '"class="glyphicon glyphicon-edit" style="outline:none;border:none;background:none;float:right;font-size:2em;" name="Edit"></button></a></form>';
                }
                echo '<h2 style="text-align:center;margin-bottom:1em;"><b> MOVIE DETAILS </b></h2>
                <div>
                    <img src="../model/img/' . $res[1] . '" style="margin-bottom:2em;max-width:180px;max-height:220px;" class="mx-auto d-block">
                </div>
                <p><b> Title </b> : ' . $res[2] . '</p><br>
                <p><b> Synopsis </b> : ' . $res[3] . '</p><br>
                <p><b> Duration </b> : ' . $res[4] . '</p><br>
                <p><b> Genre </b> : ' . $res[5] . '</p><br>
                <p><b> Release Date </b> : ' . $res[6] . '</p><br>
                </div>';
            }
        ?>
    </div>

</body>
</html>