<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\Extension;


use SilverStripe\ORM\DataExtension;

class ModelPaymentFieldsExtension extends DataExtension
{
    /**
     * Currently just payment status
     *
     * @var array fields
     */
    private static $db = [
        'PaymentStatus' => "Enum('Unpaid,Paid,Cancelled','Unpaid')"
    ];
}
