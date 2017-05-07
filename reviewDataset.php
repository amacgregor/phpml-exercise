<?php
namespace PhpmlExercise;

require __DIR__ . '/vendor/autoload.php';

use Phpml\Dataset\CsvDataset;

$dataset = new CsvDataset('datasets/clean_tweets.csv',1);

foreach ($dataset->getSamples() as $sample) {
    print_r($sample);
}

foreach ($dataset->getTargets() as $target) {
    print_r($target);
}