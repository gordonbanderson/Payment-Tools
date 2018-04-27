<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\ModelAdmin;

use SilverStripe\Omnipay\Model\Payment;
use SilverStripe\ORM\DataExtension;

class FailedPaymentModelAdmin extends DataExtension
{
    private static $managed_models = [
        'Suilven\PaymentTools\Model\FailedPayment'
    ];

    private static $url_segment = 'failed-payments';

    private static $menu_title = 'Failed Payments';
}
