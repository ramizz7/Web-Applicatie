<?php
session_start();
require '../dbcon.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Gebruiker bewerken</title>
</head>
<body>
<?php include '../navbar.php'; ?>
<div class="container mt-5">

    <?php include('../message.php'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>
                        Gebruiker bewerken
                        <a href="/Urenapp/users/users.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">

                <?php
                if(isset($_GET['id']))
                {
                    $user_id = mysqli_real_escape_string($con, $_GET['id']);

                    $query = "SELECT * FROM users WHERE id='$user_id'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $user = mysqli_fetch_array($query_run);
                ?>

                        <form action="../code.php" method="POST">

                            <input type="hidden" name="user_id" value="<?= $user['Id']; ?>">

                            <div class="mb-3">
                                <label>Naam</label>
                                <input type="text" name="Naam" value="<?= $user['Naam']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="Email" value="<?= $user['Email']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Rol</label>
                                <input type="text" name="Rol" value="<?= $user['Rol']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">
                                    Gebruiker updaten
                                </button>
                            </div>

                        </form>

                <?php
                    }
                    else
                    {
                        echo "<h4>Geen gebruiker gevonden</h4>";
                    }
                }
                ?>

                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>