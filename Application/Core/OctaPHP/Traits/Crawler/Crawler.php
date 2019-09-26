<?php
namespace OctaPHP\Traits\Crawler;

/**
 * Initialize Crawler class.
 * Crawler eases navigation of a list of \DOMNode objects.
 */
use Symfony\Component\DomCrawler\Crawler as OctaCrawler;

trait Crawler {

    /**
     * integrating dom crawler of symfony.
     *
     * @param mixed  $node     A Node to use as the base for the crawling
     * @param string $uri      The current URI
     * @param string $baseHref The base href value
     * @return OctaCrawler class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function domCrawler($node = null, $uri = null, $baseHref = null) {
        return new OctaCrawler($node, $uri, $baseHref);
    }
}