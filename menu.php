<?php
    $link = [
        'link_nature_name' => 'Nature',
        'link_photography_name' => 'Photography',
        'link_relaxation_name' => 'Relaxation',
        'link_vacation_name' => 'Vacation',
        'link_travel_name' => 'Travel',
        'link_adventure_name' => 'Adventure',
    ];
?>

<nav class="menu">
    <ul class="menu__list container">
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_nature_name'] ?></a></li>
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_photography_name'] ?></a></li>
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_relaxation_name'] ?></a></li>
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_vacation_name'] ?></a></li>
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_travel_name'] ?></a></li>
        <li class="menu__item"><a class="menu__link" href="/"><?= $link['link_adventure_name'] ?></a></li>
    </ul>
</nav>