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
                    <a href="../public/index.php?route=addArticle">Ajouter un article</a>
                </li>
                <li class="page-scroll">
                    <a href="../public/index.php?route=removeArticle">Modifier un article</a>
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
            <td>Button modifier</td>
            <td>bouton suprimer</td>
            <td> <?= htmlspecialchars($article->getCreatedAt());?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
