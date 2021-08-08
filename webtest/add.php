<?php
include_once ("connect.php");
if (isset($_POST['submit']))
{
	$name = $_POST['name'];
	$date = date("Y-m-d");
	$_POST['date'] = $date;
	$sql = "INSERT INTO mail (name,date)
	 VALUES ('$name','$date')";
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
		sleep(0.5);
		header("refresh:1;url = index.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
