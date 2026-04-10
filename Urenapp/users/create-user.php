<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Create</title>
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
                        User toevoegen

                        <a href="/Urenapp/users/users.php" class="btn btn-danger float-end">
                            BACK
                        </a>

                    </h4>
                </div>

                <div class="card-body">

                    <form action="../code.php" method="POST">

                        <div class="mb-3">
                            <label>Naam</label>
                            <input type="text" name="Naam" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Rol</label>
                            <select name="rol" class="form-control" required>
                                <option value="user">👤 User</option>
                                <option value="admin">🛡️ Admin</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="save_user" class="btn btn-primary">
                                Toevoegen
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>