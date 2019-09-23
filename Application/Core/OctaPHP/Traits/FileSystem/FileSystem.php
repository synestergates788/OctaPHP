<?php
namespace OctaPHP\Traits\FileSystem;

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
use Gaufrette\Adapter\PhpseclibSftp;
use phpseclib\Net\SFTP;

trait FileSystem{

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
    public function localAdapter($directory, $create = false, $mode = 0777){
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
    public function cacheAdapter($source, $cache, $ttl = 0, $serializeCache = null){
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
    public function ftpAdapter($directory, $host, $options = array()){
        return new OctaFtpAdapter($directory, $host, $options);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * in memory adapter
     * @param array $files
     * @return OctaInMemory class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function inMemoryAdapter(array $files = array()){
        return new OctaInMemory($files);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * aws s3 adapter
     * @param null $service
     * @param string $bucket
     * @param array $options
     * @param boolean $detectContentType
     * @return OctaAwsS3Adapter class
     * @author Michael Dowling <mtdowling@gmail.com>
     */
    public function awsS3Adapter($service = null, $bucket, array $options = [], $detectContentType = false){
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
    public function zipAdapter($zipFile = null){
        return new OctaZipAdapter($zipFile);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * instantiate phpseclib connection
     * @param string $host
     * @param int $port
     * @return SFTP class
     * @author Jim Wigginton <terrafrost@php.net>
     */
    public function phpSeclibConnection($host = 'localhost', $port = 22){
        return new SFTP($host, $port);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * phpseclib adapter
     * @param null $sftp
     * @param null $distantDirectory
     * @param boolean $createDirectoryIfDoesntExist
     * @return PhpseclibSftp class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function phpSeclibAdapter($sftp = null, $distantDirectory = null, $createDirectoryIfDoesntExist = false){
        return new PhpseclibSftp($sftp, $distantDirectory, $createDirectoryIfDoesntExist);
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
    public function googleCloudStorageAdapter($service, $bucket, array $options = array(), $detectContentType = false){
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
    public function fileSystem($data=null){
        return new OctaFilesystem($data);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * aws s3 filesystem client
     * @param array $args contains local adapter settings
     * @return OctaS3Client class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function awsS3Client(array $args){
        return new OctaS3Client($args);
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @param null $mode
     * @return OctaStreamMode class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function streamMode($mode=null){
        return new OctaStreamMode($mode);
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaStreamWrapper class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     * @author Leszek Prabucki <leszek.prabucki@gmail.com>
     */
    public function streamWrapper(){
        return new OctaStreamWrapper();
    }

    /**
     * integrating filesystem abstraction wrapper of gaufrette.
     * @return OctaFilesystemMap class
     * @author Antoine Hérault <antoine.herault@gmail.com>
     */
    public function fileSystemMap(){
        return new OctaFilesystemMap();
    }

    /**
     * @param string $connectionString
     * @return OctaBlobProxyFactory class
     * @author Luciano Mammino <lmammino@oryzone.com>
     */
    public function blobProxyFactory($connectionString){
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
    public function azureBlobStorage($blobProxyFactory, $containerName = null, $create = false, $detectContentType = true){
        return new OctaAzureBlobStorage($blobProxyFactory, $containerName, $create, $detectContentType);
    }

    /**
     * Optional parameters for createContainer API
     * @return OctaCreateContainerOptions class
     * @author Azure Storage PHP SDK <dmsh@microsoft.com>
     */
    public function createContainerOptions(){
        return new OctaCreateContainerOptions();
    }
}