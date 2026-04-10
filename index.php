<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>UrenApp Dashboard</title>
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <h2 class="mb-4">📊 Dashboard</h2>

   <div class="row g-3">

    <!-- USERS -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-primary text-white">
                Users
            </div>

            <div class="card-body">

                <a href="users/users.php" class="btn btn-success mb-3">
                    Ga naar Users
                </a>

                <table class="table table-sm">
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM users LIMIT 5";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <tr>
                            <td><?= $row['Naam']; ?></td>
                            <td><?= $row['Email']; ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <!-- UREN -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-dark text-white">
                Uren
            </div>

            <div class="card-body">

                <a href="uren/uren.php" class="btn btn-success mb-3">
                    Ga naar Uren
                </a>

                <table class="table table-sm">
                    <tr>
                        <th>Datum</th>
                        <th>Uren</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM uren LIMIT 5";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <tr>
                            <td><?= $row['datum']; ?></td>
                            <td><?= $row['aantal_uren']; ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <!-- PROJECTEN -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-warning text-dark">
                Projecten
            </div>

            <div class="card-body">

                <a href="projecten/projecten.php" class="btn btn-success mb-3">
                    Ga naar Projecten
                </a>

                <table class="table table-sm">
                    <tr>
                        <th>Naam</th>
                        <th>Einddatum</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM projecten LIMIT 5";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <tr>
                            <td><?= $row['naam']; ?></td>
                            <td><?= $row['einddatum']; ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
                                <!--Klanten-->
<div class="col-md-6">
    <div class="card h-100">

        <div class="card-header bg-info text-white">
            Klanten
        </div>

        <div class="card-body">

            <a href="klanten/klanten.php" class="btn btn-success mb-3">
                Ga naar Klanten
            </a>

            <table class="table table-sm">
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                </tr>

                <?php
                $query = "SELECT * FROM klanten LIMIT 5";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                    <tr>
                        <td><?= $row['naam']; ?></td>
                        <td><?= $row['email']; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
              <!--Planing-->
        <div class="col-md-12">
    <div class="card h-100">

        <div class="card-header bg-danger text-white">
            Planning
        </div>

        <div class="card-body">

            <a href="planning/planning.php" class="btn btn-success mb-3">
                Ga naar Planning
            </a>

            <table class="table table-sm">
                <tr>
                    <th>Titel</th>
                    <th>Datum</th>
                </tr>

                <?php
                $query = "SELECT * FROM planning LIMIT 5";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                    <tr>
                        <td><?= $row['titel']; ?></td>
                        <td><?= $row['datum']; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>

    </div>
</div>
</body>
</html>