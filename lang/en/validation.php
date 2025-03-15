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

    'accepted' => 'The :attributes field must be accepted.',
    'accepted_if' => 'The :attributes field must be accepted when :other is :value.',
    'active_url' => 'The :attributes field must be a valid URL.',
    'after' => 'The :attributes field must be a date after :date.',
    'after_or_equal' => 'The :attributes field must be a date after or equal to :date.',
    'alpha' => 'The :attributes field must only contain letters.',
    'alpha_dash' => 'The :attributes field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attributes field must only contain letters and numbers.',
    'array' => 'The :attributes field must be an array.',
    'ascii' => 'The :attributes field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attributes field must be a date before :date.',
    'before_or_equal' => 'The :attributes field must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attributes field must have between :min and :max items.',
        'file' => 'The :attributes field must be between :min and :max kilobytes.',
        'numeric' => 'The :attributes field must be between :min and :max.',
        'string' => 'The :attributes field must be between :min and :max characters.',
    ],
    'boolean' => 'The :attributes field must be true or false.',
    'can' => 'The :attributes field contains an unauthorized value.',
    'confirmed' => 'The :attributes field confirmation does not match.',
    'contains' => 'The :attributes field is missing a required value.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attributes field must be a valid date.',
    'date_equals' => 'The :attributes field must be a date equal to :date.',
    'date_format' => 'The :attributes field must match the format :format.',
    'decimal' => 'The :attributes field must have :decimal decimal places.',
    'declined' => 'The :attributes field must be declined.',
    'declined_if' => 'The :attributes field must be declined when :other is :value.',
    'different' => 'The :attributes field and :other must be different.',
    'digits' => 'The :attributes field must be :digits digits.',
    'digits_between' => 'The :attributes field must be between :min and :max digits.',
    'dimensions' => 'The :attributes field has invalid image dimensions.',
    'distinct' => 'The :attributes field has a duplicate value.',
    'doesnt_end_with' => 'The :attributes field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attributes field must not start with one of the following: :values.',
    'email' => 'The :attributes field must be a valid email address.',
    'ends_with' => 'The :attributes field must end with one of the following: :values.',
    'enum' => 'The selected :attributes is invalid.',
    'exists' => 'The selected :attributes is invalid.',
    'extensions' => 'The :attributes field must have one of the following extensions: :values.',
    'file' => 'The :attributes field must be a file.',
    'filled' => 'The :attributes field must have a value.',
    'gt' => [
        'array' => 'The :attributes field must have more than :value items.',
        'file' => 'The :attributes field must be greater than :value kilobytes.',
        'numeric' => 'The :attributes field must be greater than :value.',
        'string' => 'The :attributes field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attributes field must have :value items or more.',
        'file' => 'The :attributes field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attributes field must be greater than or equal to :value.',
        'string' => 'The :attributes field must be greater than or equal to :value characters.',
    ],
    'hex_color' => 'The :attributes field must be a valid hexadecimal color.',
    'image' => 'The :attributes field must be an image.',
    'in' => 'The selected :attributes is invalid.',
    'in_array' => 'The :attributes field must exist in :other.',
    'integer' => 'The :attributes field must be an integer.',
    'ip' => 'The :attributes field must be a valid IP address.',
    'ipv4' => 'The :attributes field must be a valid IPv4 address.',
    'ipv6' => 'The :attributes field must be a valid IPv6 address.',
    'json' => 'The :attributes field must be a valid JSON string.',
    'list' => 'The :attributes field must be a list.',
    'lowercase' => 'The :attributes field must be lowercase.',
    'lt' => [
        'array' => 'The :attributes field must have less than :value items.',
        'file' => 'The :attributes field must be less than :value kilobytes.',
        'numeric' => 'The :attributes field must be less than :value.',
        'string' => 'The :attributes field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attributes field must not have more than :value items.',
        'file' => 'The :attributes field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attributes field must be less than or equal to :value.',
        'string' => 'The :attributes field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attributes field must be a valid MAC address.',
    'max' => [
        'array' => 'The :attributes field must not have more than :max items.',
        'file' => 'The :attributes field must not be greater than :max kilobytes.',
        'numeric' => 'The :attributes field must not be greater than :max.',
        'string' => 'The :attributes field must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attributes field must not have more than :max digits.',
    'mimes' => 'The :attributes field must be a file of type: :values.',
    'mimetypes' => 'The :attributes field must be a file of type: :values.',
    'min' => [
        'array' => 'The :attributes field must have at least :min items.',
        'file' => 'The :attributes field must be at least :min kilobytes.',
        'numeric' => 'The :attributes field must be at least :min.',
        'string' => 'The :attributes field must be at least :min characters.',
    ],
    'min_digits' => 'The :attributes field must have at least :min digits.',
    'missing' => 'The :attributes field must be missing.',
    'missing_if' => 'The :attributes field must be missing when :other is :value.',
    'missing_unless' => 'The :attributes field must be missing unless :other is :value.',
    'missing_with' => 'The :attributes field must be missing when :values is present.',
    'missing_with_all' => 'The :attributes field must be missing when :values are present.',
    'multiple_of' => 'The :attributes field must be a multiple of :value.',
    'not_in' => 'The selected :attributes is invalid.',
    'not_regex' => 'The :attributes field format is invalid.',
    'numeric' => 'The :attributes field must be a number.',
    'password' => [
        'letters' => 'The :attributes field must contain at least one letter.',
        'mixed' => 'The :attributes field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attributes field must contain at least one number.',
        'symbols' => 'The :attributes field must contain at least one symbol.',
        'uncompromised' => 'The given :attributes has appeared in a data leak. Please choose a different :attributes.',
    ],
    'present' => 'The :attributes field must be present.',
    'present_if' => 'The :attributes field must be present when :other is :value.',
    'present_unless' => 'The :attributes field must be present unless :other is :value.',
    'present_with' => 'The :attributes field must be present when :values is present.',
    'present_with_all' => 'The :attributes field must be present when :values are present.',
    'prohibited' => 'The :attributes field is prohibited.',
    'prohibited_if' => 'The :attributes field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attributes field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attributes field prohibits :other from being present.',
    'regex' => 'The :attributes field format is invalid.',
    'required' => 'The :attributes field is required.',
    'required_array_keys' => 'The :attributes field must contain entries for: :values.',
    'required_if' => 'The :attributes field is required when :other is :value.',
    'required_if_accepted' => 'The :attributes field is required when :other is accepted.',
    'required_if_declined' => 'The :attributes field is required when :other is declined.',
    'required_unless' => 'The :attributes field is required unless :other is in :values.',
    'required_with' => 'The :attributes field is required when :values is present.',
    'required_with_all' => 'The :attributes field is required when :values are present.',
    'required_without' => 'The :attributes field is required when :values is not present.',
    'required_without_all' => 'The :attributes field is required when none of :values are present.',
    'same' => 'The :attributes field must match :other.',
    'size' => [
        'array' => 'The :attributes field must contain :size items.',
        'file' => 'The :attributes field must be :size kilobytes.',
        'numeric' => 'The :attributes field must be :size.',
        'string' => 'The :attributes field must be :size characters.',
    ],
    'starts_with' => 'The :attributes field must start with one of the following: :values.',
    'string' => 'The :attributes field must be a string.',
    'timezone' => 'The :attributes field must be a valid timezone.',
    'unique' => 'The :attributes has already been taken.',
    'uploaded' => 'The :attributes failed to upload.',
    'uppercase' => 'The :attributes field must be uppercase.',
    'url' => 'The :attributes field must be a valid URL.',
    'ulid' => 'The :attributes field must be a valid ULID.',
    'uuid' => 'The :attributes field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attributes.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attributes rule.
    |
    */

    'custom' => [
        'attributes-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attributes placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
