<?php
function urlIs($url) {
    return $_SERVER['REQUEST_URI'] == $url;
}

function highlighIfUrlIs($url) {
    if (urlIs($url)) {
        return 'highlight';
    } else {
        return '';
    }
}
?>

<nav>
    <ul class="navItems">
        <li class="navItem <?= highlighIfUrlIs('/') ?>"><a href="/">Lijst</a></li>
        <li class="navItem <?= highlighIfUrlIs('/controllers/create.php') ?>"><a href="/controllers/create.php">Toevoegen</a></li>
    </ul>
</nav>
