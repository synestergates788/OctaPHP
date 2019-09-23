<?php
namespace OctaPHP\Traits\Encoder;

/**
 * ##########################
 * ###START OF ENCODER##
 * ##########################
 *
 * Initialize JsonEncoder class.
 * Encodes JSON data.
 */
use Symfony\Component\Serializer\Encoder\JsonEncoder as OctaJsonEncoder;

/**
 * Initialize XmlEncoder class.
 * Encodes XML data.
 */
use Symfony\Component\Serializer\Encoder\XmlEncoder as OctaXmlEncoder;

/**
 * Initialize YamlEncoder class,
 * Encodes YAML data.
 */
use Symfony\Component\Serializer\Encoder\YamlEncoder as OctaYamlEncoder;

/**
 * Initialize CsvEncoder class.
 * Encodes CSV data.
 */
use Symfony\Component\Serializer\Encoder\CsvEncoder as OctaCsvEncoder;

trait Encoder{

    /**
     * integrating serializer (json encoder).
     * @param null $encodingImpl
     * @param null $decodingImpl
     * @return OctaJsonEncoder class
     * @author Jordi Boggiano <j.boggiano@seld.be>
     */
    public function jsonEncoder($encodingImpl = null, $decodingImpl = null){
        return new OctaJsonEncoder($encodingImpl, $decodingImpl);
    }

    /**
     * integrating serializer (xml encoder).
     * @param array $defaultContext
     * @param null $loadOptions
     * @param array $decoderIgnoredNodeTypes
     * @param array $encoderIgnoredNodeTypes
     * @return OctaXmlEncoder class
     * @author Jordi Boggiano <j.boggiano@seld.be>
     * @author John Wards <jwards@whiteoctober.co.uk>
     * @author Fabian Vogler <fabian@equivalence.ch>
     * @author Kévin Dunglas <dunglas@gmail.com>
     * @author Dany Maillard <danymaillard93b@gmail.com>
     */
    public function xmlEncoder($defaultContext = [], $loadOptions = null, array $decoderIgnoredNodeTypes = [XML_PI_NODE, XML_COMMENT_NODE], array $encoderIgnoredNodeTypes = []){
        return new OctaXmlEncoder($defaultContext, $loadOptions, $decoderIgnoredNodeTypes, $encoderIgnoredNodeTypes);
    }

    /**
     * integrating serializer (yaml encoder).
     * @param null $dumper
     * @param null $parser
     * @param array $defaultContext
     * @return OctaYamlEncoder class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function yamlEncoder($dumper = null, $parser = null, array $defaultContext = []){
        return new OctaYamlEncoder($dumper, $parser, $defaultContext);
    }

    /**
     * integrating serializer (csv encoder).
     * @param array $defaultContext
     * @param string $enclosure
     * @param string $escapeChar
     * @param string $keySeparator
     * @param boolean $escapeFormulas
     * @return OctaCsvEncoder class
     * @author Kévin Dunglas <dunglas@gmail.com>
     * @author Oliver Hoff <oliver@hofff.com>
     */
    public function csvEncoder($defaultContext = [], $enclosure = '"', $escapeChar = '\\', $keySeparator = '.', $escapeFormulas = false){
        return new OctaCsvEncoder($defaultContext, $enclosure, $escapeChar, $keySeparator, $escapeFormulas);
    }
}