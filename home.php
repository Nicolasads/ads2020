<?php
$url = "https://my-json-server.typicode.com/Nicolasads/api/empresa"; 
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$empresas = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Localizaê</title>
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/home.css">
  </head> 
  <body>

  <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="home.php">
    <i class="fas fa-map-marker-alt fa-2x"></i>Localizaê
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-end">
    <div class="navbar-start">
      <a class="navbar-item">
        Inicio
      </a>

      <a class="navbar-item">
        Empresas
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Olá, Usuário
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Minha Conta
          </a>
          <a class="navbar-item">
            Meus Feedbacks
          </a>
          <a class="navbar-item">
            Sair
          </a>
        </div>
      </div>
    </div>
</nav>

  <div class="search">
    <div class="field has-addons">
      <div class="control is-expanded">
        <input class="input is-large" type="text" placeholder="Estou procurando por...">
      </div>
      <div class="control">
        <a class="button is-info is-large">
          <i class="fas fa-search"></i>
        </a>
      </div>
    </div>
  </div>

    <section class="container">
      <?php
      if(count($empresas)) {
      $i = 0;
      foreach($empresas as $Empresa) {
      $i++;
      ?>
      <?php if($i % 3 == 1) { ?>
      <div class="columns features">
      <?php } ?>
        <div class="column is-4">
          <div class="card">
            <div class="card-image has-text-centered">
              <figure class="image is-16by9">
                <img src="<?=$Empresa->image?>" alt="<?=$Empresa->name?>" class="img" data-target="modal-image2">
              </figure>
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <a class="text-name"><?=$Empresa->name?></a>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 3 == 0) { ?>
      </div>
      <?php } } } else { ?>
        <strong>Nenhum resultado retornado pela API</strong>
      <?php } ?>
    </section>

    <script src="https://kit.fontawesome.com/c4cf45b7a7.js" crossorigin="anonymous"></script>

  </body>
</html>