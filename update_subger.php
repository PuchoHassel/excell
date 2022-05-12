<?php
include_once '../config.php';

if(count($_POST)>0) {

	$sql = "UPDATE subgerechten SET ID='" . $_POST['ID'] . "', Code='" . $_POST["Code"] . "', Omschrijving='" . $_POST["Omschrijving"] . "', Valt='" . $_POST["Valt"] . "' WHERE ID='" . $_POST['ID'] ."'";
	mysqli_query($link,$sql);
	$message = "Record Modified Successfully";
    header('location: ../subgroepen.php');
}
$select_query = "SELECT * FROM subgerechten WHERE ID='" . $_GET["ID"] . "'";
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
		<div style="padding-bottom:5px;"><a href="../subgroepen.php" class="link"> Sub gerechten</a></div>
		<table cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
			<tr class="tableheader">
				<td colspan="2"><h2>Update Sub gerechten</h2></td>
			</tr>
            <tr>
                <input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
				<input type="hidden" name="ID"  value="<?php echo $row['ID']; ?>">
            </tr>
			<tr>
				<td><label>Code</label></td>
				<td><input type="text" name="Code" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Omschrijving</label></td>
				<td><input type="text" name="Omschrijving" class="txtField"></td>
			</tr>
			<tr>
				<td><label>Valt Onder</label></td>
				<td><select name="Valt">
                    <option value="Dranken">Dranken</option>
                    <option value="Hapjes">Hapjes</option>
                    <option value="Voorgerecht">Voorgerecht</option>
                    <option value="Hoofdgerecht">Hoofdgerecht</option>
                    <option value="Nagerecht">Nagerecht</option>
                </select></td>
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