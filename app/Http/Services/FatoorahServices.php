<?php 

namespace App\Http\Services;

use GuzzleHttp\Client;

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

        $this->request_client = $request_client;
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








}