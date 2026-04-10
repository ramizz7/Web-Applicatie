<?php
require 'vendor/autoload.php';
require 'dbcon.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$page = $_GET['page'] ?? 'users';

$html = "<h2>$page overzicht</h2><table border='1' width='100%'>";

if($page == "users")
{
    $result = mysqli_query($con, "SELECT * FROM users");
    $html .= "<tr><th>ID</th><th>Naam</th><th>Email</th></tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        $html .= "<tr>
            <td>{$row['Id']}</td>
            <td>{$row['Naam']}</td>
            <td>{$row['Email']}</td>
        </tr>";
    }
}

elseif($page == "uren")
{
    $result = mysqli_query($con, "SELECT * FROM uren");
    $html .= "<tr><th>Datum</th><th>Uren</th></tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        $html .= "<tr>
            <td>{$row['datum']}</td>
            <td>{$row['aantal_uren']}</td>
        </tr>";
    }
}

elseif($page == "projecten")
{
    $result = mysqli_query($con, "SELECT * FROM projecten");
    $html .= "<tr><th>Naam</th><th>Einddatum</th></tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        $html .= "<tr>
            <td>{$row['naam']}</td>
            <td>{$row['einddatum']}</td>
        </tr>";
    }
}

elseif($page == "klanten")
{
    $result = mysqli_query($con, "SELECT * FROM klanten");
    $html .= "<tr><th>Naam</th><th>Email</th></tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        $html .= "<tr>
            <td>{$row['naam']}</td>
            <td>{$row['email']}</td>
        </tr>";
    }
}

elseif($page == "planning")
{
    $result = mysqli_query($con, "SELECT * FROM planning");
    $html .= "<tr><th>Titel</th><th>Datum</th></tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        $html .= "<tr>
            <td>{$row['titel']}</td>
            <td>{$row['datum']}</td>
        </tr>";
    }
}

$html .= "</table>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("$page.pdf");