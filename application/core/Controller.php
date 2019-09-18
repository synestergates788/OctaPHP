<?php
/**
 * ##########################
 * ###Twig Template Engine###
 * ##########################
 */
$loader = \Twig\Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'application'.DS.'views');
$view = new \Twig\Environment($loader);
$GLOBALS['template'] = $view;

/**
 * Initialize Dotenv class.
 * Manages .env files.
 */
use Symfony\Component\Dotenv\Dotenv as OctaDotenv;

/**
 * Initialize CssSelectorConverter class.
 * CssSelectorConverter is the main entry point of the component and can convert CSS
 * selectors to XPath expressions.
 */
use Symfony\Component\CssSelector\CssSelectorConverter as OctaCssSelectorConverter;

/**
 * Initialize Crawler class.
 * Crawler eases navigation of a list of \DOMNode objects.
 */
use Symfony\Component\DomCrawler\Crawler as OctaCrawler;

/**
 * Initialize ExpressionLanguage class.
 * Allows to compile and evaluate expressions written in your own DSL.
 */
use Symfony\Component\ExpressionLanguage\ExpressionLanguage as OctaExpressionLanguage;

/**
 * Initialize Finder class,
 * Finder allows to build rules to find files and directories.
 */
use Symfony\Component\Finder\Finder as OctaFinder;

/**
 * Initialize Request class.
 * Request represents an HTTP request.
 * The methods dealing with URL accept / return a raw path (% encoded):
 *   * getBasePath
 *   * getBaseUrl
 *   * getPathInfo
 *   * getRequestUri
 *   * getUri
 *   * getUriForPath
 */
use Symfony\Component\HttpFoundation\Request as OctaRequest;

/**
 * Initialize PropertyAccess class.
 * Entry point of the PropertyAccess component.
 */
use Symfony\Component\PropertyAccess\PropertyAccess as OctaPropertyAccess;

/**
 * Initialize Stopwatch class.
 * Stopwatch provides a way to profile code.
 */
use Symfony\Component\Stopwatch\Stopwatch as OctaStopwatch;

/**
 * ##########################
 * ###START OF HTTP CRAWLER##
 * ##########################
 *
 * Initialize HttpClient class.
 * A factory to instantiate the best possible HTTP client for the runtime.
 */
use Symfony\Component\HttpClient\HttpClient as OctaHttpClient;

/**
 * Initialize CurlHttpClient class.
 * A performant implementation of the HttpClientInterface contracts based on the curl extension.
 * This provides fully concurrent HTTP requests, with transparent
 * HTTP/2 push when a curl version that supports it is installed.
 */
use Symfony\Component\HttpClient\CurlHttpClient as OctaCurlHttpClient;

/**
 * Initialize NativeHttpClient class.
 * A portable implementation of the HttpClientInterface contracts based on PHP stream wrappers.
 *
 * PHP stream wrappers are able to fetch response bodies concurrently,
 * but each request is opened synchronously.
 */
use Symfony\Component\HttpClient\NativeHttpClient as OctaNativeHttpClient;

/**
 * Initialize CachingHttpClient class.
 * Adds caching on top of an HTTP client.
 *
 * The implementation buffers responses in memory and doesn't stream directly from the network.
 * You can disable/enable this layer by setting option "no_cache" under "extra" to true/false.
 * By default, caching is enabled unless the "buffer" option is set to false.
 */
use Symfony\Component\HttpClient\CachingHttpClient as OctaCachingHttpClient;

/**
 * Initialize ScopingHttpClient class.
 * Auto-configure the default options based on the requested URL.
 */
use Symfony\Component\HttpClient\ScopingHttpClient as OctaScopingHttpClient;

/**
 * Initialize MockHttpClient class.
 * A test-friendly HttpClient that doesn't make actual HTTP requests.
 */
use Symfony\Component\HttpClient\MockHttpClient as OctaMockHttpClient;

/**
 * Initialize MockResponse class.
 * A test-friendly response.
 */
use Symfony\Component\HttpClient\Response\MockResponse as OctaMockResponse;

/**
 * Initialize Store class.
 * Store implements all the logic for storing cache metadata (Request and Response headers).
 */
use Symfony\Component\HttpKernel\HttpCache\Store as OctaStore;

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

/**
 * Initialize Respect\Validation\Validator class.
 */
use Respect\Validation\Validator;

/**
 * ##########################
 * ###START OF SESSION#######
 * ##########################
 *
 * Initialize Session class.
 */
use Symfony\Component\HttpFoundation\Session\Session as OctaSession;

/**
 * Initialize AttributeBag class.
 * This class relates to session attribute storage.
 */
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag as OctaAttributeBag;

/**
 * Initialize NativeSessionStorage class.
 * This provides a base class for session attribute storage.
 */
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage as OctaNativeSessionStorage;

/**
 * Initialize NamespacedAttributeBag class.
 * This class provides structured storage of session attributes using
 * a name spacing character in the key.
 */
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag as OctaNamespacedAttributeBag;

/**
 * ##########################################
 * ###START OF FILESYSTEM ABSTRACTION LAYER##
 * ##########################################
 *
 * Initialize StreamMode class.
 * Represents a stream mode.
 */
use Gaufrette\StreamMode as OctaStreamMode;

/**
 * Initialize StreamWrapper class.
 * Stream wrapper class for the Gaufrette filesystems.
 */
use Gaufrette\StreamWrapper as OctaStreamWrapper;

/**
 * Initialize FilesystemMap class.
 * Associates filesystem instances to their names.
 */
use Gaufrette\FilesystemMap as OctaFilesystemMap;

/**
 * Initialize Filesystem class.
 * A filesystem is used to store and retrieve files.
 */
use Gaufrette\Filesystem as OctaFilesystem;

/**
 * Initialize S3Client class.
 * Client used to interact with **Amazon Simple Storage Service (Amazon S3)**.
 */
use Aws\S3\S3Client as OctaS3Client;

/**
 * Initialize GoogleCloudStorage class.
 * Google Cloud Storage adapter using the Google APIs Client Library for PHP.
 */
use Gaufrette\Adapter\GoogleCloudStorage as OctaGoogleCloudStorage;

/**
 * Initialize BlobProxyFactory class.
 * Basic implementation for a Blob proxy factory.
 */
use Gaufrette\Adapter\AzureBlobStorage\BlobProxyFactory as OctaBlobProxyFactory;

/**
 * Initialize AzureBlobStorage class.
 * Basic implementation for a Blob proxy factory.
 */
use Gaufrette\Adapter\AzureBlobStorage as OctaAzureBlobStorage;

/**
 * Initialize CreateContainerOptions class.
 * Optional parameters for createContainer API
 */
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions as OctaCreateContainerOptions;

/*use Gaufrette\Extras\Resolvable\ResolvableFilesystem as OctaResolvableFilesystem;
use Gaufrette\Extras\Resolvable\Resolver\AwsS3PresignedUrlResolver as OctaAwsS3PresignedUrlResolver;
use Gaufrette\Extras\Resolvable\Resolver\AwsS3PublicUrlResolver as OctaAwsS3PublicUrlResolver;
use Gaufrette\Extras\Resolvable\Resolver\StaticUrlResolver as OctaStaticUrlResolver;*/

/**
 * Initialize Local adapter class.
 * Adapter for the local filesystem.
 */
use Gaufrette\Adapter\Local as OctaLocalAdapter;

/**
 * Initialize Ftp adapter class.
 * Ftp adapter.
 */
use Gaufrette\Adapter\Ftp as OctaFtpAdapter;

/**
 * Initialize InMemory adapter class.
 * In memory adapter.
 *
 * Stores some files in memory for test purposes
 */
use Gaufrette\Adapter\InMemory as OctaInMemory;

/**
 * Initialize Zip adapter class.
 * ZIP Archive adapter.
 */
use Gaufrette\Adapter\Zip as OctaZipAdapter;

/**
 * Initialize AwsS3 adapter class.
 * Amazon S3 adapter using the AWS SDK for PHP v2.x.
 */
use Gaufrette\Adapter\AwsS3 as OctaAwsS3Adapter;

/**
 * Initialize Cache adapter class.
 * Cache adapter.
 */
use Gaufrette\Adapter\Cache as OctaCacheAdapter;

/**
 * ##########################
 * ###START OF MAILER########
 * ##########################
 *
 * Initialize mail class
 */
use Zend\Mail;

/**
 * Initialize Message class.
 */
use Zend\Mail\Message as OctaMailMessage;

/**
 * Initialize Smtp class.
 * SMTP connection object
 *
 * Loads an instance of Zend\Mail\Protocol\Smtp and forwards smtp transactions
 */
use Zend\Mail\Transport\Smtp as OctaSmtpTransport;

/**
 * Initialize SmtpOptions class.
 */
use Zend\Mail\Transport\SmtpOptions as OctaSmtpOptions;

/**
 * Initialize Sendmail class.
 * Class for sending email via the PHP internal mail() function
 */
use Zend\Mail\Transport\Sendmail as OctaSendmailTransport;

/**
 * Initialize Smtp class.
 * SMTP implementation of Zend\Mail\Protocol\AbstractProtocol
 *
 * Minimum implementation according to RFC2821: EHLO, MAIL FROM, RCPT TO, DATA,
 * RSET, NOOP, QUIT
 */
use Zend\Mail\Protocol\Smtp as OctaSmtpProtocol;

/**
 * Initialize File class.
 * File transport
 *
 * Class for saving outgoing emails in filesystem
 */
use Zend\Mail\Transport\File as OctaFileTransport;

/**
 * Initialize FileOptions class.
 */
use Zend\Mail\Transport\FileOptions as OctaFileOptions;

/**
 * Initialize Message class.
 */
use Zend\Mime\Message as OctaMimeMessage;

/**
 * Initialize Mime class.
 * Support class for MultiPart Mime Messages
 */
use Zend\Mime\Mime as OctaMime;

/**
 * Initialize Part class.
 * Class representing a MIME part.
 */
use Zend\Mime\Part as OctaMimePart;

/**
 * Initialize InMemory class.
 * InMemory transport
 *
 * This transport will just store the message in memory.  It is helpful
 * when unit testing, or to prevent sending email when in development or
 * testing.
 */
use Zend\Mail\Transport\InMemory as OctaInMemoryTransport;

/**
 * Initialize SmtpPluginManager class.
 * Plugin manager implementation for SMTP extensions.
 *
 * Enforces that SMTP extensions retrieved are instances of Smtp. Additionally,
 * it registers a number of default extensions available.
 */
use Zend\Mail\Protocol\SmtpPluginManager as OctaSmtpPluginManager;

/**
 * Initialize Plain class.
 * Performs PLAIN authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Plain as OctaPlain;

/**
 * Initialize Login class.
 * Performs LOGIN authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Login as OctaLogin;

/**
 * Initialize Crammd5 class.
 * Performs CRAM-MD5 authentication
 */
use Zend\Mail\Protocol\Smtp\Auth\Crammd5 as OctaCrammd5;

/**
 * Initialize Pop3 class.
 */
use Zend\Mail\Storage\Pop3 as OctaPop3;

/**
 * Initialize Mbox class.
 */
use Zend\Mail\Storage\Mbox as OctaMbox;

/**
 * Initialize Maildir class.
 */
use Zend\Mail\Storage\Maildir as OctaMaildir;

/**
 * Initialize Imap class.
 */
use Zend\Mail\Storage\Imap as OctaImap;

/**
 * Initialize Folder class.
 */
use Zend\Mail\Storage\Folder as OctaMailFolder;

/**
 * Initialize Storage class.
 */
use Zend\Mail\Storage as OctaMailStorage;

/**
 * ##########################
 * ###START OF CRYPTOGRAPHY##
 * ##########################
 *
 * Initialize BlockCipher class.
 * Encrypt using a symmetric cipher then authenticate using HMAC (SHA-256)
 */
use Zend\Crypt\BlockCipher as OctaBlockCipher;

/**
 * Initialize Openssl class.
 * Symmetric encryption using the OpenSSL extension
 *
 * NOTE: DO NOT USE only this class to encrypt data.
 * This class doesn't provide authentication and integrity check over the data.
 * PLEASE USE Zend\Crypt\BlockCipher instead!
 */
use Zend\Crypt\Symmetric\Openssl as OctaOpenssl;

/**
 * Initialize FileCipher class.
 * Encrypt/decrypt a file using a symmetric cipher in CBC mode
 * then authenticate using HMAC
 */
use Zend\Crypt\FileCipher as OctaFileCipher;

/**
 * Initialize Hybrid class.
 * Hybrid encryption (OpenPGP like)
 *
 * The data are encrypted using a BlockCipher with a random session key
 * that is encrypted using RSA with the public key of the receiver.
 * The decryption process retrieves the session key using RSA with the private
 * key of the receiver and decrypts the data using the BlockCipher.
 */
use Zend\Crypt\Hybrid as OctaHybrid;

/**
 * Initialize Rsa class.
 */
use Zend\Crypt\PublicKey\Rsa as OctaRsa;

/**
 * Initialize RsaOptions class.
 * RSA instance options
 */
use Zend\Crypt\PublicKey\RsaOptions as OctaRsaOptions;

/**
 * Initialize Bcrypt class.
 * Bcrypt algorithm using crypt() function of PHP
 */
use Zend\Crypt\Password\Bcrypt as OctaBcrypt;

/**
 * Initialize Apache class.
 * Apache password authentication
 */
use Zend\Crypt\Password\Apache as OctaApache;

/**
 * Initialize DiffieHellman class.
 * PHP implementation of the Diffie-Hellman public key encryption algorithm.
 * Allows two unassociated parties to establish a joint shared secret key
 * to be used in encrypting subsequent communications.
 */
use Zend\Crypt\PublicKey\DiffieHellman as OctaDiffieHellman;

/**
 * ###########################
 * ###START OF DEBUG CONSOLE##
 * ###########################
 *
 * Initialize Debug class.
 * Enables the debug tools,
 * This method registers an error handler and an exception handler.
 */
use Symfony\Component\Debug\Debug;
Debug::enable();

/**
 * Initialize Debug class.
 * Registers the error handler.
 */
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();

/**
 * Initialize Debug class.
 * Registers the exception handler.
 */
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();

/**
 * Initialize Debug class.
 * Wraps all autoloaders.
 */
use Symfony\Component\Debug\DebugClassLoader;
DebugClassLoader::enable();

/**
 * ##########################################################
 * ###START OF DATABASE ACTIVE RECORD AND CONNECTIONS########
 * ##########################################################
 *
 * Initialize PDO connection.
 * Manages .env files.
 */
use system\database\connection as OctaDatabase;

/**
 * Initialize Octa Active Record class.
 * An advance Active Record using RedbeanPHP ORM as it's core.
 */
use system\database\active_record;

/**
 * ##################################
 * ###START OF Authentication########
 * ##################################
 *
 * Initialize authentication class.
 */
use Zend\Authentication\AuthenticationService as OctaAuthenticationService;


use React\EventLoop\Factory as OctaReactFactory;

/**
 * Initialize zend Config class.
 *
 * Provides a property based interface to an array.
 * The data are read-only unless $allowModifications is set to true
 * on construction.
 *
 * Implements Countable, Iterator and ArrayAccess
 * to facilitate easy access to the data.
 */
use Zend\Config\Config as OctaConfig;

use system\model\core\modelCore;
use system\model\modelInterface\modelInterface;

class Controller{

    protected $view;
    protected $model;
    protected $template;
    protected $assets;
    protected $input;
    protected $http_client;
    protected $native_http_client;
    protected $curl_http_client;
    protected $form_validation;
    protected $bean;
    protected $octa;
    protected $config;

    /**
     * diffie-hellman crypt Key formats
     */
    const FORMAT_BINARY = OctaDiffieHellman::FORMAT_BINARY;
    const FORMAT_NUMBER = OctaDiffieHellman::FORMAT_NUMBER;
    const FORMAT_BTWOC = OctaDiffieHellman::FORMAT_BTWOC;

    public function __construct(){

        /**
         * initializing database component using redbeanPhp.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $core = new modelCore();
        $this->model_dependencies($core, $GLOBALS['config']);

        /**
         * initializing assets directory base on configuration settings.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->assets($GLOBALS['template'],$this->config->assets);

        /**
         * initializing third-party libraries.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->parse_library($this->config->autoload->libraries);

        /**
         * initializing helpers.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->parse_helpers($this->config->autoload->helpers);

        /**
         * initializing input validator.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->input = new Input();

        /**
         * start of initializing http-request (http_client, native_http_client and curl_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->http_client();

        /**
         * start of initializing http-request (native_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->native_http_client();

        /**
         * start of initializing http-request (curl_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->curl_http_client();

        /**
         * connect to database and active record.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $database = new OctaDatabase($this->bean, $this->config);
        $database->connect();
        $this->octa = new active_record($this->bean);

        #$this->octa->get('users');
        #$res = $this->octa->result();
        #echo '<pre>';
        #print_r($res);
        #echo '</pre>';
        #exit;
    }

    /**
     * initializing model-core.
     * @param modelInterface|$interface
     * @param array $config
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    private function model_dependencies(modelInterface $interface, $config=[]){
        $this->config = $interface->config($config);
        $interface->initialize_database();
        $this->bean = $interface->bean();
    }

    /**
     * autoload model with/without alias.
     *
     * @param string $modelName      model name
     * @param string $alias      model alias
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function model($modelName,$alias=null){
        if(!is_array($modelName)){
            $models_dir = scandir(ROOT.DS.'application'.DS.'models');
            unset($models_dir[0],$models_dir[1]);

            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){

                    if(strpos($row_m, '.php') == false){
                        if(file_exists(ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$modelName.".php")){

                            include_once ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$modelName.".php";
                            if($alias){
                                $this->$alias = new $modelName;
                            }else{
                                $this->$modelName = new $modelName;
                            }
                        }
                    }
                }
            }

        }else{
            $models_dir = scandir(ROOT.DS.'application'.DS.'models');
            unset($models_dir[0],$models_dir[1]);

            $model_checker = [];
            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){
                    if(strpos($row_m, '.php') == false){

                        if($modelName){
                            foreach($modelName as $key_arrm=>$row_arrm){

                                if(!in_array($key_arrm,$model_checker)){
                                    if(file_exists(ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$key_arrm.".php")){
                                        include_once ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$key_arrm.".php";
                                        $this->hm = new $key_arrm;
                                    }

                                    $model_checker[] = $key_arrm;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * loading autoload helpers.
     *
     * @param string $helpers      helper file name
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function parse_helpers($helpers){
        new Helpers($helpers);
    }

    /**
     * loading autoload libraries.
     *
     * @param string $libraries      library file name
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function parse_library($libraries){
        new Libraries($libraries);
    }

    /**
     * loading .html.twig files as views.
     *
     * @param string $template_name      your view file (your_view.html.twig) file name
     * @param array $data      an array of data to be pass on the view file
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function view($template_name,$data=[]){
        if($template_name){
            echo $GLOBALS['template']->render($template_name, $data);
        }else{
            include_once(ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_template.php');
        }
    }

    /**
     * loading assets directory configuration using symfony assets component.
     * @param string $view
     * @param string $assets_config
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function assets($view,$assets_config){
        if($assets_config){
            $view->addFunction(new \Twig\TwigFunction($this->config->assets->directory_name, function ($asset) {
                return sprintf($this->config->assets->directory_url.DS.'%s', ltrim($asset, '/'));
            }));
        }
    }

    /**
     * integrating form validation using Validator.
     * @param array $data      contains an array of fields to be validated
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function form_validation(array $data = []){
        $this->form_validation = new Valitron\Validator($data);
    }

    /**
     * integrating session of symfony.
     * @param string $NativeSessionStorage      native session storage
     * @param string $NamespacedAttributeBag      native session storage attribute bag
     * @return OctaSession class
     * @author Fabien Potencier <fabien@symfony.com>
     * @author Drak <drak@zikula.org>
     */
    public function session($NativeSessionStorage=null,$NamespacedAttributeBag=null){
        return new OctaSession($NativeSessionStorage,$NamespacedAttributeBag);
    }

    /**
     * integrating session attribute bag of symfony.
     * @param string $storageKey The key used to store attributes in the session
     * @return OctaAttributeBag class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function attribute_bag($storageKey = '_sf2_attributes'){
        return new OctaAttributeBag($storageKey);
    }

    /**
     * integrating session storage of symfony.
     *
     * @param array                         $options Session configuration options
     * @param \SessionHandlerInterface|null $handler
     * @param $metaBag                    MetadataBag
     *
     * @return OctaNativeSessionStorage class
     * @author Drak <drak@zikula.org>
     */
    public function native_session_storage(array $options = [], $handler = null, $metaBag = null){
        return new OctaNativeSessionStorage($options, $handler, $metaBag);
    }

    /**
     * integrating session namespaced attribute bag of symfony.
     *
     * @param string $storageKey         Session storage key
     * @param string $namespaceCharacter Namespace character to use in keys
     * @return OctaNamespacedAttributeBag class
     * @author Drak <drak@zikula.org>
     */
    public function namespaced_attribute_bag($storageKey = '_sf2_attributes', $namespaceCharacter = '/'){
        return new OctaNamespacedAttributeBag($storageKey, $namespaceCharacter);
    }

    /**
     * integrating property access of symfony.
     * @return OctaPropertyAccess::createPropertyAccessor class
     * @author Bernhard Schussek <bschussek@gmail.com>
     */
    public function property_accessor(){
        return OctaPropertyAccess::createPropertyAccessor();
    }

    /**
     * integrating property access builder of symfony.
     * @return OctaPropertyAccess::createPropertyAccessorBuilder class
     * @author Bernhard Schussek <bschussek@gmail.com>
     */
    public function property_accessor_builder(){
        return OctaPropertyAccess::createPropertyAccessorBuilder();
    }

    /**
     * integrating dom crawler of symfony.
     *
     * @param mixed  $node     A Node to use as the base for the crawling
     * @param string $uri      The current URI
     * @param string $baseHref The base href value
     * @return OctaCrawler class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function dom_crawler($node = null, $uri = null, $baseHref = null){
        return new OctaCrawler($node,$uri,$baseHref);
    }

    /**
     * integrating http_client component of symfony.
     * @return OctaHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function http_client(){
        return new OctaHttpClient();
    }

    /**
     * integrating native_http_client component of symfony.
     * @param array $defaultOptions      The current URI
     * @param int $maxHostConnections      The current URI
     * @return OctaNativeHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function native_http_client($defaultOptions = [], $maxHostConnections = 6){
        return new OctaNativeHttpClient($defaultOptions,$maxHostConnections);
    }

    /**
     * integrating curl_http_client component of symfony.
     * @param array $defaultOptions      options config
     * @param int $maxHostConnections    maximum host connections
     * @param int $maxPendingPushes      maximum pending pushes
     * @return OctaCurlHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function curl_http_client(array $defaultOptions = [], $maxHostConnections = 6, $maxPendingPushes = 50){
        return new OctaCurlHttpClient($defaultOptions,$maxHostConnections,$maxPendingPushes);
    }

    /**
     * integrating caching_http_client component of symfony.
     *
     * Adds caching on top of an HTTP client.
     *
     * The implementation buffers responses in memory and doesn't stream directly from the network.
     * You can disable/enable this layer by setting option "no_cache" under "extra" to true/false.
     * By default, caching is enabled unless the "buffer" option is set to false.
     *
     * @param array $client      client config
     * @param int $store         store
     * @param array $defaultOptions      default options
     * @return OctaCachingHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function caching_http_client(array $client = [], $store = 6, $defaultOptions = []){
        return new OctaCachingHttpClient($client, $store, $defaultOptions);
    }

    /**
     * integrating scoping_http_client component of symfony.
     * Auto-configure the default options based on the requested URL.
     *
     * @param array $client      host client config
     * @param array $defaultOptionsByRegexp      regular exp default options
     * @param null $defaultRegexp      default regex
     * @return OctaScopingHttpClient class
     * @author Anthony Martin <anthony.martin@sensiolabs.com>
     */
    public function scoping_http_client($client = [], $defaultOptionsByRegexp = [], $defaultRegexp = null){
        return new OctaScopingHttpClient($client,$defaultOptionsByRegexp,$defaultRegexp);
    }

    /**
     * integrating mock_http_client component of symfony.
     * A test-friendly HttpClient that doesn't make actual HTTP requests.
     *
     * @param callable|ResponseInterface|ResponseInterface[]|iterable|null $responseFactory
     * @param null $baseUri
     * @return OctaMockHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function mock_http_client($responseFactory = null, $baseUri = null){
        return new OctaMockHttpClient($responseFactory,$baseUri);
    }

    /**
     * integrating mock_response component of symfony.
     * @param string|string[]|iterable $body The response body as a string or an iterable of strings,
     *                                       yielding an empty string simulates a timeout,
     *                                       exceptions are turned to TransportException
     * @param array $info
     * @return OctaMockResponse class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function mock_response($body = '', array $info = []){
        return new OctaMockResponse($body,$info);
    }

    /**
     * integrating kernel of symfony.
     *
     * @param null $root
     * @return OctaStore class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function store($root=null){
        return new OctaStore($root);
    }

    /**
     * integrating MIME (email) component of zend.
     *
     * @return OctaMailMessage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function message(){
        return new OctaMailMessage();
    }

    /**
     * integrating mailer/transport method component of zend.
     *
     * @param null $parameters
     * @return Mail\Transport\Sendmail class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function transport($parameters = null){
        return new Mail\Transport\Sendmail($parameters);
    }

    /**
     * integrating mailer/smtp-transport method component of zend.
     *
     * @param array $options
     * @return OctaSmtpTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_transport($options = null){
        return new OctaSmtpTransport($options);
    }

    /**
     * integrating mailer/smtp-transport-option method component of zend.
     *
     * @param array $options      smtp options config
     * @return OctaSmtpOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_options(array $options = []){
        return new OctaSmtpOptions($options);
    }

    /**
     * integrating mailer/send-mail-transport method component of zend.
     *
     * @param string $parameters
     * @return OctaSendmailTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function send_mail_transport($parameters = null){
        return new OctaSendmailTransport($parameters);
    }

    /**
     * integrating mailer/smtp protocol method component of zend.
     *
     * @param string $host      local host ip
     * @param string $port      local host port
     * @param array $config    local config data
     * @return OctaSmtpProtocol class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_protocol($host = '127.0.0.1', $port = null, array $config = null){
        return new OctaSmtpProtocol($host,$port,$config);
    }

    /**
     * integrating mailer/smtp plugin manager method component of zend.
     *
     * @return OctaSmtpPluginManager class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_plugin_manager(){
        return new OctaSmtpPluginManager();
    }

    /**
     * integrating mailer/file-transport method component of zend.
     *
     * @param $options
     * @return OctaFileTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_transport($options = null){
        return new OctaFileTransport($options);
    }

    /**
     * integrating mailer/file transport option method component of zend.
     *
     * @param array $options
     * @return OctaFileOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_options(array $options = null){
        return new OctaFileOptions($options);
    }

    /**
     * integrating mailer/inMemory-transport method component of zend.
     *
     * @return OctaInMemoryTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function in_memory_transport(){
        return new OctaInMemoryTransport();
    }

    /**
     * integrating mailer/mime-message method component of zend.
     *
     * @return OctaMimeMessage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_message(){
        return new OctaMimeMessage();
    }

    /**
     * integrating mailer/mime method component of zend.
     *
     * @param string $boundary
     * @return OctaMime class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime($boundary = null){
        return new OctaMime($boundary);
    }

    /**
     * integrating mailer/mime-part method component of zend.
     *
     * @param string $content
     * @return OctaMimePart class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_part($content = ''){
        return new OctaMimePart($content);
    }

    /**
     * integrating mailer/plain auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaPlain class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function plain_auth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaPlain($host, $port, $config);
    }

    /**
     * integrating mailer/login auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaLogin class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function login_auth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaLogin($host, $port, $config);
    }

    /**
     * integrating mailer/crammd5 auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return OctaCrammd5 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function crammd5_auth($host = '127.0.0.1', $port = null, $config = null){
        return new OctaCrammd5($host, $port, $config);
    }

    /**
     * integrating pop3 mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaPop3 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function pop3(array $params=[]){
        return new OctaPop3($params);
    }

    /**
     * integrating mbox mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaMbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox(array $params=[]){
        return new OctaMbox($params);
    }

    /**
     * integrating maildir mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaMaildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir(array $params=[]){
        return new OctaMaildir($params);
    }

    /**
     * integrating imap mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return OctaImap class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function imap(array $params=[]){
        return new OctaImap($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @return OctaMailStorage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mail_storage(){
        return new OctaMailStorage();
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        mbox folder
     * @return OctaMailFolder\Mbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox_folder(array $params = []){
        return new OctaMailFolder\Mbox($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        maildir folder
     * @return OctaMailFolder\Maildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir_folder(array $params = []){
        return new OctaMailFolder\Maildir($params);
    }

    /**
     * integrating css selector component of symfony.
     * @param bool $html Whether HTML support should be enabled. Disable it for XML documents
     * @return OctaCssSelectorConverter class
     * @author Christophe Coevoet <stof@notk.org>
     */
    public function css_selector($html = true){
        return new OctaCssSelectorConverter($html);
    }

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
     * integrating serializer (json encoder).
     * @param null $encodingImpl
     * @param null $decodingImpl
     * @return OctaJsonEncoder class
     * @author Jordi Boggiano <j.boggiano@seld.be>
     */
    public function json_encoder($encodingImpl = null, $decodingImpl = null){
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
    public function xml_encoder($defaultContext = [], $loadOptions = null, array $decoderIgnoredNodeTypes = [XML_PI_NODE, XML_COMMENT_NODE], array $encoderIgnoredNodeTypes = []){
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
    public function yaml_encoder($dumper = null, $parser = null, array $defaultContext = []){
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
    public function csv_encoder($defaultContext = [], $enclosure = '"', $escapeChar = '\\', $keySeparator = '.', $escapeFormulas = false){
        return new OctaCsvEncoder($defaultContext, $enclosure, $escapeChar, $keySeparator, $escapeFormulas);
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
    public function object_normalizer($classMetadataFactory = null, $nameConverter = null, $propertyAccessor = null, $propertyTypeExtractor = null, $classDiscriminatorResolver = null, callable $objectClassResolver = null, array $defaultContext = []){
        return new OctaObjectNormalizer($classMetadataFactory, $nameConverter, $propertyAccessor, $propertyTypeExtractor, $classDiscriminatorResolver, $objectClassResolver, $defaultContext);
    }

    /**
     * integrating serializer (get and set method normalizer).
     *
     * @return OctaGetSetMethodNormalizer class
     * @author Nils Adermann <naderman@naderman.de>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function get_set_method_normalizer(){
        return new OctaGetSetMethodNormalizer();
    }

    /**
     * integrating serializer (property normalizer).
     *
     * @return OctaPropertyNormalizer class
     * @author Matthieu Napoli <matthieu@mnapoli.fr>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function property_normalizer(){
        return new OctaPropertyNormalizer();
    }

    /**
     * integrating serializer (json serializable normalizer).
     *
     * @return OctaJsonSerializableNormalizer class
     * @author Fred Cox <mcfedr@gmail.com>
     */
    public function json_serializable_normalizer(){
        return new OctaJsonSerializableNormalizer();
    }

    /**
     * integrating serializer (datetime normalizer).
     *
     * @return OctaDateTimeNormalizer class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function datetime_normalizer(){
        return new OctaDateTimeNormalizer();
    }

    /**
     * integrating serializer (data uri normalizer).
     *
     * @return OctaDataUriNormalizer class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function data_uri_normalizer(){
        return new OctaDataUriNormalizer();
    }

    /**
     * integrating serializer (date interval normalizer).
     *
     * @return OctaDateIntervalNormalizer class
     * @author Jérôme Parmentier <jerome@prmntr.me>
     */
    public function date_interval_normalizer(){
        return new OctaDateIntervalNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return OctaConstraintViolationListNormalizer class
     * @author Grégoire Pineau <lyrixx@lyrixx.info>
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function constraint_violation_list_normalizer(){
        return new OctaConstraintViolationListNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return OctaArrayDenormalizer class
     * @author Alexander M. Turek <me@derrabus.de>
     */
    public function array_denormalizer(){
        return new OctaArrayDenormalizer();
    }

    /**
     * integrating serializer (metadata factory).
     *
     * @return OctaClassMetadataFactory class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function class_metadata_factory($loader){
        return new OctaClassMetadataFactory($loader);
    }

    /**
     * integrating serializer (annotation loader).
     * @param $reader
     * @return OctaAnnotationLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function annotation_loader($reader=null){
        return new OctaAnnotationLoader($reader);
    }

    /**
     * integrating serializer (yaml file loader).
     * @param string $classMetadata
     * @return OctaYamlFileLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function yaml_file_loader($classMetadata=null){
        return new OctaYamlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (xml file loader).
     * @param null $classMetadata
     * @return OctaXmlFileLoader class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function xml_file_loader($classMetadata=null){
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
    public function annotation_reader($parser = null){
        return new OctaAnnotationReader($parser);
    }

    /**
     * integrating serializer (camelcase converter).
     * @param array $attributes
     * @param boolean $lowerCamelCase
     * @return OctaCamelCaseToSnakeCaseNameConverter class
     * @author Kévin Dunglas <dunglas@gmail.com>
     */
    public function camelcase_to_snakecase_name_converter(array $attributes = null, $lowerCamelCase = true){
        return new OctaCamelCaseToSnakeCaseNameConverter($attributes, $lowerCamelCase);
    }

    /**
     * integrating serializer (metadata aware name converter).
     * @param null $metadataFactory
     * @param null $fallbackNameConverter
     * @return OctaMetadataAwareNameConverter class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function metadata_aware_name_converter($metadataFactory = null, $fallbackNameConverter = null){
        return new OctaMetadataAwareNameConverter($metadataFactory, $fallbackNameConverter);
    }

    /**
     * integrating serializer (DiscriminatorMap Annotation).
     * @param array $data
     * @return OctaDiscriminatorMap class
     * @author Samuel Roze <samuel.roze@gmail.com>
     */
    public function discriminator_map(array $data){
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
    public function max_depth(array $data){
        return new OctaMaxDepth($data);
    }

    /**
     * integrating serializer (serialized_name Annotation).
     * @param array $data
     * @return OctaSerializedName class
     * @author Fabien Bourigault <bourigaultfabien@gmail.com>
     */
    public function serialized_name(array $data){
        return new OctaSerializedName($data);
    }

    /**
     * integrating data validator.
     *
     * @return Validator class
     * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
     */
    public function validator(){
        return new Validator();
    }

    /**
     * integrating stopwatch component of symfony.
     *
     * @return OctaStopwatch class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function stopwatch(){
        return new OctaStopwatch();
    }

    /**
     * integrating DotEnv component of symfony.
     *
     * @return OctaDotenv class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function dot_env(){
        return new OctaDotenv();
    }

    /**
     * integrating finder component of symfony.
     *
     * @return OctaFinder class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function finder(){
        return new OctaFinder();
    }

    /**
     * integrating expression language component of symfony.
     *
     * @return OctaExpressionLanguage class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function expression_language(){
        return new OctaExpressionLanguage();
    }

    /**
     * start of integrating filesystem abstraction layout of gaufrette.
     * The filesystem abstraction layer permits you to develop your application without the need to know were all those medias will be stored and how.
     * Another advantage of this is the possibility to update the files location without any impact on the code apart from the definition of your filesystem.
     * In example, if your project grows up very fast and if your server reaches its limits, you can easily move your medias in an Amazon S3 server or any other solution.
     *
     * local adapter
     * @param null $directory
     * @param boolean $create
     * @param int $mode
     * @return OctaLocalAdapter class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     * @author Leszek Prabucki <leszek.prabucki@gmail.com>
     */
    public function local_adapter($directory, $create = false, $mode = 0777){
        return new OctaLocalAdapter($directory, $create, $mode);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * Ftp adapter
     * @param null $source
     * @param null $cache
     * @param int $ttl
     * @param null $serializeCache
     * @return OctaCacheAdapter class
     * @deprecated Since the release of symfony-4.
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function cache_adapter($source, $cache, $ttl = 0, $serializeCache = null){
        return new OctaCacheAdapter($source, $cache, $ttl, $serializeCache);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * Ftp adapter
     * @param string $directory
     * @param string $host
     * @param array $options
     * @return OctaFtpAdapter class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function ftp_adapter($directory, $host, $options = array()){
        return new OctaFtpAdapter($directory, $host, $options);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * in memory adapter
     * @param array $files
     * @return OctaInMemory class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function in_memory_adapter(array $files = array()){
        return new OctaInMemory($files);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * aws s3 adapter
     * @param string $service
     * @param string $bucket
     * @param array $options
     * @param boolean $detectContentType
     * @return OctaAwsS3Adapter class
     * @author Michael Dowling <mtdowling@gmail.com>
     */
    public function aws_s3_adapter($service = null, $bucket, array $options = [], $detectContentType = false){
        return new OctaAwsS3Adapter($service, $bucket, $options, $detectContentType);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * zip adapter
     * @param null $zipFile
     * @return OctaZipAdapter class
     * @author Boris Guéry <guery.b@gmail.com>
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function zip_adapter($zipFile = null){
        return new OctaZipAdapter($zipFile);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * instantiate phpseclib connection
     * @param string $host
     * @param int $port
     * @return phpseclib\Net\SFTP class
     * @author Jim Wigginton <terrafrost@php.net>
     */
    public function phpseclib_connection($host = 'localhost', $port = 22){
        return new phpseclib\Net\SFTP($host, $port);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * phpseclib adapter
     * @param string $sftp
     * @param null $distantDirectory
     * @param boolean $createDirectoryIfDoesntExist
     * @return Gaufrette\Adapter\PhpseclibSftp class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function phpseclib_adapter($sftp = null, $distantDirectory = null, $createDirectoryIfDoesntExist = false){
        return new Gaufrette\Adapter\PhpseclibSftp($sftp, $distantDirectory, $createDirectoryIfDoesntExist);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * phpseclib adapter
     * @param null $service
     * @param null $bucket
     * @param array $options
     * @param boolean $detectContentType
     * @return OctaGoogleCloudStorage class
     * @author Patrik Karisch <patrik@karisch.guru>
     */
    public function google_cloud_storage_adapter($service, $bucket, array $options = array(), $detectContentType = false){
        return new OctaGoogleCloudStorage($service, $bucket, $options, $detectContentType);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * local filesystem client
     * @param null $data contains local adapter settings
     * @return OctaFilesystem class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     * @author Leszek Prabucki <leszek.prabucki@gmail.com>
     */
    public function file_system($data=null){
        return new OctaFilesystem($data);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * aws s3 filesystem client
     * @param array $args contains local adapter settings
     * @return OctaS3Client class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function aws_s3_client(array $args){
        return new OctaS3Client($args);
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @param null $mode
     * @return OctaStreamMode class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function stream_mode($mode=null){
        return new OctaStreamMode($mode);
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaStreamWrapper class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     * @author Leszek Prabucki <leszek.prabucki@gmail.com>
     */
    public function stream_wrapper(){
        return new OctaStreamWrapper();
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaFilesystemMap class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function filesystem_map(){
        return new OctaFilesystemMap();
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * google-api adapter
     * @param array $config
     * @return Google_Client class
     * @author Google Inc.
     */
    public function google_client(array $config = array()){
        return new \Google_Client($config);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * @param null $client
     * @return Google_Service_Books class
     * @author Google, Inc.
     */
    public function google_service_books($client=null){
        return new \Google_Service_Books($client);
    }

    /**
     * integrating botdetect component.
     * @param string $secret
     * @param null $requestMethod
     * @return ReCaptcha\ReCaptcha class
     * @author Google Inc.
     */
    public function google_captcha($secret, $requestMethod = null){
        return new \ReCaptcha\ReCaptcha($secret, $requestMethod);
    }

    /**
     * @param string $connectionString
     * @return OctaBlobProxyFactory class
     * @author Luciano Mammino <lmammino@oryzone.com>
     */
    public function blob_proxy_factory($connectionString){
        return new OctaBlobProxyFactory($connectionString);
    }

    /**
     * @param $blobProxyFactory
     * @param string|null                                $containerName
     * @param bool                                       $create
     * @param bool                                       $detectContentType
     * @return OctaAzureBlobStorage class
     * @author Luciano Mammino <lmammino@oryzone.com>
     * @author Pawe? Czy?ewski <pawel.czyzewski@enginewerk.com>
     */
    public function azure_blob_storage($blobProxyFactory, $containerName = null, $create = false, $detectContentType = true){
        return new OctaAzureBlobStorage($blobProxyFactory, $containerName, $create, $detectContentType);
    }

    /**
     * Optional parameters for createContainer API
     * @return OctaCreateContainerOptions class
     * @author Azure Storage PHP SDK <dmsh@microsoft.com>
     */
    public function create_container_options(){
        return new OctaCreateContainerOptions();
    }

    /**
     * block cipher Factory
     *
     * @param  string      $adapter
     * @param  array       $options
     * @return OctaBlockCipher class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function block_cipher($adapter, $options = []){
        return OctaBlockCipher::factory($adapter,$options);
    }

    /**
     * integrating block cipher | openssl of zend
     * @param array $options
     * @return OctaOpenssl class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function openssl($options = []){
        return new OctaOpenssl($options);
    }

    /**
     * integrating file cipher of zend
     * @return OctaFileCipher class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_cipher(){
        return new OctaFileCipher();
    }

    /**
     * integrating hybrid cipher of zend
     * @return OctaHybrid class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function hybrid(){
        return new OctaHybrid();
    }

    /**
     * integrating RsaOptions for hybrid cipher component of zend
     * @param  array|Traversable|null $options
     * @return OctaRsaOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function rsa_options($options = null){
        return new OctaRsaOptions($options);
    }

    /**
     * integrating Rsa component of zend
     * @param  array|Traversable|null $options
     * @return OctaRsa class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function rsa($options = null){
        return new OctaRsa($options);
    }

    /**
     * integrating bcrypt cipher of zend
     * @param  array|Traversable|null $options
     * @return OctaBcrypt class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function bcrypt($options = []){
        return new OctaBcrypt($options);
    }

    /**
     * integrating apache cipher of zend
     * @param  array|Traversable|null $options
     * @return OctaApache class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function apache($options = []){
        return new OctaApache($options);
    }

    /**
     * integrating diffie hellman cipher of zend
     * @param  $prime
     * @param  $generator
     * @param  $privateKey
     * @param  $privateKeyFormat
     * @return OctaDiffieHellman class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function diffie_hellman($prime, $generator, $privateKey = null, $privateKeyFormat = self::FORMAT_NUMBER){
        return new OctaDiffieHellman($prime, $generator, $privateKey, $privateKeyFormat);
    }

    /**
     * zend authentication component.
     * @param  $storage
     * @param  $adapter
     * @return OctaAuthenticationService class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function auth($storage = null, $adapter = null){
        return new OctaAuthenticationService($storage, $adapter);
    }

    /**
     * zend config component.
     * @param  array $array
     * @param  boolean $allowModifications
     * @return OctaAuthenticationService class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function config(array $array, $allowModifications = false){
        return new OctaConfig($array, $allowModifications);
    }
}