<?php

require 'config.php';

$mysql = "SELECT * FROM todo ORDER BY id DESC";
$pdostatement = $pdo->prepare($mysql);
$pdostatement->execute();
$result = $pdostatement->fetchALL();
// var_dump($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">TODO LISTS</h2>
            <h3><a href="add.php" class="btn btn-primary">Create</a></h3>
            <table class="table table-striped table-bordered table-success">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Create_at</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($result) {
                        $i = 1;
                        foreach ($result as $value) {
                        
                    ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($value['created_at'])); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    <?php
                            $i++;
                        }
                        
                    }


                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>