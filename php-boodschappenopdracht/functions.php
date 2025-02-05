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