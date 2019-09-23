<?php
namespace OctaPHP\Traits\CssSelector;

/**
 * Initialize CssSelectorConverter class.
 * CssSelectorConverter is the main entry point of the component and can convert CSS
 * selectors to XPath expressions.
 */
use Symfony\Component\CssSelector\CssSelectorConverter as OctaCssSelectorConverter;

trait CssSelector{
    /**
     * integrating css selector component of symfony.
     * @param bool $html Whether HTML support should be enabled. Disable it for XML documents
     * @return OctaCssSelectorConverter class
     * @author Christophe Coevoet <stof@notk.org>
     */
    public function cssSelector($html = true){
        return new OctaCssSelectorConverter($html);
    }
}