<?php
namespace OctaPHP\Traits\Serializer;

/**
 * ##########################################
 * ###START OF HTTP SERIALIZER/DENORMALIZER##
 * ##########################################
 *
 * Initialize ObjectNormalizer class.
 * Converts between objects and arrays using the PropertyAccess component.
 */
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer as OctaObjectNormalizer;

/**
 * Initialize GetSetMethodNormalizer class.
 * Converts between objects with getter and setter methods and arrays.
 *
 * The normalization process looks at all public methods and calls the ones
 * which have a name starting with get and take no parameters. The result is a
 * map from property names (method name stripped of the get prefix and converted
 * to lower case) to property values. Property values are normalized through the
 * serializer.
 *
 * The denormalization first looks at the constructor of the given class to see
 * if any of the parameters have the same name as one of the properties. The
 * constructor is then called with all parameters or an exception is thrown if
 * any required parameters were not present as properties. Then the denormalizer
 * walks through the given map of property names to property values to see if a
 * setter method exists for any of the properties. If a setter exists it is
 * called with the property value. No automatic denormalization of the value
 * takes place.
 */
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer as OctaGetSetMethodNormalizer;

/**
 * Initialize PropertyNormalizer class.
 * Converts between objects and arrays by mapping properties.
 *
 * The normalization process looks for all the object's properties (public and private).
 * The result is a map from property names to property values. Property values
 * are normalized through the serializer.
 *
 * The denormalization first looks at the constructor of the given class to see
 * if any of the parameters have the same name as one of the properties. The
 * constructor is then called with all parameters or an exception is thrown if
 * any required parameters were not present as properties. Then the denormalizer
 * walks through the given map of property names to property values to see if a
 * property with the corresponding name exists. If found, the property gets the value.
 */
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer as OctaPropertyNormalizer;

/**
 * Initialize JsonSerializableNormalizer class.
 * A normalizer that uses an objects own JsonSerializable implementation.
 */
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer as OctaJsonSerializableNormalizer;

/**
 * Initialize DateTimeNormalizer class.
 * Normalizes an object implementing the {@see \DateTimeInterface} to a date string.
 * Denormalizes a date string to an instance of {@see \DateTime} or {@see \DateTimeImmutable}.
 */
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer as OctaDateTimeNormalizer;

/**
 * Initialize DataUriNormalizer class.
 * Normalizes an {@see \SplFileInfo} object to a data URI.
 * Denormalizes a data URI to a {@see \SplFileObject} object.
 */
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer as OctaDataUriNormalizer;

/**
 * Initialize DateIntervalNormalizer class.
 * Normalizes an instance of {@see \DateInterval} to an interval string.
 * Denormalizes an interval string to an instance of {@see \DateInterval}.
 */
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer as OctaDateIntervalNormalizer;

/**
 * Initialize ConstraintViolationListNormalizer class.
 * A normalizer that normalizes a ConstraintViolationListInterface instance.
 *
 * This Normalizer implements RFC7807 {@link https://tools.ietf.org/html/rfc7807}.
 */
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer as OctaConstraintViolationListNormalizer;

/**
 * Initialize ArrayDenormalizer class.
 * Denormalizes arrays of objects.
 */
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer as OctaArrayDenormalizer;

/**
 * Initialize Serializer class.
 * Serializer serializes and deserializes data.
 *
 * objects are turned into arrays by normalizers.
 * arrays are turned into various output formats by encoders.
 *
 *     $serializer->serialize($obj, 'xml')
 *     $serializer->decode($data, 'xml')
 *     $serializer->denormalize($data, 'Class', 'xml')
 */
use Symfony\Component\Serializer\Serializer as OctaSerializer;

/**
 * Initialize AnnotationLoader class.
 * Annotation loader.
 */
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader as OctaAnnotationLoader;

/**
 * Initialize AnnotationReader class.
 * A reader for docblock annotations.
 */
use Doctrine\Common\Annotations\AnnotationReader as OctaAnnotationReader;

/**
 * Initialize ClassMetadataFactory class.
 * Returns a {@link ClassMetadata}.
 */
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory as OctaClassMetadataFactory;

/**
 * Initialize YamlFileLoader class.
 * YAML File Loader.
 */
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader as OctaYamlFileLoader;

/**
 * Initialize XmlFileLoader class.
 * Loads XML mapping files.
 */
use Symfony\Component\Serializer\Mapping\Loader\XmlFileLoader as OctaXmlFileLoader;

/**
 * Initialize CamelCaseToSnakeCaseNameConverter class.
 * CamelCase to Underscore name converter.
 */
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter as OctaCamelCaseToSnakeCaseNameConverter;

/**
 * Initialize MetadataAwareNameConverter class.
 */
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter as OctaMetadataAwareNameConverter;

/**
 * Initialize DiscriminatorMap class.
 * Annotation class for @DiscriminatorMap().
 *
 * @Annotation
 * @Target({"CLASS"})
 */
use Symfony\Component\Serializer\Annotation\DiscriminatorMap as OctaDiscriminatorMap;

/**
 * Initialize Groups class.
 * Annotation class for @Groups().
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD"})
 */
use Symfony\Component\Serializer\Annotation\Groups as OctaGroups;

/**
 * Initialize MaxDepth class.
 * Annotation class for @MaxDepth().
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD"})
 */
use Symfony\Component\Serializer\Annotation\MaxDepth as OctaMaxDepth;

/**
 * Initialize SerializedName class.
 * Annotation class for @SerializedName().
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD"})
 */
use Symfony\Component\Serializer\Annotation\SerializedName as OctaSerializedName;

trait Serializer{

    /**
     * integrating serializer component of symfony.
     * @param array $normalizers
     * @param array $encoders
     * @return OctaSerializer class
     * @author Jordi Boggiano <j.boggiano@seld.be>
     * @author Johannes M. Schmitt <schmittjoh@gmail.com>
     * @author Lukas Kahwe Smith <smith@pooteeweet.org>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function serializer(array $normalizers = [], array $encoders = []){
        return new OctaSerializer($normalizers, $encoders);
    }

    /**
     * integrating serializer (object normalizer).
     *
     * @param null $classMetadataFactory
     * @param null $nameConverter
     * @param null $propertyAccessor
     * @param null $propertyTypeExtractor
     * @param null $classDiscriminatorResolver
     * @param callable $objectClassResolver
     * @param array $defaultContext
     * @return OctaObjectNormalizer class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function objectNormalizer($classMetadataFactory = null, $nameConverter = null, $propertyAccessor = null, $propertyTypeExtractor = null, $classDiscriminatorResolver = null, callable $objectClassResolver = null, array $defaultContext = []){
        return new OctaObjectNormalizer($classMetadataFactory, $nameConverter, $propertyAccessor, $propertyTypeExtractor, $classDiscriminatorResolver, $objectClassResolver, $defaultContext);
    }

    /**
     * integrating serializer (get and set method normalizer).
     *
     * @return OctaGetSetMethodNormalizer class
     * @author Nils Adermann <naderman@naderman.de>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function getSetMethodNormalizer(){
        return new OctaGetSetMethodNormalizer();
    }

    /**
     * integrating serializer (property normalizer).
     *
     * @return OctaPropertyNormalizer class
     * @author Matthieu Napoli <matthieu@mnapoli.fr>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function propertyNormalizer(){
        return new OctaPropertyNormalizer();
    }

    /**
     * integrating serializer (json serializable normalizer).
     *
     * @return OctaJsonSerializableNormalizer class
     * @author Fred Cox <mcfedr@gmail.com>
     */
    public function jsonSerializableNormalizer(){
        return new OctaJsonSerializableNormalizer();
    }

    /**
     * integrating serializer (datetime normalizer).
     *
     * @return OctaDateTimeNormalizer class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function datetimeNormalizer(){
        return new OctaDateTimeNormalizer();
    }

    /**
     * integrating serializer (data uri normalizer).
     *
     * @return OctaDataUriNormalizer class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function dataUriNormalizer(){
        return new OctaDataUriNormalizer();
    }

    /**
     * integrating serializer (date interval normalizer).
     *
     * @return OctaDateIntervalNormalizer class
     * @author Jérôme Parmentier <jerome@prmntr.me>
     */
    public function dateIntervalNormalizer(){
        return new OctaDateIntervalNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return OctaConstraintViolationListNormalizer class
     * @author Grégoire Pineau <lyrixx@lyrixx.info>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function constraintViolationListNormalizer(){
        return new OctaConstraintViolationListNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return OctaArrayDenormalizer class
     * @author Alexander M. Turek <me@derrabus.de>
     */
    public function arrayDenormalizer(){
        return new OctaArrayDenormalizer();
    }

    /**
     * integrating serializer (metadata factory).
     *
     * @return OctaClassMetadataFactory class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function classMetadataFactory($loader){
        return new OctaClassMetadataFactory($loader);
    }

    /**
     * integrating serializer (annotation loader).
     * @param $reader
     * @return OctaAnnotationLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function annotationLoader($reader=null){
        return new OctaAnnotationLoader($reader);
    }

    /**
     * integrating serializer (yaml file loader).
     * @param string $classMetadata
     * @return OctaYamlFileLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function yamlFileLoader($classMetadata=null){
        return new OctaYamlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (xml file loader).
     * @param null $classMetadata
     * @return OctaXmlFileLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function xmlFileLoader($classMetadata=null){
        return new OctaXmlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (annotation reader).
     * @param null $parser
     * @return OctaAnnotationReader class
     * @author  Benjamin Eberlei <kontakt@beberlei.de>
     * @author  Guilherme Blanco <guilhermeblanco@hotmail.com>
     * @author  Jonathan Wage <jonwage@gmail.com>
     * @author  Roman Borschel <roman@code-factory.org>
     * @author  Johannes M. Schmitt <schmittjoh@gmail.com>
     */
    public function annotationReader($parser = null){
        return new OctaAnnotationReader($parser);
    }

    /**
     * integrating serializer (camelcase converter).
     * @param array $attributes
     * @param boolean $lowerCamelCase
     * @return OctaCamelCaseToSnakeCaseNameConverter class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function camelCaseToSnakeCaseNameConverter(array $attributes = null, $lowerCamelCase = true){
        return new OctaCamelCaseToSnakeCaseNameConverter($attributes, $lowerCamelCase);
    }

    /**
     * integrating serializer (metadata aware name converter).
     * @param null $metadataFactory
     * @param null $fallbackNameConverter
     * @return OctaMetadataAwareNameConverter class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function metadataAwareNameConverter($metadataFactory = null, $fallbackNameConverter = null){
        return new OctaMetadataAwareNameConverter($metadataFactory, $fallbackNameConverter);
    }

    /**
     * integrating serializer (DiscriminatorMap Annotation).
     * @param array $data
     * @return OctaDiscriminatorMap class
     * @author Samuel Roze <samuel.roze@gmail.com>
     */
    public function discriminatorMap(array $data){
        return new OctaDiscriminatorMap($data);
    }

    /**
     * integrating serializer (groups Annotation).
     * @param array $data
     * @return OctaGroups class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function groups(array $data){
        return new OctaGroups($data);
    }

    /**
     * integrating serializer (MaxDepth Annotation).
     * @param array $data
     * @return OctaMaxDepth class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function maxDepth(array $data){
        return new OctaMaxDepth($data);
    }

    /**
     * integrating serializer (serialized_name Annotation).
     * @param array $data
     * @return OctaSerializedName class
     * @author Fabien Bourigault <bourigaultfabien@gmail.com>
     */
    public function serializedName(array $data){
        return new OctaSerializedName($data);
    }
}