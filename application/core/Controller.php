<?php
$loader = \Twig\Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'application'.DS.'views');
$view = new \Twig\Environment($loader);
$GLOBALS['template'] = $view;

use Symfony\Component\Dotenv\Dotenv;
$GLOBALS['dot_env'] = new Dotenv();

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
$GLOBALS['cache'] = new FilesystemAdapter();

use Symfony\Component\CssSelector\CssSelectorConverter;
$GLOBALS['converter'] = new CssSelectorConverter();

use Symfony\Component\DomCrawler\Crawler;
$GLOBALS['dom_crawler'] = new Crawler();

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
$GLOBALS['expression_language'] = new ExpressionLanguage();

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
$GLOBALS['filesystem'] = new Filesystem();

use Symfony\Component\Finder\Finder;
$GLOBALS['finder'] = new Finder();

use Symfony\Component\HttpFoundation\Request;
$GLOBALS['request'] = Request::createFromGlobals();

use Symfony\Component\PropertyAccess\PropertyAccess;
$GLOBALS['property_accessor'] = PropertyAccess::createPropertyAccessor();

use Symfony\Component\Stopwatch\Stopwatch;
$GLOBALS['stopwatch'] = new Stopwatch();

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
$GLOBALS['http_client'] = HttpClient::create();
$GLOBALS['native_http_client'] = new NativeHttpClient();
$GLOBALS['curl_http_client'] = new CurlHttpClient();

use Symfony\Component\Debug\Debug;
Debug::enable();
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();
use Symfony\Component\Debug\DebugClassLoader;
DebugClassLoader::enable();

/*serializer*/
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
$encoders = [new XmlEncoder(), new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];
$GLOBALS['serializer'] = new Serializer($normalizers, $encoders);

/*validator*/
/*use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

$GLOBALS['validator'] = Validation::createValidator();
$GLOBALS['length'] = new Length();
$GLOBALS['not_blank'] = new NotBlank();*/

class Controller{

    protected $view;
    protected $model;
    protected $session;
    protected $db;
    protected $hm;
    protected $am;
    protected $template;
    protected $assets;
    protected $input;
    protected $bean;
    protected $octa;
    protected $dot_env;
    protected $cache;
    protected $css_selector;
    protected $dom_crawler;
    protected $expression_language;
    protected $filesystem;
    protected $finder;
    protected $http_client;
    protected $native_http_client;
    protected $curl_http_client;
    protected $request;
    protected $property_accessor;
    protected $serializer;
    protected $stopwatch;

    /*protected $validator;
    protected $length;
    protected $not_blank;*/

    public function __construct(){
        $this->assets($GLOBALS['template'],assets_config);
        $this->parse_library(libraries);
        $this->parse_helpers(helpers);
        $this->input = new Input();
        $this->bean = new R();
        $this->octa = new octa_redbean(DB,$this->bean);

        $this->dot_env = $GLOBALS['dot_env'];
        $this->cache = $GLOBALS['cache'];
        $this->css_selector = $GLOBALS['converter'];
        $this->dom_crawler = $GLOBALS['dom_crawler'];
        $this->expression_language = $GLOBALS['expression_language'];
        $this->filesystem = $GLOBALS['filesystem'];
        $this->finder = $GLOBALS['finder'];
        $this->http_client = $GLOBALS['http_client'];
        $this->native_http_client = $GLOBALS['native_http_client'];
        $this->curl_http_client = $GLOBALS['curl_http_client'];
        $this->request = $GLOBALS['request'];
        $this->property_accessor = $GLOBALS['property_accessor'];
        $this->serializer = $GLOBALS['serializer'];
        $this->stopwatch = $GLOBALS['stopwatch'];

        /*$this->validator = $GLOBALS['validator'];
        $this->length = $GLOBALS['length'];
        $this->not_blank = $GLOBALS['not_blank'];

        $GLOBALS['length']['asdasd'];*/
        /*$violations = $this->validator->validate('Bernhard', [
            $this->length(['min' => 10]), //
            $this->not_blank,
        ]);*/

        #$this->http_client->create();

        /*$httpClient = HttpClient::create([
            // HTTP Basic authentication with only the username and not a password
            'auth_basic' => ['the-username'],

            // HTTP Basic authentication with a username and a password
            'auth_basic' => ['the-username', 'the-password'],

            // HTTP Bearer authentication (also called token authentication)
            'auth_bearer' => 'the-bearer-token',
        ]);

        $response = $this->http_client->request('GET', 'https://...', [
            // use a different HTTP Basic authentication only for this request
            'auth_basic' => ['the-username', 'the-password'],

            // ...
        ]);*/
    }

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

    public function parse_helpers($helpers){
        new Helpers($helpers);
    }

    public function parse_library($libraries){
        new Libraries($libraries);
    }

    public function session(){
        if(session == true){
            $this->session = new Sessions(session);
        }
    }

    public function view($template_name,$data=[]){
        if($template_name){
            echo $GLOBALS['template']->render($template_name, $data);
        }else{
            include_once(ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_template.php');
        }
    }

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
}