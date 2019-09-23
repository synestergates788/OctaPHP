<?php
namespace OctaPHP\Traits\Stopwatch;

/**
 * Initialize Stopwatch class.
 * Stopwatch provides a way to profile code.
 */
use Symfony\Component\Stopwatch\Stopwatch as OctaStopwatch;

trait Stopwatch{

    /**
     * integrating stopwatch component of symfony.
     *
     * @return OctaStopwatch class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function stopWatch(){
        return new OctaStopwatch();
    }
}