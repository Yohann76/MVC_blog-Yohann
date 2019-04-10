<?php $this->title = "Article"; ?>

<h2> Blog </h2>




<!-- -------- -->
<?php
foreach ($articles as $article)
{
?>

<div class="jumbotron">
    <div class="container">
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p><a class="btn btn-info btn-lg" role="button">En savoir plus  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
    </div>
</div>
    <?php
}
?>