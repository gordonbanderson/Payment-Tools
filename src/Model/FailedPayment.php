<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\Model;

use SilverStripe\ORM\DataObject;

class FailedPayment extends DataObject
{
    private static $table_name = 'FailedPayment';

    private static $db = [
        'Payload' => 'Text'
    ];

    private static $has_one = [
        'Payment' => 'SilverStripe\Omnipay\Model\Payment'
    ];
}
