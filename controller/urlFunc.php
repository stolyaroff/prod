<?php
function urlPath(){
    $url = ltrim((parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
    return $url;
}