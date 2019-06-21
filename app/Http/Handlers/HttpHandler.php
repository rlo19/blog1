<?php   

namespace App\Handlers;

use GuzzleHttp\Client;

class HttpHandler {

    private $client;

    public function __construct() {

        $this->client = new Client();
    }

    public function send_request($method, $param, $url) {

        return $this->client->request(strtoupper($method), $url , $param);
    }
}