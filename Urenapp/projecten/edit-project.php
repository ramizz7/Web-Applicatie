<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>Project bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3>✏️ Project bewerken</h3>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM projecten WHERE id='$id'";
$result = mysqli_query($con, $query);
$project = mysqli_fetch_assoc($result);
?>

<form action="../code.php" method="POST">

<input type="hidden" name="id" value="<?= $project['id']; ?>">

<div class="mb-3">
    <label>Naam</label>
    <input type="text" name="naam" value="<?= $project['naam']; ?>" class="form-control">
</div>

<div class="mb-3">
    <label>Beschrijving</label>
    <input type="text" name="beschrijving" value="<?= $project['beschrijving']; ?>" class="form-control">
</div>

<div class="mb-3">
    <label>Startdatum</label>
    <input type="date" name="startdatum" value="<?= $project['startdatum']; ?>" class="form-control">
</div>

<div class="mb-3">
    <label>Einddatum</label>
    <input type="date" name="einddatum" value="<?= $project['einddatum']; ?>" class="form-control">
</div>

<button type="submit" name="update_project" class="btn btn-success">
    Updaten
</button>

</form>

</div>
</body>
</html>