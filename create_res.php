<?php

if(count($_POST)>0) {
	require_once("../config.php");
	$sql = "INSERT INTO reserveringen (tafel, datum, tijd, klantnaam, aantal) VALUES ('" . $_POST["tafel"] . "','" . $_POST["datum"] . "','" . $_POST["tijd"] . "','" . $_POST["klantnaam"] ."','" . $_POST["aantal"] ."')";
	mysqli_query($link,$sql);
	$current_id = mysqli_insert_id($link);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
        header("location: ../reserveringen.php");
	}
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<form method="POST" action="">
	<div style="width:500px;">
		<div style="padding-bottom:5px;"><a href="../reserveringen.php" class="link"> Reserveringen</a></div>
		<table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2"><h2>Add New Reservering</h2></td>
			</tr>
			<tr>
				<td><label>Tafel</label></td>
				<td><input type="int" name="tafel" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Datum</label></td>
				<td><input type="date" name="datum" class="txtField"></td>
			</tr>
				<td><label>Tijd</label></td>
				<td><input type="time" name="tijd" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Klantnaam</label></td>
				<td><input type="text" name="klantnaam" class="txtField"></td>
			</tr>
            <tr>
				<td><label>Aantal</label></td>
				<td><input type="number" name="aantal" class="txtField"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
	</div>
</form>
</html>