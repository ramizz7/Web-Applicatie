<?php
session_start();
require __DIR__ . '/../dbcon.php';
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Klant Bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../navbar.php'; ?>

<div class="container mt-5">

    <?php include '../message.php'; ?>

    <div class="card">
        <div class="card-header">
            <h4>Klant Bewerken
                <a href="klanten.php" class="btn btn-danger float-end">Terug</a>
            </h4>
        </div>
        <div class="card-body">
            <?php
            if(isset($_GET['id'])){
                $id = mysqli_real_escape_string($con, $_GET['id']);

                $query = "SELECT * FROM klanten WHERE id='$id'";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0){
                    $klant = mysqli_fetch_array($result);
            ?>
                <form action="../code.php" method="POST">
                    <input type="hidden" name="klant_id" value="<?= $klant['id']; ?>">

                    <div class="mb-3">
                        <label>Naam</label>
                        <input type="text" name="naam" value="<?= htmlspecialchars($klant['naam']); ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($klant['email']); ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Telefoon</label>
                        <input type="text" name="telefoon" value="<?= htmlspecialchars($klant['telefoon']); ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Adres</label>
                        <input type="text" name="adres" value="<?= htmlspecialchars($klant['adres']); ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="update_klant" class="btn btn-primary">Klant updaten</button>
                    </div>
                </form>
            <?php
                } else {
                    echo "<h5>Geen klant gevonden</h5>";
                }
            } else {
                echo "<h5>Geen ID opgegeven</h5>";
            }
            ?>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>