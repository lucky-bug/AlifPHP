<?php

require "vendor/autoload.php";

use Ibrokhim\AlifPhp\Services\AlifService;
use Ibrokhim\AlifPhp\Services\FileIOService;

$alifService = new AlifService(new FileIOService());

$alifService->solve($argv[1], $argv[2], "positive_results.txt", "negative_results.txt");
