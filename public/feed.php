<?php

require __DIR__ . '/../vendor/autoload.php';

$limit = getenv('FEED_LIMIT');
$collector = new \App\Collector();

echo json_encode($collector->fetch($limit));
