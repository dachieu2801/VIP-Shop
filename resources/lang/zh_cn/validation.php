<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'             => ':attribute phải được chấp nhận.',
    'accepted_if'          => ':attribute phải được chấp nhận khi :other là :value.',
    'active_url'           => ':attribute không phải là một URL hợp lệ.',
    'after'                => ':attribute phải là một ngày sau :date.',
    'after_or_equal'       => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha'                => ':attribute chỉ được chứa chữ cái.',
    'alpha_dash'           => ':attribute chỉ được chứa chữ cái, số, dấu gạch ngang và gạch dưới.',
    'alpha_num'            => ':attribute chỉ được chứa chữ cái và số.',
    'array'                => ':attribute phải là một mảng.',
    'before'               => ':attribute phải là một ngày trước :date.',
    'before_or_equal'      => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between'              => [
        'numeric' => ':attribute phải nằm trong khoảng :min và :max.',
        'file'    => ':attribute phải có kích thước từ :min đến :max kilobyte.',
        'string'  => ':attribute phải có độ dài từ :min đến :max ký tự.',
        'array'   => ':attribute phải có từ :min đến :max phần tử.',


    ],
    'boolean'              => 'Trường :attribute phải là true hoặc false.',
    'confirmed'            => 'Xác nhận :attribute không khớp.',
    'current_password'     => 'Mật khẩu không chính xác.',
    'date'                 => ':attribute không phải là một ngày hợp lệ.',
    'date_equals'          => ':attribute phải là một ngày bằng :date.',
    'date_format'          => ':attribute không khớp với định dạng :format.',
    'declined'             => ':attribute phải bị từ chối.',
    'declined_if'          => ':attribute phải bị từ chối khi :other là :value.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => ':attribute phải có :digits chữ số.',
    'digits_between'       => ':attribute phải có độ dài từ :min đến :max chữ số.',
    'dimensions'           => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Trường :attribute có giá trị trùng lặp.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with'            => ':attribute phải kết thúc bằng một trong các giá trị sau: :values.',
    'exists'               => ':attribute đã chọn không hợp lệ.',
    'file'                 => ':attribute phải là một tệp tin.',
    'filled'               => 'Trường :attribute phải có giá trị.',
    'gt'                   => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file'    => ':attribute phải lớn hơn :value kilobytes.',
        'string'  => ':attribute phải lớn hơn :value ký tự.',
        'array'   => ':attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte'                  => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file'    => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array'   => ':attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image'                => ':attribute phải là một hình ảnh.',
    'in'                   => ':attribute đã chọn không hợp lệ.',
    'in_array'             => 'Trường :attribute không tồn tại trong :other.',
    'integer'              => ':attribute phải là một số nguyên.',
    'ip'                   => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4'                 => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json'                 => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt'                   => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file'    => ':attribute phải nhỏ hơn :value kilobytes.',
        'string'  => ':attribute phải nhỏ hơn :value ký tự.',
        'array'   => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte'                  => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array'   => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max'                  => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file'    => ':attribute không được lớn hơn :max kilobytes.',
        'string'  => ':attribute không được lớn hơn :max ký tự.',
        'array'   => ':attribute không được có nhiều hơn :max phần tử.',
    ],


    'mimes'                => ':attribute phải là một tệp tin có định dạng: :values.',
    'mimetypes'            => ':attribute phải là một tệp tin có định dạng: :values.',
    'min'                  => [
        'numeric' => ':attribute phải ít nhất là :min.',
        'file'    => ':attribute phải ít nhất là :min kilobytes.',
        'string'  => ':attribute phải ít nhất là :min ký tự.',
        'array'   => ':attribute phải có ít nhất :min phần tử.',
    ],
    'multiple_of'          => ':attribute phải là một bội số của :value.',
    'not_in'               => ':attribute đã chọn không hợp lệ.',
    'not_regex'            => 'Định dạng :attribute không hợp lệ.',
    'numeric'              => ':attribute phải là một số.',
    'password'             => 'Mật khẩu không chính xác.',
    'present'              => 'Trường :attribute phải được cung cấp.',
    'prohibited'           => 'Trường :attribute bị cấm.',
    'prohibited_if'        => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_unless'    => 'Trường :attribute bị cấm trừ khi :other nằm trong :values.',
    'prohibits'            => 'Trường :attribute cấm :other xuất hiện.',
    'regex'                => 'Định dạng :attribute không hợp lệ.',
    'required'             => 'Trường :attribute là bắt buộc.',
    'required_if'          => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_unless'      => 'Trường :attribute là bắt buộc trừ khi :other nằm trong :values.',
    'required_with'        => 'Trường :attribute là bắt buộc khi :values có mặt.',
    'required_with_all'    => 'Trường :attribute là bắt buộc khi :values có mặt.',
    'required_without'     => 'Trường :attribute là bắt buộc khi :values không có mặt.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có bất kỳ :values nào có mặt.',
    'same'                 => ':attribute và :other phải giống nhau.',
    'size'                 => [
        'numeric' => ':attribute phải có kích thước là :size.',
        'file'    => ':attribute phải có kích thước là :size kilobytes.',
        'string'  => ':attribute phải có kích thước là :size ký tự.',
        'array'   => ':attribute phải có đúng :size phần tử.',
    ],

    'starts_with'          => ':attribute phải bắt đầu bằng một trong các giá trị sau: :values.',
    'string'               => ':attribute phải là một chuỗi.',
    'timezone'             => ':attribute phải là múi giờ hợp lệ.',
    'unique'               => ':attribute đã tồn tại trong hệ thống.',
    'uploaded'             => 'Tải lên :attribute thất bại.',
    'url'                  => ':attribute phải là một đường dẫn URL hợp lệ.',
    'uuid'                 => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'thông điệp-tùy-chỉnh',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'descriptions.en.title'    => 'Tiêu đề (Tiếng Anh)',
        'descriptions.zh_cn.title' => 'Tiêu đề (Tiếng Trung Quốc)',

        'tax_rate'                 => [
            'name' => 'Tên Thuế Suất',
            'type' => 'Loại Thuế',
            'rate' => 'Thuế Suất',
        ],
    ],

];
