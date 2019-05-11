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

<?php $this->title = "Nouvel article"; ?>
<h1>modifier  un article</h1>


<!-- Récupérer les information d'un chapitre ici et les mettre dedans  -->

<div>
    <form method="post" action="../public/index.php?route=mooveArticle"

        <label for="title">Titre </label><br>
        <input value="<?= htmlspecialchars($article->getTitle());?>" type="text" id="title" name="title">     <br>

        <label for="content">Contenu</label>      <br>
        <textarea  id="content" name="content"><?= htmlspecialchars($article->getContent());?></textarea>    <br>


        <label for="content">Chapo</label>      <br>
        <textarea  id="chapo" name="chapo"><?= htmlspecialchars($article->getChapo());?></textarea>    <br>

        <label for="author">Auteur</label><br>
        <input value="<?= htmlspecialchars($article->getAuthor());?>" type="text" id="author" name="author">      <br>

        <input type="hidden" name="id" id="" value=" <?= htmlspecialchars($article->getId());?>  "  />

        <input type="submit" value="Envoyer" id="submitMooveArt" class="btn btn-outline-success" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>






