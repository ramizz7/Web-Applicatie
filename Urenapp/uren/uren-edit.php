<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
<title>Uren bewerken</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3>✏️ Uren bewerken</h3>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM uren WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<form action="../code.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="mb-3">
<label>Gebruiker</label>
<select name="user_id" class="form-control">
<?php
$users = mysqli_query($con, "SELECT * FROM users");
while($u = mysqli_fetch_assoc($users)){
?>
<option value="<?= $u['Id']; ?>" <?= $u['Id'] == $row['user_id'] ? 'selected' : '' ?>>
<?= $u['Naam']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<input type="date" name="datum" value="<?= $row['datum']; ?>" class="form-control">
</div>

<div class="mb-3">
<input type="number" step="0.1" name="aantal_uren" value="<?= $row['aantal_uren']; ?>" class="form-control">
</div>

<div class="mb-3">
<input type="text" name="beschrijving" value="<?= $row['beschrijving']; ?>" class="form-control">
</div>

<button type="submit" name="update_uren" class="btn btn-success">
Updaten
</button>

</form>

</div>
</body>
</html>