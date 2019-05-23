<?php $this->title = "Nouvel article"; ?>
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


<h1>Ajouter un article</h1>

<div id="addArticle">
    <form method="post" action="../public/index.php?route=addArticle">
        <h4><span><label for="title">Titre</label><br></span> </h4>
        <input type="text" id="contentArticle" name="title"><br>

        <h4><span><label for="content">Chapo</label><br></span></h4>
        <textarea id="contentAddArticle" name="chapo"></textarea><br>

        <h4><span><label for="content">Contenu</label><br></span></h4>
        <textarea id="contentAddArticle" name="content"></textarea><br>

        <h4><span><label for="author">Auteur</label><br></span></h4>
        <input type="text" id="contentArticle" name="author"><br/><br/>

        <input type="submit" value="Envoyer" id="submitAddArticle" class="btn btn-outline-success" name="submit">
    </form>
    <br/>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>


<h1>Liste de vos articles </h1>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Modifer</th>
        <th scope="col">Supprimer </th>
        <th scope="col">mis en ligne le </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <th scope="row"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></th>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>
                <a  href="../public/index.php?route=removeArticle&articleId=<?php echo htmlspecialchars($article->getId());?>" >  <button type="button"   class="btn btn-outline-warning">Modifier</button></a>
            </td>
            <td>
                <a href="../public/index.php?route=deleteArticle&articleId=<?php echo htmlspecialchars($article->getId());?>" >  <button type="button" id="deleteArt" class="btn btn-outline-danger">Supprimer</button></a>
            </td>

            <td> <?= htmlspecialchars($article->getCreatedAt());?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>