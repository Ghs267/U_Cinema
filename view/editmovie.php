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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript">
            function validasi() {
                var title = document.getElementById("title").value;
                var duration = document.getElementById("duration").value;
                var synopsis = document.getElementById("synopsis").value;
                var date = document.getElementById("datepicker").value;
                var poster = document.getElementById("poster").value;
                var extension = $('#poster').val().split('.').pop().toLowerCase();  
                var fields = $("input[name='genre[]']").serializeArray();
                if (title != "" && duration !="" && synopsis !="" && date !="") {
                    if(poster != ""){
                        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                        {  
                            alert('Invalid Image File');  
                            $('#image').val('');  
                            return false;  
                        } 
                    }
                    else if (fields.length === 0) 
                    { 
                        alert('Select at least 1 genre!'); 
                        // cancel submit
                        return false;
                    } 
                    else 
                    { 
                        return true;
                    }
                    // event.preventDefault();
                    
                }else{
                    alert('All field must be not be empty!');
                    return false;
                }
            }
        $( function() {
            $( "#datepicker" ).datepicker();
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
            table .glyphicon{
                font-size: 1.5em;
            }
        </style>
</head>  
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header" style="margin-left:20em;">
                    <h4 style="color:grey"> 
                        <?php 
                            echo "Hello, " . $_SESSION['name']; 
                        ?>
                    </h4>
                </div>
                <div class="navbar-nav nav navbar-right" style="margin-right:20em;">
                    <li class="navbar-right" style="color:black;display:flex; justify-content:space-between; margin-left:35em;">
                        <a href="home.php"><span class="glyphicon glyphicon-home"></span></a>
                        <a href="home.php"><span class="glyphicon glyphicon-user" style="margin-left:1em;"></span></a>
                        <a href="../controller/logout.php" style="margin-left:1em;" id="logout"><span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container" style="width:25%; margin-top:2em;">
        <h1 style="text-align:center;">Edit Movie</h1>
        <form action="../controller/update_movie.php" method="post" id="myform" onSubmit="return validasi()" enctype="multipart/form-data">
        <?php
            include "../model/database.php";
            $key = htmlspecialchars($_POST['Edit']);
            $sql = "SELECT * FROM movies WHERE movie_id= '$key'";
            $res = $db->query($sql);
            
            while ($row = $res->fetch())
            {   
                $subunit = explode(', ',$row['genre']);
            }
            $result = $db->query("SELECT * FROM movies WHERE movie_id='$key'");
            

            foreach($result as $res){
                echo'<label>Movie ID</label>
                <input type="text" class="form-control" name="id" id="id" readonly value="' . $res[0] . '"><br>
                <label>Movie Title</label>
                <input type="text" class="form-control" name="title" id="title" value="' . $res[2] . '"><br>
                <label>Movie Poster</label>
                <input type="file" name="file" id="poster" accept="image/jpeg, image/jpg, image/png" value="' . $res[1] . '"><br>
                <label>Genre</label><br>
                <div style="display:grid; justify-content:space-between;grid-template-columns: auto auto auto; margin-bottom:1em;">
                    <div>
                        <input type="checkbox" id="action" name="genre[]" value="action"';
                        if(in_array('action', $subunit)){echo " checked";}
                        echo '>
                        <label>Action</label>
                    </div>
                    <div>
                        <input type="checkbox" id="thriller" name="genre[]" value="thriller"';
                        if(in_array('thriller', $subunit)){echo " checked";}
                         
                        echo '>
                        <label>Thriller</label>
                    </div>
                    <div>
                        <input type="checkbox" id="drama" name="genre[]" value="drama"';
                        if(in_array('drama', $subunit)){echo " checked";} 
                        echo '>
                        <label>Drama</label>
                    </div>
                    <div>
                        <input type="checkbox" id="sci-fi" name="genre[]" value="sci-fi"';
                        if(in_array('sci-fi', $subunit)){echo " checked";}
                        echo '>
                        <label>Sci-fi</label>
                    </div>
                    <div>
                        <input type="checkbox" id="fantasy" name="genre[]" value="fantasy"';
                        if(in_array('fantasy', $subunit)){echo " checked";}
                        echo '>
                        <label>Fantasy</label>
                    </div>
                    <div>
                        <input type="checkbox" id="comedy" name="genre[]" value="comedy"';
                        if(in_array('comedy', $subunit)){echo " checked";}
                        echo '>
                        <label>Comedy</label>
                    </div>
                </div>
                <label>Duration</label>
                <input type="text" class="form-control" name="duration" id="duration" value="' . $res[4] . '">
                <label>Synopsis</label>
                <textarea class="form-control" name="synopsis" id="synopsis" style="resize:none;" rows="5">' . $res[3] .'</textarea><br>
                <label>Release Date</label>
                <input type="text" id="datepicker" name="release_date" value="' . $res[6] . '"><br>
                <input type="submit" class="btn btn-primary" style="margin-top:2em;" value="Submit" name="submit">
                <a href="home.php"><input type="button" value="Cancel" class="btn btn-danger" style="margin-top:2em;"></button></a>';
            }
        ?>
        </form>
    </div>
</body> 
</html>