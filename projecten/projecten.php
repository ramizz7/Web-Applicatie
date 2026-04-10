<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>Projecten overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3 class="mb-3">📁 Projecten overzicht</h3>

<div class="mb-3">
    <a href="create-project.php" class="btn btn-primary me-2">+ Project toevoegen</a>
    <a href="../pdf.php?page=projecten" class="btn btn-danger">📄 Export PDF</a>
</div>

<!-- ZOEK -->
<form method="GET">
    <div class="input-group mb-3">
        <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control" placeholder="Zoek project...">
        <button class="btn btn-success">Zoek</button>
    </div>
</form>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Naam</th>
    <th>Beschrijving</th>
    <th>Start</th>
    <th>Einde</th>
    <th>Acties</th>
</tr>
</thead>

<tbody>

<?php
if(!empty($_GET['search'])){
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $query = "SELECT * FROM projecten WHERE naam LIKE '%$search%' OR beschrijving LIKE '%$search%'";
}else{
    $query = "SELECT * FROM projecten";
}

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
    foreach($result as $row){
?>

<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['naam']; ?></td>
    <td><?= $row['beschrijving']; ?></td>
    <td><?= $row['startdatum']; ?></td>
    <td><?= $row['einddatum']; ?></td>
    <td>
        <a href="project-view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
        <a href="edit-project.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>

        <form action="../code.php" method="POST" class="d-inline">
            <button type="submit" name="delete_project" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                Delete
            </button>
        </form>
    </td>
</tr>

<?php
    }
}else{
    echo "<tr><td colspan='6'>Geen data gevonden</td></tr>";
}
?>

</tbody>
</table>

</div>
</body>
</html>