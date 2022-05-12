<?php
require_once '../config.php';

$sql = "DELETE FROM subgerechten WHERE id='" . $_GET['ID'] ."' ";


if(mysqli_query($link, $sql)) {
    echo "Delete succes";
} else {
    echo "Error";
}

mysqli_close($link);
//mysqli_query($link,$sql);
header("Location:../subgroepen.php");
?>