<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
      .error {
        color: #f00;
      }
    </style>
    <title><?php echo $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
        <?php if($this->session->userdata('username') == ''): ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url().'main/login'; ?>">Se connecter</a>
          </li>
        <?php endif ?>
        <?php if($this->session->userdata('username') != ''): ?>
          <li class="nav-item active">
            <a class="nav-link active" href="<?php echo site_url('crud/data') ?>">Liste des produits</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="<?php echo site_url('crud/add') ?>">Ajouter un produit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url().'main/logout'; ?>">Se déconnecter</a>
          </li>
        <?php endif ?>
        </ul>
      </div>
    </nav>
    <div class="container" style="margin-top:50px">