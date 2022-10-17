<?php
require("connexion.php");
if(isset($_POST['task'])) {
    $task = $_POST['task'];

    mysqli_query($connexion,"INSERT INTO todo(tache) VALUES('$task')");
}

$query = 'SELECT * FROM todo';
$result = mysqli_query($connexion, $query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <header>
            <h1 data-text="to do list" style="text-align:center">to do list</h1>
            <form action="" method="post" id="task">
                <div class="input-group mb-3" style="text-transform:capitalize">
                    <input type="text" id="task" name="task" class="form-control" placeholder="Votre tache" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ajouter</button>
                </div>
            </form>
        </header>
        <main>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >TASK</th>
                        <th scope="col">CHECK</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['id'];
                        $task = $row['tache'];           
                ?>

                <tbody>
                    <tr style="text-transform:capitalize">
                        <td scope="col"><?= $row['id'] ?></td>
                        <td scope="col"><?= $row['tache'] ?></td>
                        <td scope="col">
                            <input style="align-items:center" class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                        </td>
                        <td scope="col">
                            <a href="delete.php?del=<?= $id ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </main>

    </body>
</html>