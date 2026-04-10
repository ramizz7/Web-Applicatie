<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>Klant toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3>Klant toevoegen</h3>

<a href="klanten.php" class="btn btn-danger mb-3">BACK</a>

<form action="../code.php" method="POST">

    <div class="mb-3">
        <label>Naam</label>
        <input type="text" name="naam" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telefoon</label>
        <input type="text" name="telefoon" class="form-control">
    </div>

    <div class="mb-3">
        <label>Adres</label>
        <input type="text" name="adres" class="form-control">
    </div>

    <button type="submit" name="save_klant" class="btn btn-primary">
        Opslaan
    </button>

</form>

</div>

</body>
</html>