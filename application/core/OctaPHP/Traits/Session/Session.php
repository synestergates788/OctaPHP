<?php
namespace OctaPHP\Traits\Session;

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

trait Session{

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
    public function attributeBag($storageKey = '_sf2_attributes'){
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
    public function nativeSessionStorage(array $options = [], $handler = null, $metaBag = null){
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
    public function namespacedAttributeBag($storageKey = '_sf2_attributes', $namespaceCharacter = '/'){
        return new OctaNamespacedAttributeBag($storageKey, $namespaceCharacter);
    }
}