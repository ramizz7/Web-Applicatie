<?php
session_start();
require '../dbcon.php';

if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "DELETE FROM users WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User succesvol verwijderd";
    }
    else
    {
        $_SESSION['message'] = "Fout bij verwijderen";
    }

    header("Location: users.php");
    exit();
}
?>