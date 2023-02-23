<?php 

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahServices 
{

    private $base_url;
    private $headers;
    private $request_client;

    /**
     * Undocumented function
     *
     * @param Client $request_client
     * 
     * Here is way to connect /call any third party
     */
    public function __construct(Client $request_client)
    {   

        /**
         * Here is that object for client request || we will contact with client after this
         */
        $this->request_client = $request_client;
        /**
         * Here is request will send from client
         */
        $this->base_url = env('fatora_base_url');
        /**
         * Here is saved way for any request sent to paid 
         * take type of request
         */
        $this->headers =
        [
            'content-type' => 'application/json',
            'authorization' => 'Bearer' . env('Fatoorah_token') 
        ];
    }


    /**
     * Undocumented function
     *
     * @param  $uri
     * @param  $method
     * @param array $body
     * @return false | mixed
     * @throws \GuzzuleHttp\Exception\GuzzleException
     */
    private function buildRequest($uri , $method ,$body = [])
    {
        $request  = new Request($method  , $this->base_url . $uri , $this->headers);

        if(!$body)
        return false;
    

    }








}