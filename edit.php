<?php
    require 'config.php';
    if($_POST){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc   = $_POST['description'];
        
        $sql = "update todo set title='$title', description='$desc' where id=$id";
        $pdostatement = $pdo -> prepare($sql);
        $result = $pdostatement -> execute();
       

        if($result){
            echo "<script> alert('ToDo is updated');window.location.href='index.php';
            </script>";
        }

    }
    if($_GET){
        $id = $_GET['id'];

        $sql = "SELECT * FROM todo where id=$id";
        $pdostatement = $pdo -> prepare($sql);
        $pdostatement -> execute();
        $result = $pdostatement -> fetch(PDO::FETCH_ASSOC);

        // var_dump($result);
        $id = $result['id'];
        $title = $result['title'];
        $desc = $result['description'];
        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TODO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Create Todo Lists </h1>
                <form action="#" method="POST">
                    <div class="row ">
                        <div class="col-8">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $id;  ?>">    
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $title;  ?>">
                        
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-8">
                        
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="<?php echo $desc; ?>">
                        
                        </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>