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

<h3> nombre de d'article : <?= htmlspecialchars($numberArticle);?>  </h3>
<h3> nombre de commentaire Vérifier : <?= htmlspecialchars($numberCommentVerified);?> </h3>
<h3> nombre de commentaire en attente : <?= htmlspecialchars($numberCommentNotVerified);?> </h3>
<h3> nombre de membre : <?= htmlspecialchars($numberMembers);?> </h3>
<h3> nombre d'administrateur : <?= htmlspecialchars($numberAdmin);?>  </h3>








