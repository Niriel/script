<?php
function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function getPath() {
    return parse_url($_SERVER['REQUEST_URI'])['path'];
}

function pathIs($path) {
    return getPath() === $path;
}

function highlighForPath($path) {
    if (pathIs($path)) {
        return 'highlight';
    } else {
        return '';
    }
}
?>