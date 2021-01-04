<?php
    require 'config.php';
    if($_POST){
        $title = $_POST['title'];
        $desc   = $_POST['description'];

        $sql = "INSERT INTO todo (title,description) VALUES (:title,:description)";
        $pdostatement = $pdo -> prepare($sql);
        $result = $pdostatement -> execute(
            array(
                ':title' => $title,
                ':description' => $desc
            )
        );

        // var_dump($result);

        if($result){
            echo "<script> alert('New ToDo is add');window.location.href='index.php';
            </script>";
        }
        
    }

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
    <div class="container mt-5">

        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Create Todo Lists </h1>
                <form action="add.php" method="POST">
                    <div class="row ">
                        <div class="col-8">
                          
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title">
                        
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-8">
                        
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description">
                        
                        </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary">Create</button>
                    <a href="index.php" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>