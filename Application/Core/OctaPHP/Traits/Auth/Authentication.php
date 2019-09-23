<?php
namespace OctaPHP\Traits\Auth;

/**
 * ##################################
 * ###START OF Authentication########
 * ##################################
 *
 * Initialize authentication class.
 */
use Zend\Authentication\AuthenticationService as OctaAuthenticationService;

trait Authentication{
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
}