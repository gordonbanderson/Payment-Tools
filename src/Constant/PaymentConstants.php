<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 24/4/2561
 * Time: 22:22 น.
 */

namespace Suilven\PaymentTools\Constant;

class PaymentConstants
{
    /** @var string Name of key to store form data under prior to creating object post payment */
    const PRE_PAYMENT_PAYLOAD_KEY = 'pre_payment_payload';

    /** @var array whitelist of fields to store of a member after a failed payment - just enough to be able to contact
     the user, and no sensitive info*/
    const MEMBER_WHITELIST = ['FirstName', 'Surname', 'Email'];

    const MEMBER_BLACKLIST = ['Password'];
}
