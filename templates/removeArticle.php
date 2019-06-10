<?php $this->title = "Modification"; ?>
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Yohann Durand </a>
        </div>
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

<h1>modifier  un article</h1>

<div id="addArticle">
    <form method="post" action="../public/index.php?route=mooveArticle">

    <h4><span><label for="title">Titre</label><br></span></h4>
        <input value="<?= htmlspecialchars($article->getTitle());?>" type="text" id="contentArticle" name="title">     <br>

    <h4><span><label for="content">Contenu</label><br></span></h4>
        <textarea  id="contentMooveArticle" name="content"><?= htmlspecialchars($article->getContent());?></textarea>    <br>


    <h4><span><label for="content">Chapô</label><br></span></h4>
        <textarea  id="contentMooveArticle" name="chapo"><?= htmlspecialchars($article->getChapo());?></textarea>    <br>

    <h4><span>   <label for="author">Auteur</label><br></span></h4>
        <input value="<?= htmlspecialchars($article->getAuthor());?>" type="text" id="contentArticle" name="author">      <br>

        <input type="hidden" name="id" id="" value=" <?= htmlspecialchars($article->getId());?>  "  />

        <input type="submit" value="Envoyer" id="submitMooveArt" class="btn btn-outline-success" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>






