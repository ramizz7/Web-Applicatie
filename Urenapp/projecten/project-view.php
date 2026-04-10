<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html>
<head>
    <title>Project bekijken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include '../navbar.php'; ?>

<div class="container mt-4">

<h3 class="mb-3">👁️ Project details</h3>

<a href="projecten.php" class="btn btn-secondary mb-3">⬅ Terug</a>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM projecten WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        $project = mysqli_fetch_assoc($result);
?>

<div class="card">
<div class="card-body">

<p><strong>ID:</strong> <?= $project['id']; ?></p>
<p><strong>Naam:</strong> <?= $project['naam']; ?></p>
<p><strong>Beschrijving:</strong> <?= $project['beschrijving']; ?></p>
<p><strong>Startdatum:</strong> <?= $project['startdatum']; ?></p>
<p><strong>Einddatum:</strong> <?= $project['einddatum']; ?></p>

</div>
</div>

<?php
    } else {
        echo "<h4>Geen project gevonden</h4>";
    }
}
?>

</div>
</body>
</html>