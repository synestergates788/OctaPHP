<?php
$loader = \Twig\Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'application'.DS.'views');
$view = new \Twig\Environment($loader);
$GLOBALS['template'] = $view;

use Symfony\Component\Dotenv\Dotenv;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Symfony\Contracts\Cache\ItemInterface;

use Symfony\Component\CssSelector\CssSelectorConverter;

use Symfony\Component\DomCrawler\Crawler;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
$GLOBALS['filesystem'] = new Filesystem();

use Symfony\Component\Finder\Finder;

use Symfony\Component\HttpFoundation\Request;
$GLOBALS['request'] = Request::createFromGlobals();

use Symfony\Component\PropertyAccess\PropertyAccess;
$GLOBALS['property_accessor'] = PropertyAccess::createPropertyAccessor();
$GLOBALS['property_accessor_builder'] = PropertyAccess::createPropertyAccessorBuilder();

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
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
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
use Gaufrette\Filesystem as OctaFilesystem;
use Gaufrette\Adapter\Local as LocalAdapter;
use Aws\S3\S3Client;
use Gaufrette\Adapter\AwsS3 as AwsS3Adapter;
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
 * start of debug*/
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
    protected $db;
    protected $hm;
    protected $am;
    protected $template;
    protected $assets;
    protected $input;
    protected $bean;
    protected $octa;

    protected $http_client;
    protected $native_http_client;
    protected $curl_http_client;
    protected $request;
    protected $property_accessor;
    protected $property_accessor_builder;
    protected $session;
    protected $attribute_bag;
    protected $native_session_storage;
    protected $namespaced_attribute_bag;
    protected $filesystem;
    protected $local_adapter;
    protected $email;
    protected $headers;
    protected $text_part;

    protected $form_validation;

    public function __construct(){
        $this->assets($GLOBALS['template'],assets_config);
        $this->parse_library(libraries);
        $this->parse_helpers(helpers);
        $this->input = new Input();
        $this->bean = new R();
        $this->octa = new octa_redbean(DB,$this->bean);

        $this->session();
        $this->attribute_bag();
        $this->native_session_storage();
        $this->namespaced_attribute_bag();

        /*start of httpclient*/
        $this->http_client();
        $this->native_http_client();
        $this->curl_http_client();

        /*start of filesystem*/
        if(local_adapter_status){
            $this->local_adapter = $this->local_adapter(local_adapter); #ROOT.DS.'application/var/media'
            $this->filesystem = $this->file_system($this->local_adapter); #$this->local_adapter
        }

        $this->request = $GLOBALS['request'];
        $this->property_accessor = $GLOBALS['property_accessor'];
        $this->property_accessor_builder = $GLOBALS['property_accessor_builder'];
    }

    /**
     * autoload model with/without alias.
     *
     * @param string $modelName      model name
     * @param string $alias      model alias
     *
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function session($NativeSessionStorage=null,$NamespacedAttributeBag=null){
        $this->session = new Session($NativeSessionStorage,$NamespacedAttributeBag);
    }

    /**
     * integrating session attribute bag of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function attribute_bag(){
        $this->attribute_bag = new AttributeBag();
    }

    /**
     * integrating session storage of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function native_session_storage(){
        $this->native_session_storage = new NativeSessionStorage();
    }

    /**
     * integrating session namespaced attribute bag of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function namespaced_attribute_bag(){
        $this->namespaced_attribute_bag = new NamespacedAttributeBag();
    }

    /**
     * integrating dom crawler of symfony.
     *
     * @param mixed  $node     A Node to use as the base for the crawling
     * @param string $uri      The current URI
     * @param string $baseHref The base href value
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function dom_crawler($node = null, $uri = null, $baseHref = null){
        return new Crawler($node,$uri,$baseHref);
    }

    /*
     * start of filesystem using gaufrete*/
    public function file_system($data=null){
        return new OctaFilesystem($data);
    }

    public function local_adapter($data=null){
        return new LocalAdapter($data);
    }

    /**
     * integrating http_client component of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function http_client(){
        return new HttpClient();
    }

    /**
     * integrating native_http_client component of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function native_http_client($defaultOptions = [], $maxHostConnections = 6){
        return new NativeHttpClient($defaultOptions,$maxHostConnections);
    }

    /**
     * integrating curl_http_client component of symfony.
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
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function caching_http_client($client = [], $store = 6, $defaultOptions = []){
        return new CachingHttpClient($client,$store,$defaultOptions);
    }

    /**
     * integrating scoping_http_client component of symfony.
     * Auto-configure the default options based on the requested URL.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function scoping_http_client($client = [], $defaultOptionsByRegexp = [], $defaultRegexp = null){
        return new ScopingHttpClient($client,$defaultOptionsByRegexp,$defaultRegexp);
    }

    /**
     * integrating mock_http_client component of symfony.
     * A test-friendly HttpClient that doesn't make actual HTTP requests.
     * @param callable|ResponseInterface|ResponseInterface[]|iterable|null $responseFactory
     *
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
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mock_response($body = '', array $info = []){
        return new MockResponse($body,$info);
    }

    /**
     * integrating kernel of symfony.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function store($root=null){
        return new Store($root);
    }

    /**
     * integrating MIME (email) component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function message(){
        return new OctaMailMessage();
    }

    /**
     * integrating mailer/transport method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function transport($parameters = null){
        return new Mail\Transport\Sendmail($parameters);
    }

    /**
     * integrating mailer/smtp-transport method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_transport($options = null){
        return new SmtpTransport($options);
    }

    /**
     * integrating mailer/smtp-transport-option method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_options(array $options = []){
        return new SmtpOptions($options);
    }

    /**
     * integrating mailer/send-mail-transport method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function send_mail_transport($parameters = null){
        return new SendmailTransport($parameters);
    }

    /**
     * integrating mailer/smtp protocol method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_protocol($host = '127.0.0.1', $port = null, array $config = null){
        return new SmtpProtocol($host,$port,$config);
    }

    /**
     * integrating mailer/smtp plugin manager method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function smtp_plugin_manager(){
        return new SmtpPluginManager();
    }

    /**
     * integrating mailer/file-transport method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_transport(FileOptions $options = null){
        return new FileTransport($options);
    }

    /**
     * integrating mailer/file transport option method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function file_options(array $options = null){
        return new FileOptions($options);
    }

    /**
     * integrating mailer/inMemory-transport method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function in_memory_transport(){
        return new InMemoryTransport();
    }

    /**
     * integrating mailer/mime-message method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_message(){
        return new MimeMessage();
    }

    /**
     * integrating mailer/mime method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime($boundary = null){
        return new Mime($boundary);
    }

    /**
     * integrating mailer/mime-part method component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mime_part($content = ''){
        return new MimePart($content);
    }

    /**
     * integrating mailer/plain auth component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function plain_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Plain($host, $port, $config);
    }

    /**
     * integrating mailer/login auth component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function login_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Login($host, $port, $config);
    }

    /**
     * integrating mailer/crammd5 auth component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function crammd5_auth($host = '127.0.0.1', $port = null, $config = null){
        return new Crammd5($host, $port, $config);
    }

    /**
     * integrating pop3 mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function pop3(array $params=[]){
        return new Pop3($params);
    }

    /**
     * integrating mbox mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox(array $params=[]){
        return new Mbox($params);
    }

    /**
     * integrating maildir mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir(array $params=[]){
        return new Maildir($params);
    }

    /**
     * integrating imap mail storage component of zend.
     * @param  array $params mail reader specific parameters
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function imap(array $params=[]){
        return new Imap($params);
    }

    /**
     * integrating mail_storage component of zend.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mail_storage(){
        return new MailStorage();
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        mbox folder
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function mbox_folder(array $params = []){
        return new MailFolder\Mbox($params);
    }

    /**
     * integrating mail_storage component of zend.
     * @param  array $params        maildir folder
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function maildir_folder(array $params = []){
        return new MailFolder\Maildir($params);
    }

    /**
     * integrating css selector component of symfony.
     * @param bool $html Whether HTML support should be enabled. Disable it for XML documents
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function css_selector($html = true){
        return new CssSelectorConverter($html);
    }

    /**
     * integrating serializer component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function serializer(array $normalizers = [], array $encoders = []){
        return new Serializer($normalizers, $encoders);
    }

    /**
     * integrating serializer (json encoder).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function json_encoder($encodingImpl = null, $decodingImpl = null){
        return new JsonEncoder($encodingImpl, $decodingImpl);
    }

    /**
     * integrating serializer (xml encoder).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function xml_encoder($defaultContext = [], $loadOptions = null, array $decoderIgnoredNodeTypes = [XML_PI_NODE, XML_COMMENT_NODE], array $encoderIgnoredNodeTypes = []){
        return new XmlEncoder($defaultContext, $loadOptions, $decoderIgnoredNodeTypes, $encoderIgnoredNodeTypes);
    }

    /**
     * integrating serializer (yaml encoder).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function yaml_encoder($dumper = null, $parser = null, array $defaultContext = []){
        return new YamlEncoder($dumper, $parser, $defaultContext);
    }

    /**
     * integrating serializer (csv encoder).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function csv_encoder($defaultContext = [], $enclosure = '"', $escapeChar = '\\', $keySeparator = '.', $escapeFormulas = false){
        return new CsvEncoder($defaultContext, $enclosure, $escapeChar, $keySeparator, $escapeFormulas);
    }

    /**
     * integrating serializer (object normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function object_normalizer($classMetadataFactory = null, $nameConverter = null, $propertyAccessor = null, $propertyTypeExtractor = null, $classDiscriminatorResolver = null, callable $objectClassResolver = null, array $defaultContext = []){
        return new ObjectNormalizer($classMetadataFactory, $nameConverter, $propertyAccessor, $propertyTypeExtractor, $classDiscriminatorResolver, $objectClassResolver, $defaultContext);
    }

    /**
     * integrating serializer (get and set method normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function get_set_method_normalizer(){
        return new GetSetMethodNormalizer();
    }

    /**
     * integrating serializer (property normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function property_normalizer(){
        return new PropertyNormalizer();
    }

    /**
     * integrating serializer (json serializable normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function json_serializable_normalizer(){
        return new JsonSerializableNormalizer();
    }

    /**
     * integrating serializer (datetime normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function datetime_normalizer(){
        return new DateTimeNormalizer();
    }

    /**
     * integrating serializer (data uri normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function data_uri_normalizer(){
        return new DataUriNormalizer();
    }

    /**
     * integrating serializer (date interval normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function date_interval_normalizer(){
        return new DateIntervalNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function constraint_violation_list_normalizer(){
        return new ConstraintViolationListNormalizer();
    }

    /**
     * integrating serializer (constraint violationList normalizer).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function array_denormalizer(){
        return new ArrayDenormalizer();
    }

    /**
     * integrating serializer (metadata factory).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function class_metadata_factory($loader){
        return new ClassMetadataFactory($loader);
    }

    /**
     * integrating serializer (annotation loader).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function annotation_loader($reader=null){
        return new AnnotationLoader($reader);
    }

    /**
     * integrating serializer (yaml file loader).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function yaml_file_loader($classMetadata=null){
        return new YamlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (xml file loader).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function xml_file_loader($classMetadata=null){
        return new XmlFileLoader($classMetadata);
    }

    /**
     * integrating serializer (annotation reader).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function annotation_reader($parser = null){
        return new AnnotationReader($parser);
    }

    /**
     * integrating serializer (camelcase converter).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function camelcase_to_snakecase_name_converter(array $attributes = null, $lowerCamelCase = true){
        return new CamelCaseToSnakeCaseNameConverter($attributes, $lowerCamelCase);
    }

    /**
     * integrating serializer (metadata aware name converter).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function metadata_aware_name_converter($metadataFactory = null, $fallbackNameConverter = null){
        return new MetadataAwareNameConverter($metadataFactory, $fallbackNameConverter);
    }

    /**
     * integrating serializer (DiscriminatorMap Annotation).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function discriminator_map(array $data){
        return new DiscriminatorMap($data);
    }

    /**
     * integrating serializer (groups Annotation).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function groups(array $data){
        return new Groups($data);
    }

    /**
     * integrating serializer (MaxDepth Annotation).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function max_depth(array $data){
        return new MaxDepth($data);
    }

    /**
     * integrating serializer (serialized_name Annotation).
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function serialized_name(array $data){
        return new SerializedName($data);
    }

    /**
     * integrating data validator.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function validator(){
        return new Validator();
    }

    /**
     * integrating stopwatch component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function stopwatch(){
        return new Stopwatch();
    }

    /**
     * integrating DotEnv component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function dot_env(){
        return new Dotenv();
    }

    /**
     * integrating finder component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function finder(){
        return new Finder();
    }

    /**
     * integrating expression language component of symfony.
     *
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function expression_language(){
        return new ExpressionLanguage();
    }
}