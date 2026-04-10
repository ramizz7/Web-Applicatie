<?php
include '../dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gebruikers overzicht</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
<?php include '../navbar.php';
 ?>
<div class="container mt-4">
        <!--om emoji toe te voegen druk je tegelijkertijd (windows+.) -->
    <h2 class="mb-3">👥 Gebruikers overzicht</h2>

    <!-- ➕ Toevoegen knop -->
    <a href="create-user.php" class="btn btn-primary">
        + Gebruiker toevoegen </a> 
        <a href="../pdf.php?page=users" class="btn btn-danger">
    📜Export PDF
</a>

    <!-- 🔍 Zoekbalk -->
    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" 
                   name="search" 
                   value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" 
                   class="form-control" 
                   placeholder="Zoek op naam of email">
            <button type="submit" class="btn btn-success">Zoek</button>
            
        </div>
    </form>

    <!-- 📊 Tabel -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>

        <tbody>

        <?php
        //  Zoekfunctie
        if(isset($_GET['search']) && $_GET['search'] != "")
        {
            $search = mysqli_real_escape_string($con, $_GET['search']);

            $query = "SELECT * FROM users 
                      WHERE Naam LIKE '%$search%' 
                      OR Email LIKE '%$search%'";
        }
        else
        {
            $query = "SELECT * FROM users";
        }

        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $user)
            {
        ?>
                <tr>
                    <td><?= $user['Id']; ?></td>
                    <td><?= $user['Naam']; ?></td>
                    <td><?= $user['Email']; ?></td>
                    <td><?= $user['Rol']; ?></td>

                    <td>
                        <a href="user-view.php?id=<?= $user['Id']; ?>" class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="user-edit.php?id=<?= $user['Id']; ?>" class="btn btn-success btn-sm">
                            Edit
                        </a>

                        <a href="delete-user.php?id=<?= $user['Id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Weet je het zeker?')">
                            Delete
                        </a>
                    </td>
                </tr>
        <?php
            }
        }
        else
        {
            echo "<tr><td colspan='5'>Geen data gevonden</td></tr>";
        }
        ?>

        </tbody>
    </table>

</div>

</body>
</html>