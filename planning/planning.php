<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>📅 Planning overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3 class="mb-3">📅 Planning overzicht</h3>

<div class="mb-3">
    <a href="create-planning.php" class="btn btn-primary me-2">+ Planning toevoegen</a>
    <a href="../pdf.php?page=planning" class="btn btn-danger">📄 Export PDF</a>
</div>

<!-- 🔍 ZOEK -->
<form method="GET">
    <div class="input-group mb-3">
        <input type="text" 
               name="search" 
               value="<?= $_GET['search'] ?? '' ?>" 
               class="form-control" 
               placeholder="Zoek op titel, datum, status of gebruiker">
        <button class="btn btn-success">Zoek</button>
    </div>
</form>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Gebruiker</th>
    <th>Titel</th>
    <th>Datum</th>
    <th>Totaal uren</th>
    <th>Status</th>
    <th>Acties</th>
</tr>
</thead>

<tbody>

<?php
if(!empty($_GET['search'])){
    $search = mysqli_real_escape_string($con, $_GET['search']);

    $query = "SELECT p.*, u.Naam AS gebruiker,
        (SELECT SUM(aantal_uren) 
         FROM uren 
         WHERE uren.user_id = p.user_id 
         AND uren.datum = p.datum) AS totaal_uren
        FROM planning p
        LEFT JOIN users u ON u.Id = p.user_id
        WHERE p.titel LIKE '%$search%' 
        OR p.datum LIKE '%$search%' 
        OR p.status LIKE '%$search%' 
        OR u.Naam LIKE '%$search%'";
} else {
    $query = "SELECT p.*, u.Naam AS gebruiker,
        (SELECT SUM(aantal_uren) 
         FROM uren 
         WHERE uren.user_id = p.user_id 
         AND uren.datum = p.datum) AS totaal_uren
        FROM planning p
        LEFT JOIN users u ON u.Id = p.user_id";
}

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
    foreach($result as $row){
?>

<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['gebruiker'] ?? '-'; ?></td>
    <td><?= $row['titel']; ?></td>
    <td><?= $row['datum']; ?></td>
    <td><?= $row['totaal_uren'] ?? 0; ?> uur</td>
    <td><?= $row['status']; ?></td>
    <td>
        <a href="view-planning.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
        <a href="edit-planning.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>

        <form action="../code.php" method="POST" class="d-inline">
            <button type="submit" name="delete_planning" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                Delete
            </button>
        </form>
    </td>
</tr>

<?php
    }
} else {
    echo "<tr><td colspan='7'>Geen data gevonden</td></tr>";
}
?>

</tbody>
</table>

</div>
</body>
</html>