<?php
/**
 * Stripe 字段
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-06-29 21:16:23
 * @modified   2022-06-29 21:16:23
 */

return [
    [
        'name'        => 'bank_name',
        'label'       => 'Loại thanh toán',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required',
        'description' => 'Tên loại thanh toán',
    ]
//    ,
//    [
//        'name'        => 'account_holder_name',
//        'label'       => 'Account holder name',
//        'type'        => 'string',
//        'required'    => true,
//        'rules'       => 'required',
//        'description' => 'Bank account holder name',
//    ],
//    [
//        'name'        => 'account_number',
//        'label'       => 'Account number',
//        'type'        => 'string',
//        'required'    => true,
//        'rules'       => 'required',
//        'description' => 'Your bank account number',
//    ]
];
