<?php
session_start();
require __DIR__ . '/../dbcon.php';
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bekijk Klant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../navbar.php'; ?>

<div class="container mt-5">

    <?php include '../message.php'; ?>

    <div class="card">
        <div class="card-header">
            <h4>Bekijk Klant
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
                <div class="mb-3">
                    <strong>Naam:</strong>
                    <p><?= htmlspecialchars($klant['naam']); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Email:</strong>
                    <p><?= htmlspecialchars($klant['email']); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Telefoon:</strong>
                    <p><?= htmlspecialchars($klant['telefoon']); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Adres:</strong>
                    <p><?= htmlspecialchars($klant['adres']); ?></p>
                </div>

            <?php
                } else {
                    echo "<h5>Geen klant gevonden met dit ID</h5>";
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