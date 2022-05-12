<?php
if(count($_POST)>0) {
	require_once("../config.php");
	$sql = "INSERT INTO menuitems (code, naam,prijs) VALUES ('" . $_POST["code"] . "','" . $_POST["naam"] . "','" . $_POST["prijs"] ."')";
	mysqli_query($link,$sql);
	$current_id = mysqli_insert_id($link);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
        header("location: ../eten.php");
	}
}
?>


<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<form method="POST" action="">
	<div style="width:500px;">
		<div style="padding-bottom:5px;"><a href="../eten.php" class="link"> Eten</a></div>
		<table >
			<tr class="tableheader">
				<td colspan="2"><h2>Add New eten</h2></td>
			</tr>
			<tr>
				<td><label>Code</label></td>
				<td><input type="text" name="code" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Naam</label></td>
				<td><input type="text" name="naam"></td>
			</tr>
            <tr>
				<td><label>Prijs</label></td>
				<td><input type="number" min="0.00" max="10000.00" step="0.01" name="prijs" class="txtField"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
	</div>
</form>
</html>