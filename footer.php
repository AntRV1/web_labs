<?php
$footer = [
    'logo_name' => 'Escape.',
    'link_home_name' => 'HOME',
    'link_categories_name' => 'CATEGORIES',
    'link_about_name' => 'ABOUT',
    'link_contact_name' => 'CONTACT',
];
?>

<footer class="footer">
    <div class="container running-title">
        <a class="logo logo_light" href="/home"><?= $footer['logo_name'] ?></a>
        <nav class="navigation">
            <ul class="navigation__list">
                <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/home"><?= $footer['link_home_name'] ?></a></li>
                <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/"><?= $footer['link_categories_name'] ?></a></li>
                <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/"><?= $footer['link_about_name'] ?></a></li>
                <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/"><?= $footer['link_contact_name'] ?></a></li>
            </ul>
        </nav>
    </div>
</footer>   
