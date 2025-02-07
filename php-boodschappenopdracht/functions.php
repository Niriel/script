<?php
function var_dump_p($var, $prefix='var_dump') {
    echo '<p><b>'.$prefix.'</b>: ';
    var_dump($var);
    echo '</p>';
}

function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function getPath() {
    return parse_url($_SERVER['REQUEST_URI'])['path'];
}

function pathIs($path) {
    return getPath() === $path;
}

function highlightForPath($path) {
    if (pathIs($path)) {
        return 'highlight';
    } else {
        return '';
    }
}
?>
