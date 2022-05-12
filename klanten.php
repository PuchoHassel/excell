<?php
include_once 'config.php';
include 'header.php';

$sql="SELECT * FROM klanten";

$result=mysqli_query($link, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Klanten Overzicht</title>
</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1>Klanten</h1>
        </div>
    <form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr class="listheader">
            <td>#</td>
            <td>Naam</td>
            <td>Telefoon</td>
            <td>Email</td>
            <td><a href="CRUD/create.php" class="link"> Add Klant</a></div>
		</td>
        </tr>
        <?php if($result->num_rows > 0): ?>

<?php while($row=mysqli_fetch_array($result)) : ?>

    <tr>
        <th scope="row"> <?php echo $row['ID']; ?></th>
        <td><?php echo $row['naam']; ?></td>
        <td><?php echo $row['telefoon']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><a class="btn btn-info" href="CRUD/update.php?ID=<?php echo $row['ID']; ?>">Edit</a>
        <a class="btn btn-danger" href="CRUD/delete.php?ID=<?php echo $row['ID']; ?>">Delete</a></td>

    </tr>
        <?php endwhile; ?>

        <?php else: ?>

        <?php endif; ?>
        </table>
</form>

    </div>
</body>
</html>