<div class="featured-posts__post">                   
    <a title="<?= $post['title'] ?>" href="/post?id=<?= $post['id'] ?>" class="featured-post__link post__link">
        <img class="featured-post__image" src="<?= $post['image_src'] ?>" alt="<?= $post['image_alt'] ?>">
        <div class="featured-post__item">                            
            <h3 class="featured-post__title"><?= $post['title'] ?></h3>
            <p class="featured-post__subtitle">
            <?= $post['subtitle'] ?>
            </p>
            <div class="post-info">
                <div class="post-info__author">
                    <img class="post-info__icon" src="<?= $post['author_avatar'] ?>" alt="<?= $post['author_name'] ?>">
                    <p class="post-info__author-name"><?= $post['author_name'] ?></p>
                </div>
                <p class="post-info__date"><?= $today = date("F j, Y", $post['post_date']); ?></p>
            </div>                                
        </div>
    </a>
    <?php if ($post['label']): ?>
        <div class="fake-button button">ADVENTURE</div>
    <?php endif; ?> 
</div>