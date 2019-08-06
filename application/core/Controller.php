<?php
$loader = \Twig\Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'application'.DS.'views');
$view = new \Twig\Environment($loader);
$GLOBALS['template'] = $view;

/*
 * start of dot-env*/
use Symfony\Component\Dotenv\Dotenv;

/*
 * start of css selector*/
use Symfony\Component\CssSelector\CssSelectorConverter;

/*
 * start of DOM crawler*/
use Symfony\Component\DomCrawler\Crawler;

/*
 * start of expression language*/
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/*
 * start of finder*/
use Symfony\Component\Finder\Finder;

/*
 * start of request property*/
use Symfony\Component\HttpFoundation\Request;

/*
 * start of property access*/
use Symfony\Component\PropertyAccess\PropertyAccess;

/*
 * start of stopwatch*/
use Symfony\Component\Stopwatch\Stopwatch;

/*
 * start of httpclient*/
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Component\HttpClient\ScopingHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

/*
 * start of kernel*/
use Symfony\Component\HttpKernel\HttpCache\Store;

/*serializer*/
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Encoder\CsvEncoder;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Mapping\Loader\XmlFileLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Serializer\Annotation\SerializedName;

/*
 * start of validator*/
use Respect\Validation\Validator;

/*
 * start of session*/
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

/*start of filesystem*/
use Gaufrette\StreamMode as OctaStreamMode;
use Gaufrette\StreamWrapper as OctaStreamWrapper;
use Gaufrette\FilesystemMap as OctaFilesystemMap;
use Gaufrette\Filesystem as OctaFilesystem;
use Aws\S3\S3Client as OctaS3Client;

use Gaufrette\Adapter\GoogleCloudStorage as OctaGoogleCloudStorage;

use Gaufrette\Adapter\AzureBlobStorage\BlobProxyFactory as OctaBlobProxyFactory;
use Gaufrette\Adapter\AzureBlobStorage as OctaAzureBlobStorage;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions as OctaCreateContainerOptions;

/*use Gaufrette\Extras\Resolvable\ResolvableFilesystem as OctaResolvableFilesystem;
use Gaufrette\Extras\Resolvable\Resolver\AwsS3PresignedUrlResolver as OctaAwsS3PresignedUrlResolver;
use Gaufrette\Extras\Resolvable\Resolver\AwsS3PublicUrlResolver as OctaAwsS3PublicUrlResolver;
use Gaufrette\Extras\Resolvable\Resolver\StaticUrlResolver as OctaStaticUrlResolver;*/

use Gaufrette\Adapter\Local as OctaLocalAdapter;
use Gaufrette\Adapter\Ftp as OctaFtpAdapter;
use Gaufrette\Adapter\InMemory as OctaInMemory;
use Gaufrette\Adapter\Zip as OctaZipAdapter;
use Gaufrette\Adapter\AwsS3 as OctaAwsS3Adapter;
use Gaufrette\Adapter\Cache as OctaCacheAdapter;
/*end of filesystem*/

/*
 * start of mailer/mime*/
use Zend\Mail;
use Zend\Mail\Message as OctaMailMessage;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Transport\Sendmail as SendmailTransport;
use Zend\Mail\Protocol\Smtp as SmtpProtocol;
use Zend\Mail\Transport\File as FileTransport;
use Zend\Mail\Transport\FileOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Mime;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\InMemory as InMemoryTransport;
use Zend\Mail\Protocol\SmtpPluginManager;
use Zend\Mail\Protocol\Smtp\Auth\Plain;
use Zend\Mail\Protocol\Smtp\Auth\Login;
use Zend\Mail\Protocol\Smtp\Auth\Crammd5;
use Zend\Mail\Storage\Pop3;
use Zend\Mail\Storage\Mbox;
use Zend\Mail\Storage\Maildir;
use Zend\Mail\Storage\Imap;
use Zend\Mail\Storage\Folder as MailFolder;
use Zend\Mail\Storage as MailStorage;

/*
 * start of cryptography*/
use Zend\Crypt\BlockCipher;
use Zend\Crypt\Symmetric\Openssl;
use Zend\Crypt\FileCipher;
use Zend\Crypt\Hybrid;
use Zend\Crypt\PublicKey\RsaOptions;
use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Crypt\Key\Derivation\SaltedS2k;
use Zend\Crypt\Key\Derivation\Scrypt;
use Zend\Math\Rand;
use Zend\Crypt\Password\Bcrypt;
use Zend\Crypt\PublicKey\DiffieHellman;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\NotFoundException;
use Zend\Crypt\Symmetric\SymmetricInterface;

/*
 * start of error handler*/
use Symfony\Component\Debug\Debug;
Debug::enable();
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();
use Symfony\Component\Debug\DebugClassLoader;
DebugClassLoader::enable();


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

    public function __construct(){
        /**
         * initializing assets directory base on configuration settings.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->assets($GLOBALS['template'],assets_config);

        /**
         * initializing third-party libraries.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->parse_library(libraries);

        /**
         * initializing helpers.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->parse_helpers(helpers);

        /**
         * initializing database component using redbeanPhp.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->initialize_database();

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



        #exit;
    }

    /**
     * initializing database connection.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function initialize_database(){
        include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'database'.DS.'octa_redbean.php';
        include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'database'.DS.'redbean.php';
    }

    /**
     * autoload redbean.
     * @return R class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function bean(){
        return new R();
    }

    /**
     * autoload octa_redbean+redbean active record.
     * @return octa_redbean class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function octa(){
        return new octa_redbean(DB,$this->bean());
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
            foreach($assets_config as $key=>$row){
                $GLOBALS['asset_row'] = $row;
                $view->addFunction(new \Twig\TwigFunction($key, function ($asset) {
                    return sprintf($GLOBALS['asset_row'].DS.'%s', ltrim($asset, '/'));
                }));
            }
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
     * @return session class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function session($NativeSessionStorage=null,$NamespacedAttributeBag=null){
        return new Session($NativeSessionStorage,$NamespacedAttributeBag);
    }

    /**
     * integrating session attribute bag of symfony.
     * @param string $storageKey The key used to store attributes in the session
     * @return AttributeBag class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function attribute_bag($storageKey = '_sf2_attributes'){
        return new AttributeBag($storageKey);
    }

    /**
     * integrating session storage of symfony.
     *
     * @param array                         $options Session configuration options
     * @param \SessionHandlerInterface|null $handler
     * @param $metaBag                    MetadataBag
     *
     * @return NativeSessionStorage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function native_session_storage(array $options = [], $handler = null, $metaBag = null){
        return new NativeSessionStorage($options, $handler, $metaBag);
    }

    /**
     * integrating session namespaced attribute bag of symfony.
     *
     * @param string $storageKey         Session storage key
     * @param string $namespaceCharacter Namespace character to use in keys
     * @return NamespacedAttributeBag class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function namespaced_attribute_bag($storageKey = '_sf2_attributes', $namespaceCharacter = '/'){
        return new NamespacedAttributeBag($storageKey, $namespaceCharacter);
    }

    /**
     * integrating property access of symfony.
     * @return PropertyAccess class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function property_accessor(){
        return PropertyAccess::createPropertyAccessor();
    }

    /**
     * integrating property access builder of symfony.
     * @return PropertyAccess class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function property_accessor_builder(){
        return PropertyAccess::createPropertyAccessorBuilder();
    }

    /**
     * integrating dom crawler of symfony.
     *
     * @param mixed  $node     A Node to use as the base for the crawling
     * @param string $uri      The current URI
     * @param string $baseHref The base href value
     * @return Crawler class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function dom_crawler($node = null, $uri = null, $baseHref = null){
        return new Crawler($node,$uri,$baseHref);
    }

    /**
     * integrating http_client component of symfony.
     * @return HttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function http_client(){
        return new HttpClient();
    }

    /**
     * integrating native_http_client component of symfony.
     * @param array $defaultOptions      The current URI
     * @param int $maxHostConnections      The current URI
     * @return NativeHttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function native_http_client($defaultOptions = [], $maxHostConnections = 6){
        return new NativeHttpClient($defaultOptions,$maxHostConnections);
    }

    /**
     * integrating curl_http_client component of symfony.
     * @param array $defaultOptions      options config
     * @param int $maxHostConnections    maximum host connections
     * @param int $maxPendingPushes      maximum pending pushes
     * @return CurlHttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function curl_http_client(array $defaultOptions = [], $maxHostConnections = 6, $maxPendingPushes = 50){
        return new CurlHttpClient($defaultOptions,$maxHostConnections,$maxPendingPushes);
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
     * @return CachingHttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function caching_http_client(array $client = [], $store = 6, $defaultOptions = []){
        return new CachingHttpClient($client, $store, $defaultOptions);
    }

    /**
     * integrating scoping_http_client component of symfony.
     * Auto-configure the default options based on the requested URL.
     *
     * @param array $client      host client config
     * @param array $defaultOptionsByRegexp      regular exp default options
     * @param null $defaultRegexp      default regex
     * @return ScopingHttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function scoping_http_client($client = [], $defaultOptionsByRegexp = [], $defaultRegexp = null){
        return new ScopingHttpClient($client,$defaultOptionsByRegexp,$defaultRegexp);
    }

    /**
     * integrating mock_http_client component of symfony.
     * A test-friendly HttpClient that doesn't make actual HTTP requests.
     *
     * @param callable|ResponseInterface|ResponseInterface[]|iterable|null $responseFactory
     * @param null $baseUri
     * @return MockHttpClient class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mock_http_client($responseFactory = null, $baseUri = null){
        return new MockHttpClient($responseFactory,$baseUri);
    }

    /**
     * integrating mock_response component of symfony.
     * @param string|string[]|iterable $body The response body as a string or an iterable of strings,
     *                                       yielding an empty string simulates a timeout,
     *                                       exceptions are turned to TransportException
     * @param array $info
     * @return MockResponse class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mock_response($body = '', array $info = []){
        return new MockResponse($body,$info);
    }

    /**
     * integrating kernel of symfony.
     *
     * @param null $root
     * @return Store class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function store($root=null){
        return new Store($root);
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
     * @return SmtpTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_transport($options = null){
        return new SmtpTransport($options);
    }

    /**
     * integrating mailer/smtp-transport-option method component of zend.
     *
     * @param array $options      smtp options config
     * @return SmtpOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_options(array $options = []){
        return new SmtpOptions($options);
    }

    /**
     * integrating mailer/send-mail-transport method component of zend.
     *
     * @param string $parameters
     * @return SendmailTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function send_mail_transport($parameters = null){
        return new SendmailTransport($parameters);
    }

    /**
     * integrating mailer/smtp protocol method component of zend.
     *
     * @param string $host      local host ip
     * @param string $port      local host port
     * @param array $config    local config data
     * @return SmtpProtocol class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_protocol($host = '127.0.0.1', $port = null, array $config = null){
        return new SmtpProtocol($host,$port,$config);
    }

    /**
     * integrating mailer/smtp plugin manager method component of zend.
     *
     * @return SmtpPluginManager class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_plugin_manager(){
        return new SmtpPluginManager();
    }

    /**
     * integrating mailer/file-transport method component of zend.
     *
     * @param FileOptions $options
     * @return FileTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_transport(FileOptions $options = null){
        return new FileTransport($options);
    }

    /**
     * integrating mailer/file transport option method component of zend.
     *
     * @param array $options
     * @return FileOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_options(array $options = null){
        return new FileOptions($options);
    }

    /**
     * integrating mailer/inMemory-transport method component of zend.
     *
     * @return InMemoryTransport class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function in_memory_transport(){
        return new InMemoryTransport();
    }

    /**
     * integrating mailer/mime-message method component of zend.
     *
     * @return MimeMessage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_message(){
        return new MimeMessage();
    }

    /**
     * integrating mailer/mime method component of zend.
     *
     * @param string $boundary
     * @return Mime class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime($boundary = null){
        return new Mime($boundary);
    }

    /**
     * integrating mailer/mime-part method component of zend.
     *
     * @param string $content
     * @return MimePart class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_part($content = ''){
        return new MimePart($content);
    }

    /**
     * integrating mailer/plain auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return Plain class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function plain_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Plain($host, $port, $config);
    }

    /**
     * integrating mailer/login auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return Login class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function login_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Login($host, $port, $config);
    }

    /**
     * integrating mailer/crammd5 auth component of zend.
     *
     * @param string $host
     * @param null $port
     * @param null $config
     * @return Crammd5 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function crammd5_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Crammd5($host, $port, $config);
    }

    /**
     * integrating pop3 mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return Pop3 class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function pop3(array $params=[]){
        return new Pop3($params);
    }

    /**
     * integrating mbox mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return Mbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox(array $params=[]){
        return new Mbox($params);
    }

    /**
     * integrating maildir mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return Maildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir(array $params=[]){
        return new Maildir($params);
    }

    /**
     * integrating imap mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @return Imap class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function imap(array $params=[]){
        return new Imap($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @return MailStorage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mail_storage(){
        return new MailStorage();
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        mbox folder
     * @return Mbox class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox_folder(array $params = []){
        return new MailFolder\Mbox($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        maildir folder
     * @return Maildir class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir_folder(array $params = []){
        return new MailFolder\Maildir($params);
    }

    /**
     * integrating css selector component of symfony.
     * @param bool $html Whether HTML support should be enabled. Disable it for XML documents
     * @return CssSelectorConverter class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function css_selector($html = true){
        return new CssSelectorConverter($html);
    }

    /**
     * integrating serializer component of symfony.
     * @param array $normalizers
     * @param array $encoders
     * @return Serializer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function serializer(array $normalizers = [], array $encoders = []){
        return new Serializer($normalizers, $encoders);
    }

    /**
     * integrating serializer (json encoder).
     * @param null $encodingImpl
     * @param null $decodingImpl
     * @return JsonEncoder class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function json_encoder($encodingImpl = null, $decodingImpl = null){
        return new JsonEncoder($encodingImpl, $decodingImpl);
    }

    /**
     * integrating serializer (xml encoder).
     * @param array $defaultContext
     * @param null $loadOptions
     * @param array $decoderIgnoredNodeTypes
     * @param array $encoderIgnoredNodeTypes
     * @return XmlEncoder class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function xml_encoder($defaultContext = [], $loadOptions = null, array $decoderIgnoredNodeTypes = [XML_PI_NODE, XML_COMMENT_NODE], array $encoderIgnoredNodeTypes = []){
        return new XmlEncoder($defaultContext, $loadOptions, $decoderIgnoredNodeTypes, $encoderIgnoredNodeTypes);
    }

    /**
     * integrating serializer (yaml encoder).
     * @param null $dumper
     * @param null $parser
     * @param array $defaultContext
     * @return YamlEncoder class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function yaml_encoder($dumper = null, $parser = null, array $defaultContext = []){
        return new YamlEncoder($dumper, $parser, $defaultContext);
    }

    /**
     * integrating serializer (csv encoder).
     * @param array $defaultContext
     * @param string $enclosure
     * @param string $escapeChar
     * @param string $keySeparator
     * @param boolean $escapeFormulas
     * @return CsvEncoder class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function csv_encoder($defaultContext = [], $enclosure = '"', $escapeChar = '\\', $keySeparator = '.', $escapeFormulas = false){
        return new CsvEncoder($defaultContext, $enclosure, $escapeChar, $keySeparator, $escapeFormulas);
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
     * @return ObjectNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function object_normalizer($classMetadataFactory = null, $nameConverter = null, $propertyAccessor = null, $propertyTypeExtractor = null, $classDiscriminatorResolver = null, callable $objectClassResolver = null, array $defaultContext = []){
        return new ObjectNormalizer($classMetadataFactory, $nameConverter, $propertyAccessor, $propertyTypeExtractor, $classDiscriminatorResolver, $objectClassResolver, $defaultContext);
    }

    /**
     * integrating serializer (get and set method normalizer).
     *
     * @return GetSetMethodNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function get_set_method_normalizer(){
        return new GetSetMethodNormalizer();
    }

    /**
     * integrating serializer (property normalizer).
     *
     * @return PropertyNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function property_normalizer(){
        return new PropertyNormalizer();
    }

    /**
     * integrating serializer (json serializable normalizer).
     *
     * @return JsonSerializableNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function json_serializable_normalizer(){
        return new JsonSerializableNormalizer();
    }

    /**
     * integrating serializer (datetime normalizer).
     *
     * @return DateTimeNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function datetime_normalizer(){
        return new DateTimeNormalizer();
    }

    /**
     * integrating serializer (data uri normalizer).
     *
     * @return DataUriNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function data_uri_normalizer(){
        return new DataUriNormalizer();
    }

    /**
     * integrating serializer (date interval normalizer).
     *
     * @return DateIntervalNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function date_interval_normalizer(){
        return new DateIntervalNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return ConstraintViolationListNormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function constraint_violation_list_normalizer(){
        return new ConstraintViolationListNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @return ArrayDenormalizer class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function array_denormalizer(){
        return new ArrayDenormalizer();
    }

    /**
     * integrating serializer (metadata factory).
     *
     * @return ClassMetadataFactory class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function class_metadata_factory($loader){
        return new ClassMetadataFactory($loader);
    }

    /**
     * integrating serializer (annotation loader).
     * @param string $reader
     * @return AnnotationLoader class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function annotation_loader($reader=null){
        return new AnnotationLoader($reader);
    }

    /**
     * integrating serializer (yaml file loader).
     * @param string $classMetadata
     * @return YamlFileLoader class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function yaml_file_loader($classMetadata=null){
        return new YamlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (xml file loader).
     * @param null $classMetadata
     * @return XmlFileLoader class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function xml_file_loader($classMetadata=null){
        return new XmlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (annotation reader).
     * @param null $parser
     * @return AnnotationReader class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function annotation_reader($parser = null){
        return new AnnotationReader($parser);
    }

    /**
     * integrating serializer (camelcase converter).
     * @param array $attributes
     * @param boolean $lowerCamelCase
     * @return CamelCaseToSnakeCaseNameConverter class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function camelcase_to_snakecase_name_converter(array $attributes = null, $lowerCamelCase = true){
        return new CamelCaseToSnakeCaseNameConverter($attributes, $lowerCamelCase);
    }

    /**
     * integrating serializer (metadata aware name converter).
     * @param null $metadataFactory
     * @param null $fallbackNameConverter
     * @return MetadataAwareNameConverter class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function metadata_aware_name_converter($metadataFactory = null, $fallbackNameConverter = null){
        return new MetadataAwareNameConverter($metadataFactory, $fallbackNameConverter);
    }

    /**
     * integrating serializer (DiscriminatorMap Annotation).
     * @param array $data
     * @return DiscriminatorMap class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function discriminator_map(array $data){
        return new DiscriminatorMap($data);
    }

    /**
     * integrating serializer (groups Annotation).
     * @param array $data
     * @return Groups class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function groups(array $data){
        return new Groups($data);
    }

    /**
     * integrating serializer (MaxDepth Annotation).
     * @param array $data
     * @return MaxDepth class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function max_depth(array $data){
        return new MaxDepth($data);
    }

    /**
     * integrating serializer (serialized_name Annotation).
     * @param array $data
     * @return SerializedName class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function serialized_name(array $data){
        return new SerializedName($data);
    }

    /**
     * integrating data validator.
     *
     * @return Validator class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function validator(){
        return new Validator();
    }

    /**
     * integrating stopwatch component of symfony.
     *
     * @return Stopwatch class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function stopwatch(){
        return new Stopwatch();
    }

    /**
     * integrating DotEnv component of symfony.
     *
     * @return Dotenv class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function dot_env(){
        return new Dotenv();
    }

    /**
     * integrating finder component of symfony.
     *
     * @return Finder class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function finder(){
        return new Finder();
    }

    /**
     * integrating expression language component of symfony.
     *
     * @return ExpressionLanguage class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function expression_language(){
        return new ExpressionLanguage();
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function ftp_adapter($directory, $host, $options = array()){
        return new OctaFtpAdapter($directory, $host, $options);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * in memory adapter
     * @param array $files
     * @return OctaInMemory class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function aws_s3_adapter($service, $bucket, array $options = [], $detectContentType = false){
        return new OctaAwsS3Adapter($service, $bucket, $options, $detectContentType);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * zip adapter
     * @param null $zipFile
     * @return OctaZipAdapter class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function zip_adapter($zipFile = null){
        return new OctaZipAdapter($zipFile);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * instantiate phpseclib connection
     * @param string $host
     * @param int $port
     * @return SFTP class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
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
    public function phpseclib_adapter($sftp, $distantDirectory = null, $createDirectoryIfDoesntExist = false){
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function google_cloud_storage_adapter($service, $bucket, array $options = array(), $detectContentType = false){
        return new OctaGoogleCloudStorage($service, $bucket, $options, $detectContentType);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * local filesystem client
     * @param null $data contains local adapter settings
     * @return OctaFilesystem class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function stream_mode($mode=null){
        return new OctaStreamMode($mode);
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaStreamWrapper class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function stream_wrapper(){
        return new OctaStreamWrapper();
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaFilesystemMap class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function filesystem_map(){
        return new OctaFilesystemMap();
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * google-api adapter
     * @param array $config
     * @return Google_Client class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function google_client(array $config = array()){
        return new \Google_Client($config);
    }

    public function google_service_books($client=null){
        return new \Google_Service_Books($client);
    }

}