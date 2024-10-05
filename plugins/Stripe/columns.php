<?php

return [
    [
        'name'        => 'publishable_key',
        'label_key'   => 'common.publishable_key',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required|min:32',
        'description' => 'Khóa công khai (Publishable key)',
    ],
    [
        'name'        => 'secret_key',
        'label'       => 'Khóa bí mật',
        'type'        => 'string',
        'required'    => true,
        'rules'       => 'required|min:32',
        'description' => 'Khóa bí mật (Secret key)',
    ],
    [
        'name'        => 'test_mode',
        'label'       => 'Chế độ kiểm thử',
        'type'        => 'select',
        'options'     => [
            ['value' => '1', 'label' => 'Bật'],
            ['value' => '0', 'label' => 'Tắt'],
        ],
        'required'    => true,
        'description' => 'Nếu bật chế độ kiểm thử, vui lòng điền khóa công khai và khóa bí mật thử nghiệm. Nếu tắt chế độ kiểm thử, điền khóa công khai và khóa bí mật chính thức.',
    ],
];
