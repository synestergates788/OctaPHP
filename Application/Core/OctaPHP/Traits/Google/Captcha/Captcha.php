<?php
namespace OctaPHP\Traits\Google\Captcha;
use ReCaptcha\ReCaptcha as OctaReCaptcha;

trait Captcha {
    /**
     * integrating botdetect component.
     * @param string $secret
     * @param null $requestMethod
     * @return OctaReCaptcha class
     * @author Google Inc.
     */
    public function googleCaptcha($secret, $requestMethod = null) {
        return new OctaReCaptcha($secret, $requestMethod);
    }
}