<?php
/**
 * Created by PhpStorm.
 * User: hotovec
 * Date: 18.10.2017
 * Time: 21:38
 */

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$latte_temp_dir = __DIR__ . '/.tmp';
$template = 'index.latte';
$data = null;

// check GET Template parameter
if (isset($_GET['t'])) {
    if (file_exists(__DIR__ . '/../templates/' . $_GET['t'] . '.latte')) {
        $template = $_GET['t'] . '.latte';
    } else {
        echo 'Err: [' . $_GET['t'] . '.latte] not exist! Using default';
    }
}

// get yaml configs
try {
    $data = Yaml::parse(file_get_contents(__DIR__ . '/../data/data.yml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}

$latte = new Latte\Engine;
$latte->setTempDirectory($latte_temp_dir);
$latte->render('../templates/' . $template, $data);
