<?php
session_start();
require '../dbcon.php';

$users = mysqli_query($con, "SELECT Id, Naam FROM users");
?>

<!doctype html>
<html>
<head>
<title>Planning toevoegen</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">
<h3>+ Planning toevoegen</h3>

<form action="../code.php" method="POST">

<div class="mb-3">
<label>Gebruiker</label>
<select name="user_id" class="form-control" required>
<option value="">-- Kies gebruiker --</option>
<?php foreach($users as $user): ?>
<option value="<?= $user['Id'] ?>"><?= $user['Naam'] ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label>Titel</label>
<input type="text" name="titel" class="form-control" required>
</div>

<div class="mb-3">
<label>Beschrijving</label>
<textarea name="beschrijving" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Datum</label>
<input type="date" name="datum" class="form-control" required>
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="Open">Open</option>
<option value="Afgerond">Afgerond</option>
</select>
</div>

<button type="submit" name="save_planning" class="btn btn-primary">Opslaan</button>

</form>
</div>
</body>
</html>