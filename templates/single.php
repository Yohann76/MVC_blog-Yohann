<?php $this->title = "Article"; ?>

<h1>Article</h1>

<div class="jumbotron">
    <h1 class="display-4"><span> <?= htmlspecialchars($article->getTitle());?> </span></h1>
    <p> <?= htmlspecialchars($article->getChapo());?> </p>
    <p class="lead"><?= htmlspecialchars($article->getContent());?></p>
    <br/>
    <hr class="my-4">
    <p>Le <?=htmlspecialchars($article->getCreatedAt());?>  Par <?= htmlspecialchars($article->getAuthor());?></p>

    <p>  <a href="../public/index.php?route=displayBlog&page=1">Retour au blog <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
    <br/>
    <hr class="my-4">
    <h2>Commentaires :</h2>

    <?php
    foreach ($comments as $comment)
    {
        ?>
        <p><span> <?= htmlspecialchars($comment->getPseudo());?> </span> :
        <?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <hr class="my-4">
        <?php
    }
    ?>

    <!-- Si une session est défini on propose un commentaire : -->
    <?php if ($this->session->get('user')  )  { ?>

        <h3> Vous pouvez egalement laisser un commentaire : </h3>
        <div id="formCom">
            <!-- Formulaire pour commenter -->
            <form method="post" action="../public/index.php?route=addComment">
                <!-- Session userFirst_name -->
                <input type="hidden" name="pseudo" id="" value="<?= $this->session->get('userFirst_name'); ?>"  />

                <label for="content">Votre commentaire : </label><br>
                <textarea id="content-textarea" name="content"  >  </textarea><br>
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
        <div id="connectCom">
        <h4> Vous devez etre connecter pour commentez ! <br/>
            <a href="../public/index.php?route=connection">m'inscrire maintenant</a></h4>
        </div>
    <?php }?>


</div>











