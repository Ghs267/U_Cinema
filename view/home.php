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

	$(document).ready(function(){
		$('#exampleModal').modal({
 			show: false
		});
	});

	function showModal(){
		$('#exampleModal').modal({
 			show: true
		});
	}

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

		#profile:hover{
			color: black;
		}

    </style>
</head>
<body>
	<div class="modal fade" id="exampleModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"><b>CODER'S PROFILE</b></h3>
				</div>
				<div class="modal-body">
					<img src="../model/img/profil.jpg" style="max-width:100px;max-height:100px;margin-bottom:2em;" class="mx-auto d-block">
					<h4 style="text-align:center;"><b>Jennie Florensia</b></h4>
					<h4 style="text-align:center;"><b>00000027184</b></h4>
					<h4 style="text-align:center;"><b>Web Programming - DL</b></h4>
				</div>
			</div>
		</div>
	</div>
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
						<button onClick="showModal();" style="outline:none;border:none;background:none;color:grey;"><span class="glyphicon glyphicon-user" id="profile"style="margin-left:1em;"></span></button>
                        <a href="../controller/logout.php" style="margin-left:1em;" id="logout"><button style="outline:none;border:none;background:none;color:grey;" onclick="javascript:return confirm('Are you sure you want to logout?');"><span class="glyphicon glyphicon-log-out"></span></button></a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
	<div class="container" style="width: 1000px">
    <?php
        if(strcmp($_SESSION['role'],'admin')==0){
            echo '<a href="../view/addmovie.php" style="color:grey;margin-y:2em;"><span class="glyphicon glyphicon-plus" style="font-size:2em; margin-bottom:1em; margin-left:15px"></span></a>';
        }
    ?>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th> ID </th>
				<th> Movie Title </th>
				<th> Duration </th>
                <th> Genre </th>
                <th> Release Date </th>
                <th></th>
			</tr>
		</thead>
		<tbody>
		<?php 
				include '../model/database.php';
				$i = 1;

				$query = "SELECT * FROM movies";
				$result = $db->query($query);

				while ($row = $result->fetch()) {
					echo "<tr>";
					echo "<td>" . $row[0] . "</td>";
					echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[5] . "</td>";
                    echo "<td>" . $row[6] . "</td>";
					echo '<td>
					<div style="display:flex; justify-content:space-evenly;">
					<form action="details.php" method="post">
						<input style="display:none;" type="text" name="Details" value="'.$row[0].'"></input>
						<button style="outline:none;border:none;background:none;" type="submit"><span class="glyphicon glyphicon-eye-open"></span></button> 
                    </form>';
                    if(strcmp(($_SESSION['role']),'kasir') != 0){
                    echo
					'<form action="../controller/delete.php" method="post">
						<input style="display:none;" type="text" name="Delete" value="'.$row[0].'"></input>
						<button style="outline:none;border:none;background:none;" type="submit" onclick="javascript:return confirm(\'are you sure you want to delete this?\');"><span class="glyphicon glyphicon-trash"></span></button>
					</form>
					<br>
					</div>
                    </td>';
                    }
					echo "</tr>";
					$i++;
				}

				$result = null;
				$db = null;
			 ?>
		</tbody>
		<tfoot>
			<tr>
                <th> ID </th>
				<th> Movie Title </th>
				<th> Duration </th>
                <th> Genre </th>
                <th> Release Date </th>
                <th></th>
			</tr>
		</tfoot>
	</table>
	</div>

</body>
</html>

<?php
    unset($_SESSION["errors"]);
?>