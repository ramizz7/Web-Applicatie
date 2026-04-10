<?php
session_start();
require '../dbcon.php';

$id = $_GET['id'];

$query = "
SELECT p.*, u.Naam AS gebruiker,
(SELECT SUM(aantal_uren) FROM uren WHERE uren.user_id = p.user_id AND uren.datum = p.datum) AS totaal_uren
FROM planning p
LEFT JOIN users u ON u.Id = p.user_id
WHERE p.id='$id'
";

$planning = mysqli_fetch_assoc(mysqli_query($con, $query));
?>

<!doctype html>
<html>
<head>
<title>Bekijk Planning</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">
<h3>📋 Planning bekijken</h3>

<table class="table table-bordered">
<tr><th>Gebruiker</th><td><?= $planning['gebruiker'] ?? '-' ?></td></tr>
<tr><th>Titel</th><td><?= $planning['titel'] ?></td></tr>
<tr><th>Datum</th><td><?= $planning['datum'] ?></td></tr>
<tr><th>Totaal uren</th><td><?= $planning['totaal_uren'] ?? 0 ?> uur</td></tr>
<tr><th>Status</th><td><?= $planning['status'] ?></td></tr>
<tr><th>Beschrijving</th><td><?= $planning['beschrijving'] ?></td></tr>
</table>

<a href="planning.php" class="btn btn-secondary">Terug</a>
</div>

</body>
</html>