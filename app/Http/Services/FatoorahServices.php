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
        // Here is my first variable will take new object from global Request
        // and have 3 @param method and base_url->$url and headers of global class from $this->
        $request  = new Request($method  , $this->base_url . $uri , $this->headers);

        // i make proven if not found body return false to client
        if(!$body)  return false;

        // here i make response var to have value of request_client that have object from client guzzle
        // and make send request with json type associative to body @var 
        $respone = $this->request_client->send($request , 
        [
            'json' => $body
        ]);

        // if response have value of send request status is not 200 this meaning give me warning message with false 
        if($respone->getStatusCode() != 200)
        {
            return false;
        } 

        // else make respone from sending request return with data json decoded and i will make encodes at the endpoint of response
        $respone = json_decode($respone->getBody(), true);

    }

/**
 * Undocumented function
 * @param  $data
 */
    public function sendPayment($data)
    {
        $requestData = $this->parsePaymentData();
        $respone = $this->buildRequest('v2/SendPayment' , 'POST', $requestData);
        if($respone)
        {
            $this->saveTransactionPayment($patient_id , $response['Data'] ['InvoiceId']);
        }
        return $respone;
    }








}