<?php
if(count($_POST)>0) {
	require_once("../config.php");
	$sql = "INSERT INTO gerechtcategorien (Code, Naam) VALUES ('" . $_POST["Code"] . "','" . $_POST["Naam"] . "')";
	mysqli_query($link,$sql);
	$current_id = mysqli_insert_id($link);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
        header("location: ../hoofdgroepen.php");
	}
}
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<form method="POST" action="">
	<div style="width:500px;">
		<div style="padding-bottom:5px;"><a href="../hoofdgroepen.php" class="link"> Gerecht</a></div>
		<table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2"><h2>Add New Gerecht</h2></td>
			</tr>
			<tr>
				<td><label>Code</label></td>
				<td><input type="text" name="Code" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Naam</label></td>
				<td><input type="text" name="Naam" class="txtField"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
	</div>
</form>
</html>