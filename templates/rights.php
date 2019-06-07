<?php $this->title = "Droits"; ?>
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

<h1>Gestion des droits </h1>

<h2>Administrateurs </h2>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">mail</th>
        <th scope="col">définir comme  </th>
        <th scope="col">role </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($admin as $admin)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($admin->getFirstName());?></td>
            <td><?= htmlspecialchars($admin->getLastName());?></td>
            <td><?= htmlspecialchars($admin->getEmail());?></td>
            <td>
                <a href="../public/index.php?route=adminChangeUser&userId=<?php echo htmlspecialchars($admin->getId());?>" >  <button type="button"  id="user" class="btn btn-outline-danger">Utilisateur</button></a>
            </td>
            <th><?= htmlspecialchars($admin->getRole());?> </th>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<!-- ----------------- -->

<h2>Utilisateurs </h2>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">mail</th>
        <th scope="col">définir comme  </th>
        <th scope="col">role </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($members as $members)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($members->getFirstName());?></td>
            <td><?= htmlspecialchars($members->getLastName());?></td>
            <td><?= htmlspecialchars($members->getEmail());?></td>
            <td>
                <a href="../public/index.php?route=userChangeAdmin&userId=<?php echo htmlspecialchars($members->getId());?>" >  <button type="button"  id="admin" class="btn btn-outline-danger">Administrateur</button></a>
            </td>
            <th><?= htmlspecialchars($members->getRole());?> </th>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>



