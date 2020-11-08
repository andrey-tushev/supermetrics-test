#!/usr/bin/php
<?php
/*
 * Main entry point
 */
declare(strict_types=1);

require 'autoload.php';

try {
    $source = new PostsSourceApi();
    // Another posts source may be used for tests and development
    // $source = new PostsSourceTest();
    $stat = new Stat($source);
    print json_encode($stat->getAll(), JSON_PRETTY_PRINT);
}
catch(NetworkException $ex) {
    print "Network problem: ".$ex->getMessage()."\n";
}
catch(ApiException $ex) {
    print "Api problem: ".$ex->getMessage()."\n";
}
