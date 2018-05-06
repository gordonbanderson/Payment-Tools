<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\ModelAdmin;

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Reports\Report;
use Suilven\PaymentTools\Model\FailedPayment;

class FailedPaymentReport extends Report
{
    private static $managed_models = [
        'Suilven\PaymentTools\Model\FailedPayment'
    ];

    private static $url_segment = 'failed-payments';

    private static $menu_title = 'Failed Payments';

    // the name of the report
    public function title()
    {
        return 'Failed Payments';
    }

    // what we want the report to return
    public function sourceRecords($params = null)
    {
        return FailedPayment::get()->sort('Created', 'DESC');
    }

    // which fields on that object we want to show
    public function columns()
    {
        $fields = [
            'Created' => 'Payment.Created.Nice',
            'Gateway' => 'Payment.Gateway',

            'Transaction ID' => [
                'Payment.Identifier',
                'link' => true]
            ,
            'Money' => 'Payment.Money',
            'Status' => 'Payment.Status',

            'Payload' => 'Text',
            'Payment' => [
                'id' => 'ID',
                'link' => true
            ]
        ];



        return $fields;
    }
}
