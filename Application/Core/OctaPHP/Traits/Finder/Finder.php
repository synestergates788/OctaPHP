<?php
namespace OctaPHP\Traits\Finder;

/**
 * Initialize Finder class,
 * Finder allows to build rules to find files and directories.
 */
use Symfony\Component\Finder\Finder as OctaFinder;

trait Finder {

    /**
     * integrating finder component of symfony.
     *
     * @return OctaFinder class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function finder() {
        return new OctaFinder();
    }
}