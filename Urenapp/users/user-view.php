<?php
require '../dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Gebruiker bekijken</title>
</head>
<body>
<?php include '../navbar.php'; ?>
<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>
                        Gebruiker details
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

                            <div class="mb-3">
                                <label>Naam</label>
                                <p class="form-control">
                                    <?= $user['Naam']; ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <p class="form-control">
                                    <?= $user['Email']; ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Rol</label>
                                <p class="form-control">
                                    <?= $user['Rol']; ?>
                                </p>
                            </div>

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