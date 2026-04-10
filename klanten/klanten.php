<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>Klanten overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include '../navbar.php'; ?>

<div class="container mt-4">

<?php include '../message.php'; ?>

<!-- TITEL -->
<h2 class="mb-3">👥 Klanten overzicht</h2>

<!-- KNOPPEN -->
<div class="mb-3">
    <a href="create-klant.php" class="btn btn-primary me-2">
        + Klant toevoegen
    </a>

    <a href="../pdf.php?page=klanten" class="btn btn-danger">
        📄 Export PDF
    </a>
</div>

<!-- ZOEK -->
<form method="GET">
    <div class="input-group mb-3">
        <input type="text" 
               name="search" 
               value="<?= $_GET['search'] ?? '' ?>" 
               class="form-control" 
               placeholder="Zoek op naam, email of telefoon">
        <button class="btn btn-success">Zoek</button>
    </div>
</form>

<!-- TABEL -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Telefoon</th>
            <th>Acties</th>
        </tr>
    </thead>

    <tbody>

<?php
$search = $_GET['search'] ?? '';

if(!empty($search)){
    $search = mysqli_real_escape_string($con, $search);

    $query = "SELECT * FROM klanten 
              WHERE naam LIKE '%$search%' 
              OR email LIKE '%$search%' 
              OR telefoon LIKE '%$search%'";
} else {
    $query = "SELECT * FROM klanten";
}

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
    foreach($result as $row)
    {
?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['naam']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['telefoon']; ?></td>
            <td>
                <a href="view-klant.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>

                <a href="edit-klant.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>

                <form action="../code.php" method="POST" class="d-inline">
                    <button type="submit" name="delete_klant" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
<?php
    }
}
else
{
    echo "<tr><td colspan='5'>Geen data gevonden</td></tr>";
}
?>

    </tbody>
</table>

</div>

</body>
</html>