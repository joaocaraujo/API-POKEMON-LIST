<?php
$url = "https://www.canalti.com.br/api/pokemons.json"; 
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$pokemons = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <title>Pokemóns</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="canalti.css">
  </head>
  <body>
    <section id="title" class="hero is-info is-small">
      <div class="hero-body">
        <div class="container has-text-centered">
          <p class="title">
            PokeList
          </p>
          <p class="subtitle">
           Conheça alguns pokemons, seus tipos e evoluções!
          </p>
        </div>
      </div>
    </section>
    <div class="box cta">
      <p class="has-text-centered">
       <span id = "first" class="tag is-danger">Primeira geração</span>
      </p>
    </div>
    <section class="container">
      <?php
      if(count($pokemons->pokemon)) {
      $i = 0;
      foreach($pokemons->pokemon as $Pokemon) {
      $i++;
      ?>
      <?php if($i % 3 == 1) { ?>
      <div class="columns features">
      <?php } ?>
        <div class="column is-4">
          <div class="card">
            <div class="card-image has-text-centered">
              <figure class="image is-128x128">
                <img src="<?=$Pokemon->img?>" alt="<?=$Pokemon->name?>" class="" data-target="modal-image2">
              </figure>
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?=$Pokemon->name?></h4>
                <p>
                  <ul>
                  <?php
        if (empty($Pokemon->next_evolution)) {
          echo "Não possui próximas evoluções ";
        }
        else {
          echo "Próximas evoluções: ";
            foreach($Pokemon->next_evolution as $ProximaEvolucao) {
              echo $ProximaEvolucao->name . " ";
        }
      }  
                ?>
                </ul>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 3 == 0) { ?>
      </div>
      <?php } } } else { ?>
        <strong>Nenhum pokemón retornado pela API</strong>
      <?php } ?>
    </section>
  </body>
  <div class="footer">
    <p>Developed by João Luiz Araujo</p>
</div>
</html>