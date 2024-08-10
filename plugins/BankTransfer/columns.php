<?php

return [
    [
        'name'        => 'bank_name',
        'label'       => 'Bank name',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required',
        'description' => 'Your bank name',
    ],
    [
        'name'        => 'account_holder_name',
        'label'       => 'Account holder name',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required',
        'description' => 'Bank account holder name',
    ],
    [
        'name'        => 'account_number',
        'label'       => 'Account number',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required',
        'description' => 'Your bank account number',
    ],
];
