<?php

// bootstrap the application
$config = require __DIR__.'/../bootstrap/application.php';

use App\ContentReceiver;
use App\Parser;

$url = $_GET['url'] ?? $config->get('default_url');
$contentType = $_GET['type'] ?? $config->get('default_content_type');

$content = ContentReceiver::fromUrl($url);

$elements = Parser::factory($content, $contentType)->elements();

require APP_DIR.'/views/elements.php';
