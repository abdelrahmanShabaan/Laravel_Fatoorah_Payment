<?php

namespace App\Http\Controllers\Fattorah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    

        public function payorder()
        {
            $data = [
                //Fill Required data
                'CustomerName'       => '',
                'NotificationOption' => 'Lnk', 
                'InvoiceValue'       => '100',
                //Fill optional data
                'CustomerEmail'      => 'boodyelmasry6@gmail.com',
                'CallBackUrl'        => env('fatora.success_url'),
                'ErrorUrl'           => env('fatora.error_url'), 
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
        }
}
