<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\ModelAdmin;

use SilverStripe\Admin\ModelAdmin;

class FailedPaymentModelAdmin extends ModelAdmin
{
    private static $managed_models = [
        'Suilven\PaymentTools\Model\FailedPayment'
    ];

    private static $url_segment = 'failed-payments';

    private static $menu_title = 'Failed Payments';

    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        $form
            ->Fields()
            ->fieldByName($this->sanitiseClassName($this->modelClass))
            ->getConfig()
            ->removeComponentsByType('GridFieldDeleteAction')
            ->removeComponentsByType('GridFieldAddNewButton');

        return $form;
    }
}
