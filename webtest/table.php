<link rel="stylesheet" href="css.css">


<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'webdevelop');

$columns = array('id','name','date');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[2];

if(isset($_GET['column']))
{
	$columnG=$_GET['column'];
}
else
{
	$columnG="";
}


if(isset($_GET['order']))
{
	$orderG=$_GET['order'];
}
else
{
	$orderG="";
}


if(isset($_GET['filter']))
{
	$filterG=$_GET['filter'];
}
else
{
 	$filterG="";
}

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
if ($result = $mysqli->query('SELECT * FROM mail  ORDER BY ' .  $column . ' ' . $sort_order)) {

	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			th {
				background-color: #54585d;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
		<body>
			<table>
				<tr>
          <td></td><form action="" method="post">
						<?php
							$emails = array();
							$emailQuery = $mysqli->query('SELECT name FROM mail ');
							while ($names= $emailQuery->fetch_assoc())
							{
								$text = $names['name'];
								$text = substr($text, strpos($text, "@") + 1);
								if(!in_array($text,$emails))
									array_push($emails,$text);
							}

							$count = count($emails);
							for($i=0;$i<$count;$i++)
							{
								echo '<a href="table.php?column='.$columnG.'&order='.$orderG.'&filter='.$emails[$i].'"><button class="emailButton" name="email'.$emails[$i].'" type="button" value="email '.$emails[$i].'" >'.$emails[$i].'</button></a>';
							}
							echo '<a href="table.php?column='.$columnG.'&order='.$orderG.'&filter="""><button class="emailButton" name="emailclear" type="button" value="emailclear" >CLEAR </button></a>';

						?>
          <th><a href="table.php?column=id&order=<?php echo $asc_or_desc; ?>&filter=<?php echo $filterG ?>">ID<i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="table.php?column=name&order=<?php echo $asc_or_desc; ?>&filter=<?php echo $filterG ?>">Name<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="table.php?column=date&order=<?php echo $asc_or_desc; ?>&filter=<?php echo $filterG ?>">Date<i class="fas fa-sort<?php echo $column == 'date' ? '-' . $up_or_down : ''; ?>"></i></a></th>
				</tr>
				<?php while ($row = $result->fetch_assoc()):

					if($filterG=="" || substr($row['name'], strpos($row['name'], "@") + 1) == $filterG): ?>
				<tr>
          <td width="20px"><input name="checkbox[]" type="checkbox" value="<?php echo $row['id'];?>"></td>
          <td<?php echo $column == 'id' ? $add_class : ''; ?>><?php echo $row['id']; ?></td>
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['name']; ?></td>
					<td<?php echo $column == 'date' ? $add_class : ''; ?>><?php echo $row['date']; ?></td>
				</tr>
			<?php endif;
				endwhile; ?>

			</table>
			<input class="btnDelete" name="delete" type="submit" value="DELETE" >
		</body>
	</html>
	<?php
	$result->free();
}
?>

<?php
if (isset($_POST['delete']))
  {
    $count=count($_POST['checkbox']);
    for($i=0;$i<$count;$i++)
    {
      $del_id = $_POST['checkbox'][$i];
      $sql =  "DELETE FROM mail WHERE id = $del_id;";
                mysqli_query($mysqli, $sql);
                header("refresh:1;url = table.php");
    }
  }
?>
