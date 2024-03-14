<div class="article">
    <a class="article__link post__link" href="<?= $article['link'] ?>">
        <img class="article__img" src="<?= $article['article_image_src'] ?>" alt="<?= $article['article_image-alt'] ?>">
        <div class="article__name">
            <h3 class="article__title"><?= $article['article_title'] ?></h3>
            <p class="article__subtitle"><?= $article['article_subtitle'] ?></p>
        </div>
    </a>
    <div class="article__info">
        <div class="article__author">
            <img class="article__icon" src="<?= $article['article_author-avatar'] ?>" alt="<?= $article['article_author-name'] ?>">
            <p class="article__author-name"><?= $article['article_author-name'] ?></p>
        </div>
        <p class="article_date"><?= $article['article_date'] ?></p>
    </div>
</div>