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

    'accepted' => 'يجب قبول الحقل :attributes',
    'accepted_if' => 'الحقل :attributes مقبول في حال ما إذا كان :other يساوي :value.',
    'active_url' => 'الحقل :attributes لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على الحقل :attributes أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'الحقل :attributes يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي الحقل :attributes سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي الحقل :attributes على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attributes على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون الحقل :attributes ًمصفوفة',
    'before' => 'يجب على الحقل :attributes أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'الحقل :attributes يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'name.ar'=>' الاسم بالعربية',
    'between' => [
        'array' => 'يجب أن يحتوي :attributes على عدد من العناصر بين :min و :max',
        'file' => 'يجب أن يكون حجم الملف :attributes بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attributes بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف النّص :attributes بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة الحقل :attributes إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attributes',
    'current_password' => 'كلمة المرور غير صحيحة',
    'date' => 'الحقل :attributes ليس تاريخًا صحيحًا',
    'date_equals' => 'لا يساوي الحقل :attributes مع :date.',
    'date_format' => 'لا يتوافق الحقل :attributes مع الشكل :format.',
    'declined' => 'يجب رفض الحقل :attributes',
    'declined_if' => 'الحقل :attributes مرفوض في حال ما إذا كان :other يساوي :value.',
    'different' => 'يجب أن يكون الحقلان :attributes و :other مُختلفان',
    'digits' => 'يجب أن يحتوي الحقل :attributes على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي الحقل :attributes بين :min و :max رقمًا/أرقام',
    'dimensions' => 'الـ :attributes يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attributes قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attributes عنوان بريد إلكتروني صحيح البُنية',
    'ends_with' => 'الـ :attributes يجب ان ينتهي بأحد القيم التالية :value.',
    'enum' => 'الحقل :attributes غير صحيح',
    'exists' => 'الحقل :attributes غير موجود',
    'file' => 'الـ :attributes يجب أن يكون من ملفا.',
    'filled' => 'الحقل :attributes إجباري',
    'gt' => [
        'array' => 'الـ :attributes يجب ان يحتوي علي اكثر من :value عناصر/عنصر.',
        'file' => 'الـ :attributes يجب ان يكون اكبر من :value كيلو بايت.',
        'numeric' => 'الـ :attributes يجب ان يكون اكبر من :value.',
        'string' => 'الـ :attributes يجب ان يكون اكبر من :value حروفٍ/حرفًا.',
    ],
    'gte' => [
        'array' => 'الـ :attributes يجب ان يحتوي علي :value عناصر/عنصر او اكثر.',
        'file' => 'الـ :attributes يجب ان يكون اكبر من او يساوي :value كيلو بايت.',
        'numeric' => 'الـ :attributes يجب ان يكون اكبر من او يساوي :value.',
        'string' => 'الـ :attributes يجب ان يكون اكبر من او يساوي :value حروفٍ/حرفًا.',
    ],
    'image' => 'يجب أن يكون الحقل :attributes صورةً',
    'in' => 'الحقل :attributes لاغٍ',
    'in_array' => 'الحقل :attributes غير موجود في :other.',
    'integer' => 'يجب أن يكون الحقل :attributes عددًا صحيحًا',
    'ip' => 'يجب أن يكون الحقل :attributes عنوان IP ذا بُنية صحيحة',
    'ipv4' => 'يجب أن يكون الحقل :attributes عنوان IPv4 ذا بنية صحيحة.',
    'ipv6' => 'يجب أن يكون الحقل :attributes عنوان IPv6 ذا بنية صحيحة.',
    'json' => 'يجب أن يكون الحقل :attributes نصا من نوع JSON.',
    'lt' => [
        'array' => 'الـ :attributes يجب ان يحتوي علي اقل من :value عناصر/عنصر.',
        'file' => 'الـ :attributes يجب ان يكون اقل من :value كيلو بايت.',
        'numeric' => 'الـ :attributes يجب ان يكون اقل من :value.',
        'string' => 'الـ :attributes يجب ان يكون اقل من :value حروفٍ/حرفًا.',
    ],
    'lte' => [
        'array' => 'الـ :attributes يجب ان يحتوي علي اكثر من :value عناصر/عنصر.',
        'file' => 'الـ :attributes يجب ان يكون اقل من او يساوي :value كيلو بايت.',
        'numeric' => 'الـ :attributes يجب ان يكون اقل من او يساوي :value.',
        'string' => 'الـ :attributes يجب ان يكون اقل من او يساوي :value حروفٍ/حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون الحقل :attributes عنوان MAC ذا بنية صحيحة.',
    'max' => [
        'array' => 'يجب أن لا يحتوي الحقل :attributes على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attributes :max كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة الحقل :attributes مساوية أو أصغر لـ :max.',
        'string' => 'يجب أن لا يتجاوز طول نص :attributes :max حروفٍ/حرفًا',
    ],
    'mimes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي الحقل :attributes على الأقل على :min عُنصرًا/عناصر',
        'file' => 'يجب أن يكون حجم الملف :attributes على الأقل :min كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة الحقل :attributes مساوية أو أكبر لـ :min.',
        'string' => 'يجب أن يكون طول نص :attributes على الأقل :min حروفٍ/حرفًا',
    ],
    'multiple_of' => 'The :attributes must be a multiple of :value.',
    'not_in' => 'الحقل :attributes لاغٍ',
    'not_regex' => 'الحقل :attributes نوعه لاغٍ',
    'numeric' => 'يجب على الحقل :attributes أن يكون رقمًا',
    'password' => [
        'letters' => 'يجب ان يشمل حقل :attributes على حرف واحد على الاقل.',
        'mixed' => 'يجب ان يشمل حقل :attributes على حرف واحد بصيغة كبيرة على الاقل وحرف اخر بصيغة صغيرة.',
        'numbers' => 'يجب ان يشمل حقل :attributes على رقم واحد على الاقل.',
        'symbols' => 'يجب ان يشمل حقل :attributes على رمز واحد على الاقل.',
        'uncompromised' => 'حقل :attributes تبدو غير آمنة. الرجاء اختيار قيمة اخرى.',
    ],
    'present' => 'يجب تقديم الحقل :attributes',
    'prohibited' => 'الحقل :attributes محظور',
    'prohibited_if' => 'الحقل :attributes محظور في حال ما إذا كان :other يساوي :value.',
    'prohibited_unless' => 'الحقل :attributes محظور في حال ما لم يكون :other يساوي :value.',
    'prohibits' => 'الحقل :attributes يحظر :other من اي يكون موجود',
    'regex' => 'صيغة الحقل :attributes .غير صحيحة',
    'required' => 'الحقل :attributes مطلوب.',
    'required_array_keys' => 'الحقل :attributes يجب ان يحتوي علي مدخلات للقيم التالية :values.',
    'required_if' => 'الحقل :attributes مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'الحقل :attributes مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'الحقل :attributes إذا توفّر :values.',
    'required_with_all' => 'الحقل :attributes إذا توفّر :values.',
    'required_without' => 'الحقل :attributes إذا لم يتوفّر :values.',
    'required_without_all' => 'الحقل :attributes إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق الحقل :attributes مع :other',
    'size' => [
        'array' => 'يجب أن يحتوي الحقل :attributes على :size عنصرٍ/عناصر بالظبط',
        'file' => 'يجب أن يكون حجم الملف :attributes :size كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة الحقل :attributes مساوية لـ :size',
        'string' => 'يجب أن يحتوي النص :attributes على :size حروفٍ/حرفًا بالظبط',
    ],
    'starts_with' => 'الحقل :attributes يجب ان يبدأ بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون الحقل :attributes نصآ.',
    'timezone' => 'يجب أن يكون :attributes نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة الحقل :attributes مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ :attributes',
    'url' => 'صيغة الرابط :attributes غير صحيحة',
    'uuid' => 'الحقل :attributes يجب ان ايكون رقم UUID صحيح.',


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

    'attributes' => [
        'name'                  => 'الاسم',
        'title.ar'              => 'الاسم بالعربي',
        'title.en'              => 'الاسم بالانجليزي',
        'username'              => 'اسم المُستخدم',
        'user_name'             => 'اسم المُستخدم',
        'phone_number'          => 'رقم الهاتف',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'price'                 => 'السعر',
        'desc'                  => 'نبذه',
        'title'                 => 'العنوان',
        'q'                     => 'البحث',
        'image'                 => 'الصورة',
        'category_id'           => 'الفئات',
        'subcategory_id'        => 'الفئات الفرعية',
        'additional_info'       => 'المعلومات الاضافية',
        'industry_id'           => 'المصانع',
        'section'               => 'الفئات',
        'work_time'             =>'أيام العمل',
        'section_id'            => 'الفئات',
        'state'                 => 'الإمارة',
        'industrial_area'       => 'المنطقة الصناعية',
        'industrial_license'    =>'الرخصة الصناعية',
        'website'               =>'الموقع الإلكتروني',
        'salesperson_email'     =>'البريد الإلكتروني لمندوب المبيعات',
        'salesperson_phone'     =>'هاتف مندوب المبيعات',
        'industry_phone'        =>'هاتف المصنع',
        'role_id'               => 'الأدوار',
        'name.ar'               =>'الاسم بالعربية',
        'name.en'               =>'الاسم بالانجليزية',
        'description.ar'        => 'الوصف بالعربية',
        'description.en'        => 'الوصف بالانجليزية',
        'additional_info.ar'    =>'المعلومات الإضافية بالعربية',
        'additional_info.en'    =>'المعلومات الإضافية بالانجليزية',
        'post'                  => 'الخبر',
        'body'                  => 'محتوى الرسالة',
        'link'                  => ' ',
        'slug'                  => ' ',
    ],

];
