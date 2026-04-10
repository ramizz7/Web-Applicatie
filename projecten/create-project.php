<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <title>Project toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3>➕ Project toevoegen</h3>

<form action="../code.php" method="POST">

<div class="mb-3">
    <label>Naam</label>
    <input type="text" name="naam" class="form-control">
</div>

<div class="mb-3">
    <label>Beschrijving</label>
    <input type="text" name="beschrijving" class="form-control">
</div>

<div class="mb-3">
    <label>Startdatum</label>
    <input type="date" name="startdatum" class="form-control">
</div>

<div class="mb-3">
    <label>Einddatum</label>
    <input type="date" name="einddatum" class="form-control">
</div>

<button type="submit" name="save_project" class="btn btn-primary">
    Opslaan
</button>

</form>

</div>
</body>
</html>