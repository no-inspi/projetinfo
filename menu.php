<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">La Guilde</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="boutique.php">Boutique</a>
        </li>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        -->
        
      </ul>
     
      <div class="d-flex">
          <?php if(!isset($_SESSION['login'])) { ?>
            <a class="btn btn-outline-primary" href="connexion.php">Connexion</a>
            <a class="btn btn-outline-primary" href="inscription.php" style="margin-left: 20px">Inscription</a>
          <?php } ?>
          <?php if(isset($_SESSION['login'])) { ?>
          <a class="btn btn-outline-primary" href="deconnexion.php" style="margin-left: 20px">Deconnexion</a>
          <?php } ?>
      </div>
      
    </div>
  </div>
</nav>