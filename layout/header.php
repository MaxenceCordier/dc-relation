<?php require_once __DIR__ . '/../security.php'; ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC-Relation - <?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/initialize.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>
<body>

    <header>

    <nav class="navbar navbar-expand-lg bg-dark p-4 bg-navbar">
  <a class="navbar-brand" href="<?php echo SITE_URL; ?>index.php"><img src="<?php echo SITE_URL; ?>images/DC-relation.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text.light" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link nav-title" href="etudiants.php">ESPACE ETUDIANTS</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-title" href="entreprises.php">ESPACE ENTREPRISE</a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            <a href="#"><h1>ESPACE ÉTUDIANTS</h1></a>
        </div>
        <div class="col-sm-4">
        <img src="images/DC-relation.png" alt="logo">
        </div>
        <div class="col-sm-4">
            <a href="#"><h1>ESPACE ENTREPRISES</h1></a>
        </div>
        </div>
    </div>

    </header>

    <main>
