<?php
$footer = [ 
    'footer_title' => 'Stay in Touch',   
    'logo_name' => 'Escape.',
    'link_home_name' => 'HOME',
    'link_categories_name' => 'CATEGORIES',
    'link_about_name' => 'ABOUT',
    'link_contact_name' => 'CONTACT',
    'footer_button_name' => 'Submit'
];
?>

<footer class="footer">
    <div class="container footer__feedback">
        <h3 class="footer__title"><?= $footer['footer_title'] ?></h3>
        <form class="footer__field">
            <input class="footer__email" type="email" placeholder="Enter your email address">
            <!-- <a class="footer__button" href="/"><?= $footer['footer_button_name'] ?></a> -->
            <button class="footer__button" type="submit" href="/"><?= $footer['footer_button_name'] ?></butto>
        </form>
    </div>
    <div class="footer__bar">    
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
    </div>
</footer>   
