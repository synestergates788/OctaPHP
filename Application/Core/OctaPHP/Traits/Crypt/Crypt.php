<?php
namespace OctaPHP\Traits\Crypt;

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

trait Crypt {
    /**
     * block cipher Factory
     *
     * @param  string      $adapter
     * @param  array       $options
     * @return OctaBlockCipher class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function blockCipher($adapter, $options = []) {
        return OctaBlockCipher::factory($adapter, $options);
    }

    /**
     * integrating block cipher | openssl of zend
     * @param array $options
     * @return OctaOpenssl class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function openSSL($options = []) {
        return new OctaOpenssl($options);
    }

    /**
     * integrating file cipher of zend
     * @return OctaFileCipher class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function fileCipher() {
        return new OctaFileCipher();
    }

    /**
     * integrating hybrid cipher of zend
     * @return OctaHybrid class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function hybrid() {
        return new OctaHybrid();
    }

    /**
     * integrating RsaOptions for hybrid cipher component of zend
     * @param  array|null $options
     * @return OctaRsaOptions class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function rsaOptions($options = null) {
        return new OctaRsaOptions($options);
    }

    /**
     * integrating Rsa component of zend
     * @param  array|null $options
     * @return OctaRsa class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function rsa($options = null) {
        return new OctaRsa($options);
    }

    /**
     * integrating bcrypt cipher of zend
     * @param  array|null $options
     * @return OctaBcrypt class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function bCrypt($options = []) {
        return new OctaBcrypt($options);
    }

    /**
     * integrating apache cipher of zend
     * @param  array|null $options
     * @return OctaApache class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function apache($options = []) {
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
    public function diffieHellman($prime, $generator, $privateKey = null, $privateKeyFormat = self::FORMAT_NUMBER) {
        return new OctaDiffieHellman($prime, $generator, $privateKey, $privateKeyFormat);
    }
}