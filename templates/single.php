<?php $this->title = "Article"; ?>

<h1>Liste des articles</h1>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p><?= htmlspecialchars($article->getChapo());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>
<br>


<!-- Formulaire pour commenter -->


<a href="../public/index.php">Retour à l'accueil</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <?php
    }
    ?>
</div>


<div>


</div>


<!-- Si une session est défini on propose de commenter : -->

<?php if (isset($_SESSION['user']) &&  ($_SESSION['user']) == 'admin' )  { ?>

    <h3> Vous pouvez egalement laisser un commentaire : </h3>

    <div>
        <form method="post" action="../public/index.php?route=addComment">

            <!-- Session userFirst_name -->

            <input type="hidden" name="pseudo" id="" value="<?= $this->session->get('userFirst_name'); ?>"  />


            <label for="content">Votre commentaire : </label><br>
            <textarea id="content" name="content"></textarea><br>

            <!-- Id article -->
            <input type="hidden" name="article_id" id="article_id" value="<?= htmlspecialchars($article->getId());?>"  />

            <!-- Session userId -->
            <input type="hidden" name="users_id" id="" value="<?= $this->session->get('userId'); ?>"  />

            <input type="submit" value="Envoyer" id="submit" class="btn btn-outline-success" name="submit">
        </form>
    </div>
<?php }


else { ?>
    <br/>
    <h4> Vous devez etre connecter pour commentez ! <br/>
    <a href="../public/index.php?route=connection">m'inscrire maintenant</a></h4>
<?php }?>





