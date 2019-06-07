<?php $this->title = "Article"; ?>

<h2> La liste de vos articles !  </h2>

<!-- -------- -->
<?php
foreach ($articles as $article)
{
?>

<div class="jumbotron">
    <div class="container">
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"
               role="button">En savoir plus  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
    </div>
</div>
    <?php
}
?>

<!-- pagination -->
<nav aria-label="pagination">
    <ul class="pagination">
        <h6> Page </h6>
        <?php
        for($i=1;$i<=ceil($nbArticleTotal/3);$i++)
        {
            $affichage = ceil($i);
            if ($affichage == $pageCourante)
            {
                echo '<li class="green" class="page-item"><a class="page-link" href="../public/index.php?route=displayBlog&page=' . ceil($i) . '">' . $affichage . '</a></li>';
            }
            else {
                echo '<li class="page-item"><a class="page-link" href="../public/index.php?route=displayBlog&page=' . ceil($i) . '">' . $affichage . '</a></li>';
            }
        }
        ?>
    </ul>
</nav>
