<?php
session_start();
require '../dbcon.php';

$id = $_GET['id'];

$planning = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM planning WHERE id='$id'"));
$users = mysqli_query($con, "SELECT Id, Naam FROM users");
?>

<!doctype html>
<html>
<head>
<title>Edit Planning</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">
<h3>Edit Planning</h3>

<form action="../code.php" method="POST">

<input type="hidden" name="planning_id" value="<?= $planning['id']; ?>">

<div class="mb-3">
<label>Gebruiker</label>
<select name="user_id" class="form-control" required>
<?php foreach($users as $user): ?>
<option value="<?= $user['Id'] ?>" <?= ($user['Id']==$planning['user_id'])?'selected':'' ?>>
<?= $user['Naam'] ?>
</option>
<?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label>Titel</label>
<input type="text" name="titel" class="form-control" value="<?= $planning['titel']; ?>">
</div>

<div class="mb-3">
<label>Beschrijving</label>
<textarea name="beschrijving" class="form-control"><?= $planning['beschrijving']; ?></textarea>
</div>

<div class="mb-3">
<label>Datum</label>
<input type="date" name="datum" class="form-control" value="<?= $planning['datum']; ?>">
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="Open" <?= ($planning['status']=='Open')?'selected':'' ?>>Open</option>
<option value="Afgerond" <?= ($planning['status']=='Afgerond')?'selected':'' ?>>Afgerond</option>
</select>
</div>

<button type="submit" name="update_planning" class="btn btn-success">Update</button>

</form>
</div>
</body>
</html>