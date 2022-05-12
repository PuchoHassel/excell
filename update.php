<?php
require_once '../config.php';
if(count($_POST)>0) {
	$sql = "UPDATE klanten set ID='" . $_POST['ID'] . "', naam='" . $_POST["naam"] . "', telefoon='" . $_POST["telefoon"] . "', email='" . $_POST["email"] . "' WHERE ID='" . $_POST['ID'] ."'";
	mysqli_query($link,$sql);
	$message = "Record Modified Successfully";
	 header('location: ../klanten.php');
}
$select_query = "SELECT * FROM klanten WHERE ID='" . $_GET["ID"] . "'";
$result = mysqli_query($link,$select_query);
$row = mysqli_fetch_array($result);
//
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<form method="POST" action="">
	<div><?php if(isset($message)) {echo $message;}?>
		</div>
	<div style="width:500px;">
		<div style="padding-bottom:5px;"><a href="../klanten.php" class="link"> Klanten</a></div>
		<table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2"><h2>Edit Klant</h2></td>
			</tr>
            <tr>
                <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
				<input type="hidden" name="ID"  value="<?php echo $row['ID']; ?>">			
			<tr>
				<td><label>Naam</label></td>
				<td><input type="text" name="naam" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Telefoon</label></td>
				<td><input type="text" name="telefoon" class="txtField"></td>
			</tr>
				<td><label>Email</label></td>
				<td><input type="text" name="email" class="txtField"></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Save" class="btnSubmit"></td>
			</tr>
		</table>
	</div>
</form>
</html>