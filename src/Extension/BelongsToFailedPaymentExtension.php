<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\Extension;


use SilverStripe\ORM\DataExtension;

class BelongsToFailedPaymentExtension extends DataExtension
{
    private static $belongs_to = [
        'FailedPayment' => 'Suilven\PaymentTools\Model\FailedPayment'
    ];
}
