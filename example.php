<?php
require __DIR__ . '/vendor/autoload.php';

use Chrisguitarguy\Example\PdoSta;

$dbh = new \PDO(sprintf(
    'mysql:host=%s;dbname=%s',
    getenv('DB_HOST') ?: 'localhost',
    getenv('DB_NAME') ?: 'pdo_polymorph'
), getenv('DB_USER') ?: 'root', getenv('DB_PASSWORD') ?: '');

$repo = new PdoSta\PdoMathRepository($dbh);

$repo->insert(new PdoSta\Subtraction(10));
$repo->insert(new PdoSta\Addition(10));
$repo->insert(new PdoSta\Multiplication(10));
$repo->insert(new PdoSta\Division(10));

foreach ($repo->all() as $math) {
    echo get_class($math), ': ', $math->operate(10), PHP_EOL;
}
