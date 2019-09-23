<?php
namespace OctaPHP\Traits\DotEnv;

/**
 * Initialize Dotenv class.
 * Manages .env files.
 */
use Symfony\Component\Dotenv\Dotenv as OctaDotenv;

trait DotEnv{

    /**
     * integrating DotEnv component of symfony.
     *
     * @return OctaDotenv class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function dotEnv(){
        return new OctaDotenv();
    }
}