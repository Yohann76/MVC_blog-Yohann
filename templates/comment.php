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

<?php $this->title = "Comment"; ?>
<h1>Gestion de vos commentaires </h1>



<h1>Liste de vos commentaires en attente</h1>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Contenu</th>
        <th scope="col">author</th>
        <th scope="col">Vérifier </th>
        <th scope="col">Supprimer </th>
        <th scope="col">mis en ligne le </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($listCommentNotVerified as $listCommentNotVerified)
    {
        ?>
        <tr>
            <th scope="row">   <?= htmlspecialchars($listCommentNotVerified->getContent());?>  </th>
            <td><?= htmlspecialchars($listCommentNotVerified->getPseudo());?></td>
            <td>  <a href="../public/index.php?route=verifiedComment&commentId=<?php echo htmlspecialchars($listCommentNotVerified->getId());?>" >
                    <button type="button" class="btn btn-outline-success">Vérifié</button></a></td>


            <td>  <a href="../public/index.php?route=deleteComment&commentId=<?php echo htmlspecialchars($listCommentNotVerified->getId());?>" >
                    <button type="button" class="btn btn-outline-danger">Supprimer</button></a></td>

            <td> <?= htmlspecialchars($listCommentNotVerified->getCreatedAt());?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<br/>
<br/>

<h1>Liste de vos commentaires vérifié sur le site : </h1>

<br/>
<br/>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Contenu</th>
        <th scope="col">author</th>
        <th scope="col">Supprimer </th>
        <th scope="col">mis en ligne le </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($listCommentVerified as $listCommentVerified)
    {
        ?>
        <tr>
            <th scope="row">   <?= htmlspecialchars($listCommentVerified->getContent());?>  </th>
            <td><?= htmlspecialchars($listCommentVerified->getPseudo());?></td>
            <td>  <a href="../public/index.php?route=deleteComment&commentId=<?php echo htmlspecialchars($listCommentVerified->getId());?>" >
                    <button type="button" class="btn btn-outline-danger">Supprimer</button></a></td>

            <td> <?= htmlspecialchars($listCommentVerified->getCreatedAt());?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
