<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
<title>Uren toevoegen</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3>➕ Uren toevoegen</h3>

<form action="../code.php" method="POST">

<div class="mb-3">
<label>Gebruiker</label>
<select name="user_id" class="form-control">
<?php
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)){
?>
<option value="<?= $row['Id']; ?>">
    <?= $row['Naam']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<label>Datum</label>
<input type="date" name="datum" class="form-control">
</div>

<div class="mb-3">
<label>Uren</label>
<input type="number" step="0.1" name="aantal_uren" class="form-control">
</div>

<div class="mb-3">
<label>Beschrijving</label>
<input type="text" name="beschrijving" class="form-control">
</div>

<button type="submit" name="save_uren" class="btn btn-primary">
Opslaan
</button>

</form>

</div>
</body>
</html>