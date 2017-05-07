<?php
/**
 * User: Allan MacGregor <amacgregor@allanmacgregor.com>
 * Date: 2017-05-07
 * Time: 12:08 PM
 * Project: phpml-exercise
 */

namespace PhpmlExercise;

require __DIR__ . '/vendor/autoload.php';

use Phpml\Exception\FileException;

$sourceFilepath         = __DIR__ . '/datasets/raw/Tweets.csv';
$destinationFilepath    = __DIR__ . '/datasets/clean_tweets.csv';

$rows =[];

$rows = getRows($sourceFilepath, $rows);
writeRows($destinationFilepath, $rows);


/**
 * @param $filepath
 * @param $rows
 * @return array
 */
function getRows($filepath, $rows)
{
    $handle = checkFilePermissions($filepath);

    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $rows[] = [$data[10], $data[1]];
    }
    fclose($handle);
    return $rows;
}

/**
 * @param $filepath
 * @param string $mode
 * @return bool|resource
 * @throws FileException
 */
function checkFilePermissions($filepath, $mode = 'rb')
{
    if (!file_exists($filepath)) {
        throw FileException::missingFile(basename($filepath));
    }

    if (false === $handle = fopen($filepath, $mode)) {
        throw FileException::cantOpenFile(basename($filepath));
    }
    return $handle;
}

/**
 * @param $filepath
 * @param $rows
 * @internal param $list
 */
function writeRows($filepath, $rows)
{
    $handle = checkFilePermissions($filepath, 'wb');

    foreach ($rows as $row) {
        fputcsv($handle, $row);
    }

    fclose($handle);
}


