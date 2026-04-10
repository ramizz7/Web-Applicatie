<?php
session_start();
require '../dbcon.php';

$id = $_GET['id'];
$query = "SELECT * FROM uren WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html>
<head>
    <title>View uren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include '../navbar.php'; ?>

<div class="container mt-5">

    <h3>Uren details</h3>

    <a href="uren.php" class="btn btn-danger mb-3">BACK</a>

    <div class="card p-3">

        <p><b>ID:</b> <?= $row['id']; ?></p>
        <p><b>User ID:</b> <?= $row['user_id']; ?></p>
        <p><b>Datum:</b> <?= $row['datum']; ?></p>
        <p><b>Uren:</b> <?= $row['aantal_uren']; ?></p>
        <p><b>Beschrijving:</b> <?= $row['beschrijving']; ?></p>

    </div>

</div>

</body>
</html>