<?php 

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahServices 
{

    /**
     * Undocumented variable
     *
     * Here i will start first instailization recommended for any getwaypayment
     */
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
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer' . env('Fatoorah_token') 
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
    private function buildRequest($uri , $method ,$data = [])
    {
        // Here is my first variable will take new object from global Request
        // and have 3 @param method and base_url->$url and headers of global class from $this->
        // thats named stabish connections
        $request  = new Request($method  , $this->base_url . $uri , $this->headers);

        // i make proven if not found data return false to client
        // if(!$data)  return false;

        // here i make response var to have value of request_client that have object from client guzzle
        // and make send request with json type associative to data @var 
        $response = $this->request_client->send($request , 
        [
            'json' => $data
        ]);

        // if response have value of send request status is not 200 this meaning give me warning message with false 
        if($response->getStatusCode() != 200)
        {
            // return false;
        } 

        // else make respone from sending request return with data json decoded and i will make encodes at the endpoint of response
        $response = json_decode($response->getBody(), true);
        return $response;

    }

/**
 * Undocumented function
 * @param  $data
 * 
 * Here i will call endPoint i made and save it in env file with name {{fatora_base_url}}
 */
    public function sendPayment($data)
    {
        // $requestData = $this->parsePaymentData();
        /**
         * Here i will stuplish connection with three parameters
         * @param endPoint
         * @param method of Process
         * @param $var of ParsePaymentData {{Content of Data and cuurency type}}
         */
      return  $response = $this->buildRequest('/v2/sendPayment' , 'POST', $data);
        // if($respone)
        // {
        //     $this->saveTransactionPayment($patient_id , $response['Data'] ['InvoiceId']);
        // }
        // return $respone;
        //You can save payment data in database as per your needs

    }








}