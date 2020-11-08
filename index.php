#!/usr/bin/php
<?php
declare(strict_types=1);

require 'autoload.php';

$source = new PostsSourceApi();
// Another posts source may be used for tests and development
// $source = new PostsSourceTest();
$stat = new Stat($source);
print json_encode($stat->getAll(), JSON_PRETTY_PRINT);
