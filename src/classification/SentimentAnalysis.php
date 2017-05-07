<?php
/**
 * User: Allan MacGregor <amacgregor@allanmacgregor.com>
 * Date: 2017-05-07
 * Time: 1:20 PM
 * Project: phpml-exercise
 */

namespace PhpmlExercise\Classification;

use Phpml\Classification\NaiveBayes;

/**
 * Class SentimentAnalysis
 * @package PhpmlExercise\Classification
 */
class SentimentAnalysis
{
    protected $classifier;

    public function __construct()
    {
        $this->classifier = new NaiveBayes();
    }
    public function train($samples, $labels)
    {
        $this->classifier->train($samples, $labels);
    }

    public function predict($samples)
    {
        return $this->classifier->predict($samples);
    }

}