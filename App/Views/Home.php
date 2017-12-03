<?php $title = "Billet pour l'Alaska"; ?>
<?php ob_start(); ?>
<main role="main">

     <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"> Billet pour l'Alaska</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Lire le dernier chapitre »</a></p>
        </div>
      </div>
      
      <div class="container">
        <h2> Les derniers chapitres </h2>
        <!-- Example row of columns -->
        <div class="row">
          <?php while($data= $Posts->fetch())
          {
            ?>
            <div class="col-md-12">
            <h3><?= $data['title'];?></h2>
            <p><?= $data['content']; ?></p>
            <p><a class="btn btn-secondary" href='?url=<?= $data["id"];?>' role="button"> Lire la suite... »</a></p>
          </div>
          <?php
          }
          ?>

      </div> 

</main>

<?php 
$content = ob_get_clean();
require 'Template.php'; ?>