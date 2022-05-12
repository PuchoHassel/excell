<?php
require_once '../config.php';	

if(count($_POST)>0) {

	$sql = "UPDATE reserveringen SET ID='" . $_POST['ID'] . "', klantnaam='" . $_POST["klantnaam"] . "', datum='" . $_POST["datum"] . "', aantal='" . $_POST["aantal"] . "', tijd='" . $_POST["tijd"] . "' WHERE ID='" . $_POST['ID'] ."'";
	mysqli_query($link,$sql);
	$message = "Record Modified Successfully";
	header('location: ../reserveringen.php');
}
$select_query = "SELECT * FROM reserveringen WHERE ID='" . $_GET["ID"] . "'";
$result = mysqli_query($link,$select_query);
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="">
	<div><?php if(isset($message)) {echo $message;}?>
</div>
	<div style="width:500px;">
		<div style="padding-bottom:5px;"><a href="../reserveringen.php" class="link"> Reserveringen</a></div>
		<table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2"><h2>Update Reservering</h2></td>
			</tr>
            <tr>
                <td><label>ID</label></td>
                <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
				<input type="hidden" name="ID"  value="<?php echo $row['ID']; ?>">
            </tr>
			<tr>
				<td><label>Klantnaam</label></td>
				<td><input type="text" name="klantnaam" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Datum</label></td>
				<td><input type="date" name="datum" class="txtField"></td>
			</tr>
				<td><label>Tijd</label></td>
				<td><input type="time" name="tijd" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Aantal</label></td>
				<td><input type="text" name="aantal" class="txtField"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Save" class="btnSubmit"></td>
			</tr>
		</table>
	</div>
</form>
</html>
</body>
</html>