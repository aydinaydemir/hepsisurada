<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('hepsisurada-4ba3d-firebase-adminsdk-pt8pf-dac608e95e.json')
    ->withDatabaseUri('https://hepsisurada-4ba3d-default-rtdb.europe-west1.firebasedatabase.app/');

$database = $factory->createDatabase();
?>