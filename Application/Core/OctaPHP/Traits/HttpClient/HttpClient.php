<?php
namespace OctaPHP\Traits\HttpClient;

/**
 * ##########################
 * ###START OF HTTP CRAWLER##
 * ##########################
 *
 * Initialize HttpClient class.
 * A factory to instantiate the best possible HTTP client for the runtime.
 */
use Symfony\Component\HttpClient\HttpClient as OctaHttpClient;

/**
 * Initialize CurlHttpClient class.
 * A performant implementation of the HttpClientInterface contracts based on the curl extension.
 * This provides fully concurrent HTTP requests, with transparent
 * HTTP/2 push when a curl version that supports it is installed.
 */
use Symfony\Component\HttpClient\CurlHttpClient as OctaCurlHttpClient;

/**
 * Initialize NativeHttpClient class.
 * A portable implementation of the HttpClientInterface contracts based on PHP stream wrappers.
 *
 * PHP stream wrappers are able to fetch response bodies concurrently,
 * but each request is opened synchronously.
 */
use Symfony\Component\HttpClient\NativeHttpClient as OctaNativeHttpClient;

/**
 * Initialize CachingHttpClient class.
 * Adds caching on top of an HTTP client.
 *
 * The implementation buffers responses in memory and doesn't stream directly from the network.
 * You can disable/enable this layer by setting option "no_cache" under "extra" to true/false.
 * By default, caching is enabled unless the "buffer" option is set to false.
 */
use Symfony\Component\HttpClient\CachingHttpClient as OctaCachingHttpClient;

/**
 * Initialize ScopingHttpClient class.
 * Auto-configure the default options based on the requested URL.
 */
use Symfony\Component\HttpClient\ScopingHttpClient as OctaScopingHttpClient;

/**
 * Initialize MockHttpClient class.
 * A test-friendly HttpClient that doesn't make actual HTTP requests.
 */
use Symfony\Component\HttpClient\MockHttpClient as OctaMockHttpClient;

/**
 * Initialize MockResponse class.
 * A test-friendly response.
 */
use Symfony\Component\HttpClient\Response\MockResponse as OctaMockResponse;

/**
 * Initialize Store class.
 * Store implements all the logic for storing cache metadata (Request and Response headers).
 */
use Symfony\Component\HttpKernel\HttpCache\Store as OctaStore;

trait HttpClient {

    public function __construct() {
        /**
         * start of initializing http-request (http_client, native_http_client and curl_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->httpClient();

        /**
         * start of initializing http-request (native_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->nativeHttpClient();

        /**
         * start of initializing http-request (curl_http_client).
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->curlHttpClient();
    }

    /**
     * integrating http_client component of symfony.
     * @return OctaHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function httpClient() {
        return new OctaHttpClient();
    }

    /**
     * integrating native_http_client component of symfony.
     * @param array $defaultOptions      The current URI
     * @param int $maxHostConnections      The current URI
     * @return OctaNativeHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function nativeHttpClient($defaultOptions = [], $maxHostConnections = 6) {
        return new OctaNativeHttpClient($defaultOptions, $maxHostConnections);
    }

    /**
     * integrating curl_http_client component of symfony.
     * @param array $defaultOptions      options config
     * @param int $maxHostConnections    maximum host connections
     * @param int $maxPendingPushes      maximum pending pushes
     * @return OctaCurlHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function curlHttpClient(array $defaultOptions = [], $maxHostConnections = 6, $maxPendingPushes = 50) {
        return new OctaCurlHttpClient($defaultOptions, $maxHostConnections, $maxPendingPushes);
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
     * @return OctaCachingHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function cachingHttpClient(array $client = [], $store = 6, $defaultOptions = []) {
        return new OctaCachingHttpClient($client, $store, $defaultOptions);
    }

    /**
     * integrating scoping_http_client component of symfony.
     * Auto-configure the default options based on the requested URL.
     *
     * @param array $client      host client config
     * @param array $defaultOptionsByRegexp      regular exp default options
     * @param null $defaultRegexp      default regex
     * @return OctaScopingHttpClient class
     * @author Anthony Martin <anthony.martin@sensiolabs.com>
     */
    public function scopingHttpClient($client = [], $defaultOptionsByRegexp = [], $defaultRegexp = null) {
        return new OctaScopingHttpClient($client, $defaultOptionsByRegexp, $defaultRegexp);
    }

    /**
     * integrating mock_http_client component of symfony.
     * A test-friendly HttpClient that doesn't make actual HTTP requests.
     *
     * @param callable|null $responseFactory
     * @param null $baseUri
     * @return OctaMockHttpClient class
     * @author Nicolas Grekas <p@tchwork.com>
     */
    public function mockHttpClient($responseFactory = null, $baseUri = null){
        return new OctaMockHttpClient($responseFactory, $baseUri);
    }

    /**
     * integrating mock_response component of symfony.
     * @param string|string[] $body The response body as a string or an iterable of strings,
     *                                       yielding an empty string simulates a timeout,
     *                                       exceptions are turned to TransportException
     * @param array $info
     * @return OctaMockResponse class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function mockResponse($body = '', array $info = []){
        return new OctaMockResponse($body, $info);
    }

    /**
     * integrating kernel of symfony.
     *
     * @param null $root
     * @return OctaStore class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function store($root = null){
        return new OctaStore($root);
    }
}