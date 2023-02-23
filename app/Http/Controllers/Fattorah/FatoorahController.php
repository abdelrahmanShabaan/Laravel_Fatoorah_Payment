<?php

namespace App\Http\Controllers\Fattorah;

use App\Http\Controllers\Controller;
use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{

    /**
     * Here i will modifie new mehtod have dependency injection with object of another class as @param of service of fatoorah
     * and here i will make private function have all data of object from that class i call as paramter
     */
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;

    }
    

        /**
         * Undocumented function
         *
         * @return void
         * 
         * Here i will make payorder method have data of product or i can make this :
         * Product::select('item') with data of it 
         */
        public function payorder()
        {
            $data = [
                "CustomerName"       => 'fname lname',
                "NotificationOption" => 'Lnk', 
                "InvoiceValue"       => '100',
                "CustomerEmail"      => 'boodyelmasry6@gmail.com',
                "CallBackUrl"        => 'https://www.youtube.com/',
                "ErrorUrl"           => 'https://www.google.com/', 
                "Language"           => 'en',
                "DisplayCurrencyIso" => 'KWD',
            
            ];

            /**
             * Here i will call service of payment
             */

            return $this->fatoorahServices->sendPayment($data);
        }
}
