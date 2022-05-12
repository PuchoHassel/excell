<?php 
include 'database.php';

//select
$query = "SELECT naam, telefoon, email FROM klanten";
$stmt = $con->prepare($query);
$stmt->execute();

$num = $stmt->rowCount();

// create

if($num>0) {

} else {
    echo "<div class='alert-danger'> No records found. </div>";
}

?>