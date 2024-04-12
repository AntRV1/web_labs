
<div class="article">
    <a class="article__link post__link" title="<?= $post['title'] ?>" href="/post?id=<?= $post['id'] ?>">
        <img class="article__img" src="<?= $post['image_src'] ?>" alt="<?= $post['image-alt'] ?>">
        <div class="article__name">
            <h3 class="article__title"><?= $post['title'] ?></h3>
            <p class="article__subtitle"><?= $post['subtitle'] ?></p>
        </div>
    </a>
    <div class="article__info">
        <div class="article__author">
            <img class="article__icon" src="<?= $post['author_avatar'] ?>" alt="<?= $post['author_name'] ?>">
            <p class="article__author-name"><?= $post['author_name'] ?></p>
        </div>
        <p class="article_date"><?= $today = date("n/j/Y", $post['publish_date']) ?></p>
    </div>
</div>