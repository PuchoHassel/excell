<?php
include 'header.php';
include_once 'config.php';

$sql="SELECT tafel,aantal,gerecht,geserveerd FROM ober";

$result=mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ober Overzicht</title>
</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1>Ober Overzicht</h1>
        </div>
    <form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr class="listheader">
            <td>Tafel</td>
            <td>Aantal</td>
            <td>Gerecht</td>
            <td>geserveerd</td>
		</td>
        </tr>
        <?php if($result->num_rows > 0): ?>

<?php while($row=mysqli_fetch_array($result)) : ?>

    <tr>
        <th scope="row"> <?php echo $row['tafel']; ?></th>
        <td><?php echo $row['aantal']; ?></td>
        <td><?php echo $row['gerecht']; ?></td>
        <td><?php echo $row['geserveerd']; ?></td>

    </tr>
        <?php endwhile; ?>

        <?php else: ?>

        <?php endif; ?>
        </table>
</form>

    </div>
</body>
</html>