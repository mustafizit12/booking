<?php
return [
    'settings' => [
        'general' => [
            'company_name' => [
                'field_type' => 'text',
                'validation' => 'required',
                'field_label' => 'Company Name',
            ],
            'lang' => [
                'field_type' => 'select',
                'field_value' => 'language_short_code_list',
                'default' => config('app.locale'),
                'field_label' => 'Default Site Language',
            ],
            'lang_switcher' => [
                'field_type' => 'switch',
                'field_label' => 'Language Switcher',
            ],
            'lang_switcher_item' => [
                'field_type' => 'radio',
                'field_value' => 'language_switcher_items',
                'default' => 'icon',
                'field_label' => 'Display Language Switch Item',
            ],
            'maintenance_mode' => [
                'field_type' => 'switch',
                'field_label' => 'Maintenance mode',
            ],
            'registration_active_status' => [
                'field_type' => 'switch',
                'field_label' => 'Allow Registration',
            ],
            'default_role_to_register' => [
                'field_type' => 'select',
                'field_value' => 'get_user_roles',
                'field_label' => 'Default registration role',
            ],
            'signupable_user_roles' => [
                'field_type' => 'checkbox',
                'previous' => 'default_role_to_register',
                'validation' => 'required|array|in:get_user_roles',
                'field_label' => 'Allowed role for signup',
                'input_class' => 'flat-blue'
            ],
            'require_email_verification' => [
                'field_type' => 'switch',
                'field_label' => 'Require Email Verification',
            ],
            'display_google_captcha' => [
                'field_type' => 'switch',
                'field_label' => 'Google Captcha Protection',
            ],
            'admin_receive_email' => [
                'field_type' => 'text',
                'validation' => 'required|email',
                'field_label' => 'Email to receive customer feedback',
            ],
        ],
        'layout' => [
            'company_logo' => [
                'field_type' => 'image',
                'height' => 120,
                'width' => 120,
                'validation' => 'image|size:512',
                'field_label' => 'Company Logo',
            ],
            'navigation_type' => [
                'field_type' => 'radio',
                'field_value' => 'navigation_type',
                'default' => 0,
                'field_label' => 'Visible Navigation type',
            ],
            'top_nav' => [
                'field_type' => 'select',
                'field_value' => 'top_nav_type',
                'default' => '0',
                'field_label' => 'Top nav Layout',
            ],
            'logo_inversed_primary' => [
                'field_type' => 'switch',
                'field_value' => 'inversed_logo',
                'default' => '0',
                'field_label' => 'Active inversed Logo Color in top nav',
            ],
            'side_nav' => [
                'field_type' => 'select',
                'field_value' => 'side_nav_type',
                'default' => '0',
                'field_label' => 'Side nav Layout',
            ],
            'side_nav_fixed' => [
                'field_type' => 'switch',
                'field_value' => 'inversed_logo',
                'default' => '0',
                'field_label' => 'Active fixed side nav',
            ],
            'logo_inversed_sidenav' => [
                'field_type' => 'switch',
                'field_value' => 'inversed_logo',
                'default' => '1',
                'field_label' => 'Active inversed Logo Color in side nav',
            ],
            'no_header_layout' => [
                'field_type' => 'select',
                'field_value' => 'no_header_layout',
                'default' => '1',
                'field_label' => 'No header layout type',
            ],
            'logo_inversed_secondary' => [
                'field_type' => 'switch',
                'field_value' => 'inversed_logo',
                'default' => '1',
                'field_label' => 'Active inversed Logo Color in no header layout',
            ],
            'favicon' => [
                'field_type' => 'image',
                'height' => 64,
                'width' => 64,
                'validation' => 'image|size:100',
                'field_label' => 'Favicon',
            ],
            'show_fixed_roles' => [
                'field_type' => 'switch',
                'field_value' => 'active_status',
                'default' => '1',
                'field_label' => 'Show fixed roles in role management',
            ],
        ],
    ],


    /*
     * ----------------------------------------
     * ----------------------------------------
     * ALL WRAPPER HERE
     * ----------------------------------------
     * ----------------------------------------
    */
    'common_wrapper' => [
        'section_start_tag' => '<tr>',
        'section_end_tag' => '</tr>',
        'slug_start_tag' => '<td class="align-middle">',
        'slug_end_tag' => '</td>',
        'value_start_tag' => '<td class="align-middle">',
        'value_end_tag' => '</td>',
    ],
    'common_text_input_wrapper' => [
        'input_start_tag' => '<div class="form-group">',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_textarea_input_wrapper' => [
        'input_start_tag' => '<div>',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_select_input_wrapper' => [
        'input_start_tag' => '<div>',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_checkbox_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
//        'input_class'=>'setting-checkbox',
    ],
    'common_radio_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
        'input_class' => 'setting-radio',
    ],
    'common_toggle_input_wrapper' => [
        'input_start_tag' => '<div class="text-right">',
        'input_end_tag' => '</div>',
//        'input_class'=>'setting-checkbox',
    ],
];
