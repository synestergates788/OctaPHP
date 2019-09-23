<?php
namespace OctaPHP;
use OctaPHP\Traits\Controller\CoreController;
use OctaPHP\Traits\Crypt\Crypt;
use OctaPHP\Traits\Auth\Authentication;
use OctaPHP\Traits\Crawler\Crawler;
use OctaPHP\Traits\CssSelector\CssSelector;
use OctaPHP\Traits\DotEnv\DotEnv;
use OctaPHP\Traits\Encoder\Encoder;
use OctaPHP\Traits\ExpressionLanguage\ExpressionLanguage;
use OctaPHP\Traits\FileSystem\FileSystem;
use OctaPHP\Traits\Finder\Finder;
use OctaPHP\Traits\HttpClient\HttpClient;
use OctaPHP\Traits\Mailer\Mailer;
use OctaPHP\Traits\PropertyAccess\PropertyAccess;
use OctaPHP\Traits\Serializer\Serializer;
use OctaPHP\Traits\Session\Session;
use OctaPHP\Traits\Stopwatch\Stopwatch;
use System\Database\Database;
use System\Database\ActiveRecord;
use OctaPHP\Traits\DataValidator\DataValidator;
use OctaPHP\Traits\FormValidator\FormValidator;
use OctaPHP\Traits\Google\Captcha\Captcha;
use OctaPHP\Traits\Google\Api\Api;

class Controller{
    use Authentication,
        CoreController,
        Crawler,
        Crypt,
        CssSelector,
        DotEnv,
        Encoder,
        ExpressionLanguage,
        FileSystem,
        Finder,
        HttpClient,
        Mailer,
        PropertyAccess,
        Serializer,
        Session,
        Stopwatch,
        DataValidator,
        FormValidator,
        Captcha,
        Api{
        CoreController::__construct as public __OctaControllerConstruct;
    }

    public function __construct()
    {
        $this->__OctaControllerConstruct();
        $database = new Database($this->config);
        $database->connect();
        $this->bean = $database->bean();
        $this->octa = new ActiveRecord($this->bean);
    }
}