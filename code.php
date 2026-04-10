<?php
session_start();
require __DIR__ . '/dbcon.php'; // Correct pad naar je database connectie

// ================== USERS ==================
if(isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);
    mysqli_query($con, "DELETE FROM users WHERE Id='$user_id'");
    $_SESSION['message'] = "User succesvol verwijderd";
    header("Location: users/users.php");
    exit();
}

if(isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $naam = mysqli_real_escape_string($con, $_POST['Naam']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $rol = mysqli_real_escape_string($con, $_POST['Rol']);
    mysqli_query($con, "UPDATE users SET Naam='$naam', Email='$email', Rol='$rol' WHERE Id='$user_id'");
    $_SESSION['message'] = "User succesvol geüpdatet";
    header("Location: users/users.php");
    exit();
}

if(isset($_POST['save_user'])) {
    $naam = mysqli_real_escape_string($con, $_POST['Naam']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $rol = mysqli_real_escape_string($con, $_POST['Rol']);
    mysqli_query($con, "INSERT INTO users (Naam, Email, Rol) VALUES ('$naam','$email','$rol')");
    $_SESSION['message'] = "User succesvol toegevoegd";
    header("Location: users/users.php");
    exit();
}

// ================== UREN ==================
if(isset($_POST['delete_uren'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_uren']);
    mysqli_query($con, "DELETE FROM uren WHERE id='$id'");
    $_SESSION['message'] = "Uren verwijderd";
    header("Location: uren/uren.php");
    exit();
}

if(isset($_POST['save_uren'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $uren = mysqli_real_escape_string($con, $_POST['aantal_uren']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    mysqli_query($con, "INSERT INTO uren (user_id, datum, aantal_uren, beschrijving)
        VALUES ('$user_id','$datum','$uren','$beschrijving')");
    $_SESSION['message'] = "Uren toegevoegd";
    header("Location: uren/uren.php");
    exit();
}

if(isset($_POST['update_uren'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $uren = mysqli_real_escape_string($con, $_POST['aantal_uren']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    mysqli_query($con, "UPDATE uren SET user_id='$user_id', datum='$datum', aantal_uren='$uren', beschrijving='$beschrijving' WHERE id='$id'");
    $_SESSION['message'] = "Uren geüpdatet";
    header("Location: uren/uren.php");
    exit();
}

// ================== PROJECTEN ==================
if(isset($_POST['delete_project'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_project']);
    mysqli_query($con, "DELETE FROM projecten WHERE id='$id'");
    $_SESSION['message'] = "Project verwijderd";
    header("Location: projecten/projecten.php");
    exit();
}

if(isset($_POST['save_project'])) {
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $startdatum = mysqli_real_escape_string($con, $_POST['startdatum']);
    $einddatum = mysqli_real_escape_string($con, $_POST['einddatum']);
    mysqli_query($con, "INSERT INTO projecten (naam, beschrijving, startdatum, einddatum)
        VALUES ('$naam','$beschrijving','$startdatum','$einddatum')");
    $_SESSION['message'] = "Project toegevoegd";
    header("Location: projecten/projecten.php");
    exit();
}

if(isset($_POST['update_project'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $startdatum = mysqli_real_escape_string($con, $_POST['startdatum']);
    $einddatum = mysqli_real_escape_string($con, $_POST['einddatum']);
    mysqli_query($con, "UPDATE projecten SET naam='$naam', beschrijving='$beschrijving', startdatum='$startdatum', einddatum='$einddatum' WHERE id='$id'");
    $_SESSION['message'] = "Project geüpdatet";
    header("Location: projecten/projecten.php");
    exit();
}

// ================== KLANTEN ==================
if(isset($_POST['delete_klant'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_klant']);
    mysqli_query($con, "DELETE FROM klanten WHERE id='$id'");
    $_SESSION['message'] = "Klant verwijderd";
    header("Location: klanten/klanten.php");
    exit();
}

if(isset($_POST['save_klant'])) {
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefoon = mysqli_real_escape_string($con, $_POST['telefoon']);
    $adres = mysqli_real_escape_string($con, $_POST['adres']);
    mysqli_query($con, "INSERT INTO klanten (naam,email,telefoon,adres) VALUES ('$naam','$email','$telefoon','$adres')");
    $_SESSION['message'] = "Klant toegevoegd";
    header("Location: klanten/klanten.php");
    exit();
}

if(isset($_POST['update_klant'])) {
    $id = mysqli_real_escape_string($con, $_POST['klant_id']);
    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefoon = mysqli_real_escape_string($con, $_POST['telefoon']);
    $adres = mysqli_real_escape_string($con, $_POST['adres']);
    mysqli_query($con, "UPDATE klanten SET naam='$naam', email='$email', telefoon='$telefoon', adres='$adres' WHERE id='$id'");
    $_SESSION['message'] = "Klant geüpdatet";
    header("Location: klanten/klanten.php");
    exit();
}

// ================== PLANNING ==================
//delte planning
if(isset($_POST['delete_planning'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_planning']);
    mysqli_query($con, "DELETE FROM planning WHERE id='$id'");
    $_SESSION['message'] = "Planning verwijderd";
    header("Location: planning/planning.php");
    exit();
}
// CREATE PLANNING
if(isset($_POST['save_planning'])) {

    $user_id = mysqli_real_escape_string($con, $_POST['user_id']); // 👈 BELANGRIJK
    $titel = mysqli_real_escape_string($con, $_POST['titel']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "INSERT INTO planning (user_id, titel, beschrijving, datum, status) 
              VALUES ('$user_id','$titel','$beschrijving','$datum','$status')";

    mysqli_query($con, $query);

    $_SESSION['message'] = "Planning toegevoegd";
    header("Location: planning/planning.php");
    exit();
}
//update planning
if(isset($_POST['update_planning'])) {

    $id = mysqli_real_escape_string($con, $_POST['planning_id']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']); // 👈 BELANGRIJK
    $titel = mysqli_real_escape_string($con, $_POST['titel']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE planning SET 
        user_id='$user_id',
        titel='$titel',
        beschrijving='$beschrijving',
        datum='$datum',
        status='$status'
        WHERE id='$id'";

    mysqli_query($con, $query);

    $_SESSION['message'] = "Planning geüpdatet";
    header("Location: planning/planning.php");
    exit();
}

?>