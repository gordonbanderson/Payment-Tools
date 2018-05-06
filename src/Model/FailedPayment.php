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
    // @todo move statics to yml file

    private static $table_name = 'FailedPayment';

    private static $db = [
        'Payload' => 'Text'
    ];

    private static $has_one = [
        'Payment' => 'SilverStripe\Omnipay\Model\Payment'
    ];

    private static $summary_fields = [
        'Created.Nice' => 'Created',
        'Payment.Status' => 'OmnipayStatus',
        'Payment.Identifier' => 'OmnipayIdentifier',
        'Payment.Money' => 'Money',
        'Payment.Gateway' => 'Gateway',
        'Payload' => 'Payload',
    ];

    private static $default_sort = '"Created" DESC, "ID" DESC';


}
