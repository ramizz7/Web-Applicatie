<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="/Urenapp/index.php">Urenapp</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link" href="/Urenapp/index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/Urenapp/users/users.php">Gebruikers</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/Urenapp/uren/uren.php">Uren</a>
        </li>

        <li class="nav-item">
         <a class="nav-link" href="/Urenapp/projecten/projecten.php">Projecten</a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="/Urenapp/klanten/klanten.php"> Klanten</a>
    </li>

       <li class="nav-item">
        <a class="nav-link" href="/Urenapp/planning/planning.php"> Planning</a>
      </li>

        <li class="nav-item">
          <a class="nav-link" href="/Urenapp/users/create-user.php">Gebruiker toevoegen</a>
        </li>

      </ul>

      <form class="d-flex" method="GET" action="/Urenapp/users/users.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Zoek gebruiker">
        <button class="btn btn-success" type="submit">Zoek</button>
      </form>

    </div>
  </div>
</nav>