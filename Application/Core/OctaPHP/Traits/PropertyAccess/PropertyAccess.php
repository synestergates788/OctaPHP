<?php
namespace OctaPHP\Traits\PropertyAccess;

/**
 * Initialize PropertyAccess class.
 * Entry point of the PropertyAccess component.
 */
use Symfony\Component\PropertyAccess\PropertyAccess as OctaPropertyAccess;

trait PropertyAccess {

    /**
     * integrating property access of symfony.
     * @return OctaPropertyAccess::createPropertyAccessor class
     * @author Bernhard Schussek <bschussek@gmail.com>
     */
    public function propertyAccessor() {
        return OctaPropertyAccess::createPropertyAccessor();
    }

    /**
     * integrating property access builder of symfony.
     * @return OctaPropertyAccess::createPropertyAccessorBuilder class
     * @author Bernhard Schussek <bschussek@gmail.com>
     */
    public function propertyAccessorBuilder() {
        return OctaPropertyAccess::createPropertyAccessorBuilder();
    }
}