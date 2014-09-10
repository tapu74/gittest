<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<LINK HREF="bootstrap-2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap-2.3.2/css/table-style.css" rel="stylesheet">
<script src="bootstrap-2.3.2/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<h3>PHP CRUD Grid</h3>
		</div>
		<div class="row">
		<p>
		<a href="create.php" class="btn btn-success">Create</a>
		<a href="file_upload.php" class="btn btn-success">File upload</a>
		</p>
			<table class="table table-striped table-bordered">
				<thread>
				<tr>
					<th>Name</th>
					<th>Email Address</th>
					<th>Mobile Number</th>
					<th>Action</th>
				</tr>
				</thread>
				<tbody>
				<?php
				require('pagination.php');
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
				$per_page = 5; // Set how many records do you want to display per page.
				$startpoint = ($page * $per_page) - $per_page;
				$statement = "SELECT COUNT(*) as `num` from `customers` ORDER BY `id` DESC"; // Change table name according to your database table.
				$sql = "SELECT * FROM `customers` ORDER BY `id` DESC  LIMIT {$startpoint} , {$per_page}";
				
				
				require 'database.php';
				//$MysqlDb=new Database();
				//$MysqlConn=$MysqlDb->connect();
				$MysqlConn = Database::connect ();
				// echo $MysqlConn;
				//$sql = "select * from customers order by id desc";
				$result = $MysqlConn->query ( $sql );
				// foreach($result->fetch_array() as $row)
				while ( $row = $result->fetch_array () ) {
					echo '<tr>';
					echo '<td> ' . $row ['name'] . '</td>';
					echo '<td>' . $row ['email'] . '</td>';
					echo '<td>' . $row ['mobile'] . '</td>';
					echo '<td width=250>';
					echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
					echo ' ';
					echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
					echo ' ';
					echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'&&name='.$row['name'].'">Delete</a>';
					echo '</td>';
					echo '</tr>';
				}
				Database::disconnect ();
				?>
				</tbody>

			</table>
			<?php
			echo pagination($statement,$per_page,$page);
			?>
		</div>

	</div>
	<!--  continer div close -->
</body>
</html>