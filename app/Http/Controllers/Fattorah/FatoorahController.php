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
         * Product::get('item) with data of it 
         */
        public function payorder()
        {
            $data = [
                //Fill Required data
                'CustomerName'       => '',
                'NotificationOption' => 'Lnk', 
                'InvoiceValue'       => '100',
                //Fill optional data
                'CustomerEmail'      => 'boodyelmasry6@gmail.com',
                'CallBackUrl'        => env('success_url'),
                'ErrorUrl'           => env('error_url'), 
                'Language'           => 'en',
                'DisplayCurrencyIso' => 'USD',
                /**
                 * Another details is option to add
                 */
                //'MobileCountryCode'  => '+965',
                //'CustomerMobile'     => '1234567890',
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'SourceInfo'         => 'Pure PHP', //For example: (Symfony, CodeIgniter, Zend Framework, Yii, CakePHP, etc)
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
            ];

            /**
             * Here i will call service of payment
             */
        }
}
