<?php namespace Chatium;

use Exception;
use Firebase\JWT\JWT;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as HttpClient;
use function time;

class Client
{

    private $apiKey;
    private $secretKey;
    private $context;

    /**
     * Client constructor.
     * @param string $apiKey
     * @param string $secretKey
     * @param array $context
     */
    function __construct(string $apiKey, string $secretKey, array $context)
    {
        $this->apiKey = $apiKey;
        $this->secretKey = $secretKey;
        $this->context = $context;
    }

    /**
     * @param string $apiKey
     * @param string $secretKey
     * @return Client
     * @throws Exception
     */
    public static function createFromRequest(string $apiKey, string $secretKey)
    {
        if (isset($_SERVER['HTTP_X_CHATIUM_APPLICATION'])) {
            return new Client(
                $apiKey,
                $secretKey,
                self::contextFromToken($_SERVER['HTTP_X_CHATIUM_APPLICATION'], $secretKey)
            );
        } else {
            throw new Exception('Header x-chatium-application is not found in request');
        }
    }

    /**
     * @param string $token
     * @param string $secret
     * @return array
     */
    public static function contextFromToken(string $token, string $secret)
    {
        JWT::$leeway = 60; // 60 seconds clock skew
        $payload = JWT::decode($token, $secret, array('HS256'));

        return [
            'account' => [
                'id' => $payload->acc,
                'host' => $payload->host,
            ],
            'uniqId' => $payload->uqid,
            'auth' => [
                'id' => $payload->aid,
                'type' => $payload->atp,
                'token' => $payload->tkn,
            ],
            'user' => [
                'id' => $payload->uid,
                'roles' => $payload->urs,
                'firstName' => $payload->ufn,
                'lastName' => $payload->uln,
            ]
        ];
    }

    /**
     * @param string $method
     * @param string $url
     * @return string
     */
    public function createChatiumApiToken(string $method, string $url)
    {
        $payload = [
            'iat' => time(),
        ];

        if (isset($this->context['auth']['token'])) {
            $payload['tkn'] = $this->context['auth']['token'];
        }

        return JWT::encode($payload, $this->secretKey . $method . $url);
    }

    /**
     * @param $url
     * @return mixed
     * @throws GuzzleException
     */
    public function get(string $url)
    {
        return $this->request('get', $url, []);
    }

    /**
     * @param string $url
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     */
    public function post(string $url, $payload = [])
    {
        return $this->request('post', $url, $payload);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     */
    public function request(string $method, string $url, $payload = [])
    {
        $accountUrl = $this->context['account']['host'] . '/' . ltrim($url, '/');
        $response = (new HttpClient())->request($method, 'https://' . $accountUrl, [
            'json' => $payload,
            'headers' => [
                'x-chatium-api-key' => $this->apiKey,
                'authorization' => $this->createChatiumApiToken($method, $accountUrl),
            ],
        ]);

        return json_decode($response->getBody());
    }

}
