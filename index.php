#!/usr/bin/php
<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$api = new Api;
$token = $api->getToken();
$posts = $api->getPosts($token);
$stat = new Stat($posts);

print json_encode($stat->getAll(), JSON_PRETTY_PRINT);
