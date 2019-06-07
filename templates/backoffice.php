<?php $this->title = "Admin"; ?>
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Yohann Durand </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"> </a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=Déconnexion">Déconnexion</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=addArticle">Articles</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=comment">Commentaires</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=rights">Droit</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=home">Retour au site</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<h1> Bienvenue dans votre espace d'aministration <br/>
    <?= $this->session->get('userFirst_name'); ?>  <?= $this->session->get('userLast_name'); ?> <br/> <br/> </h1>

<h2> Les stats de votre site :</h2>

<br/>
<br/>



<br/>

<div class="container">
    <section class="row">
        <div class="col-sm-4">

            <div class="icon-stats">  <i class="fas fa-scroll"></i>   </div>
                <div class="card-body">
                    <h5 class="card-title">Nombre d'article</h5>
                    <p class="card-text"><?= htmlspecialchars($numberArticle);?> </p>
                    <a href="../public/index.php?route=addArticle"
                    class="btn btn-primary">Voir la listes</a>
                </div>


        </div>

        <div class="col-sm-4">

            <div class="icon-stats"><i class="fas fa-chalkboard-teacher"></i> </div>
                <div class="card-body">
                    <h5 class="card-title">Commentaire vérifié</h5>
                    <p class="card-text"><?= htmlspecialchars($numberCommentVerified);?></p>
                    <a href="../public/index.php?route=comment"
                       class="btn btn-primary">Voir la listes</a>
                </div>


        </div>

        <div class="col-sm-4">

            <div class="icon-stats">  <i class="fas fa-chalkboard"></i>   </div>
                <div class="card-body">
                    <h5 class="card-title">Commentaire en attente</h5>
                    <p class="card-text"><?= htmlspecialchars($numberCommentNotVerified);?></p>
                    <a href="../public/index.php?route=comment"
                       class="btn btn-primary">Voir la listes</a>
                </div>


        </div>


    </section>

    <section class="row">


        <div class="col-sm-4">

            <div class="icon-stats">  <i class="far fa-user"></i>  </div>
                <div class="card-body">
                    <h5 class="card-title">NOMBRE DE MEMBRE</h5>
                    <p class="card-text"><?= htmlspecialchars($numberMembers);?></p>
                    <a href="../public/index.php?route=rights"
                       class="btn btn-primary">Voir la listes</a>

                </div>
        </div>


            <div class="col-sm-4">

                <div class="icon-stats">  <i class="fas fa-user"></i>  </div>
                    <div class="card-body">
                        <h5 class="card-title">NOMBRE D'ADMINISTRATEUR</h5>
                        <p class="card-text"><?= htmlspecialchars($numberAdmin);?></p>
                        <a href="../public/index.php?route=rights"
                           class="btn btn-primary">Voir la listes</a>
                    </div>


            </div>

    </section>





</div>

