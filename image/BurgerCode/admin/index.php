<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="http://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1 class="text-logo"><i class="bi bi-robot"></i> Burger Code <i class="bi bi-robot"></i></h1>
        <div class="container card admin">
            <div class="row card-body">
                <h1><strong>Liste des items </strong><a href="insert.php" class="btn btn-success btn-lg"><i class="bi bi-plus"></i>Atouter</a></h1>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>    
                    </thead>
                    <tbody>
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category
                                                FROM items LEFT JOIN categories ON items.category = categories.id
                                                ORDER BY items.id DESC');
                        while($item = $statement->fetch())
                        {
                            echo '<tr>';
                            echo '<td>' . $item['name'] .'</td>';
                            echo '<td>' . $item['description'] .'</td>';
                            echo '<td>' . $item['price'] .'</td>';
                            echo '<td>' . $item['category'] .'</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-light btn-sm" href="view.php?id=' . $item['id'] . '"><i class="bi bi-eye"></i> Voir</a>';
                            echo '<a class="btn btn-primary btn-sm" href="update.php?id=' . $item['id'] . '"><i class="bi bi-pencil"></i> Modifier</a>';
                            echo '<a class="btn btn-danger btn-sm" href="delete.php?id=' . $item['id'] . '"><i class="bi bi-trash"></i></i> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>'; 
                        }
                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>