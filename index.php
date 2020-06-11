<?php



use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

ini_set('memory_limit', '1024M');
ini_set('post_max_size', '25M');
ini_set('upload_max_filesize', '25M');
require __DIR__ . '/vendor/autoload.php';


$app = require_once __DIR__ . '/bootstrap/app.php';


$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);


$response->send();

$kernel->terminate($request, $response);


