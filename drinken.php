<?php
include 'header.php';
include_once 'config.php';

$sql="SELECT * FROM dranken";

$result=mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Drinken</title>
</head>
<body>
<table class='table table-hover table-responsive table-bordered'>
        <tr class="listheader">
            <td>#</td>
            <td>Code</td>
            <td>Omschrijving</td>
            <td>Prijs</td> 
            <td>Valt onder</td>
            <td><a href="CRUD/create_drk.php" class="link"> New Drinken</a></div>
		</td>
        </tr>
        <?php if($result->num_rows > 0): ?>

<?php while($row=mysqli_fetch_array($result)) : ?>

    <tr>
        <th scope="row"> <?php echo $row['ID']; ?></th>
        <td><?php echo $row['Code']; ?></td>
        <td><?php echo $row['Omschrijving']; ?></td>
        <td><?php echo $row['Prijs']; ?></td>
        <td><?php echo $row['Valt']; ?></td>
        <td><a class="btn btn-info" href="CRUD/update_drk.php?ID=<?php echo $row['ID']; ?>">Edit</a>
        <a class="btn btn-danger" href="CRUD/delete.php?ID=<?php echo $row['ID']; ?>">Delete</a></td>

    </tr>
        <?php endwhile; ?>

        <?php else: ?>

        <?php endif; ?>
        </table>
        </div>
</body>
</html>